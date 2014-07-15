<?php

App::uses('AppController', 'Controller');

class BooksController extends AppController {

    public $components = array('Paginator', 'Session');

    public function index() {
        $this->Book->recursive = 0;
        $this->set('books', $this->paginate());
    }

    public function view($id = null) {
        if (!$this->Book->exists($id)) {
            throw new NotFoundException(__('Invalid book'));
        }
        $options = array('conditions' => array('Book.' . $this->Book->primaryKey => $id));
        $this->set('book', $this->Book->find('first', $options));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Book->create();
            if ($this->Book->save($this->request->data)) {
                $this->Session->setFlash(__('The book has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The book could not be saved. Please, try again.'), 'flash/error');
            }
        }
    }

    public function edit($id = null) {
        $this->Book->id = $id;
        if (!$this->Book->exists($id)) {
            throw new NotFoundException(__('Invalid book'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Book->save($this->request->data)) {
                $this->Session->setFlash(__('The book has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The book could not be saved. Please, try again.'), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('Book.' . $this->Book->primaryKey => $id));
            $this->request->data = $this->Book->find('first', $options);
        }
    }

    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Book->id = $id;
        if (!$this->Book->exists()) {
            throw new NotFoundException(__('Invalid book'));
        }
        if ($this->Book->delete()) {
            $this->Session->setFlash(__('Book deleted'), 'flash/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Book was not deleted'), 'flash/error');
        $this->redirect(array('action' => 'index'));
    }

}
