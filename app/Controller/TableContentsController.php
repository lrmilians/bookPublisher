<?php

App::uses('AppController', 'Controller');

class TableContentsController extends AppController {

    public $components = array('Paginator', 'Session');

    public function index() {
        $this->TableContent->recursive = 0;
        $this->set('tableContents', $this->paginate());
    }

    public function view($id = null) {
        if (!$this->TableContent->exists($id)) {
            throw new NotFoundException(__('Invalid table content'));
        }
        $options = array('conditions' => array('TableContent.' . $this->TableContent->primaryKey => $id));
        $this->set('tableContent', $this->TableContent->find('first', $options));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->TableContent->create();
            if ($this->TableContent->save($this->request->data)) {
                $this->Session->setFlash(__('The table content has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The table content could not be saved. Please, try again.'), 'flash/error');
            }
        }
        $books = $this->TableContent->Book->find('list');
        $this->set(compact('books'));
    }

    public function edit($id = null) {
        $this->TableContent->id = $id;
        if (!$this->TableContent->exists($id)) {
            throw new NotFoundException(__('Invalid table content'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->TableContent->save($this->request->data)) {
                $this->Session->setFlash(__('The table content has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The table content could not be saved. Please, try again.'), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('TableContent.' . $this->TableContent->primaryKey => $id));
            $this->request->data = $this->TableContent->find('first', $options);
        }
        $books = $this->TableContent->Book->find('list');
        $this->set(compact('books'));
    }

    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->TableContent->id = $id;
        if (!$this->TableContent->exists()) {
            throw new NotFoundException(__('Invalid table content'));
        }
        if ($this->TableContent->delete()) {
            $this->Session->setFlash(__('Table content deleted'), 'flash/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Table content was not deleted'), 'flash/error');
        $this->redirect(array('action' => 'index'));
    }

}
