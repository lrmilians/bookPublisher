<?php

App::uses('AppController', 'Controller');

class TableContentsController extends AppController {

    public $components = array('Paginator', 'Session');
    public $helpers = array('Js');

    public function index() {
        $this->TableContent->recursive = 0;
        $this->set('tableContents', $this->paginate());
    }

    public function view($id = null) {
        if (!$this->TableContent->exists($id)) {
            throw new NotFoundException(__('Contenido no válido'));
        }
        $options = array('conditions' => array('TableContent.' . $this->TableContent->primaryKey => $id));
        $this->set('tableContent', $this->TableContent->find('first', $options));
    }

    public function add() {
        if ($this->request->is('post')) { 
            if ($this->request->data['TableContent']['parent_id'] == 0 ) {
                $this->request->data['TableContent']['level'] =  1;
            } else {
                $contentParent = $this->TableContent->find('first', array(
                    'conditions' => array('TableContent.id' => $this->request->data['TableContent']['parent_id'])
                ));
                $this->request->data['TableContent']['level'] =  $contentParent['TableContent']['level'] + 1;
                $contentParent['TableContent']['children'] = 1;
                $this->TableContent->save($contentParent);
            }
            $this->request->data['TableContent']['children'] = 0;
                       
            $this->TableContent->create();
            if ($this->TableContent->save($this->request->data)) {
                $this->Session->setFlash(__('El contenido ha sido salvado'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('El contenido no ha sido salvado. Por favor, intente de nuevo.'), 'flash/error');
            }
        }
        $books = $this->TableContent->Book->find('list');
        $this->set(compact('books'));
    }

    public function edit($id = null) {
        $this->TableContent->id = $id;
        if (!$this->TableContent->exists($id)) {
            throw new NotFoundException(__('Contenido no válido'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->TableContent->save($this->request->data)) {
                $this->Session->setFlash(__('El contenido ha sido salvado'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('El contenido no ha sido salvado. Por favor, intente de nuevo.'), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('TableContent.' . $this->TableContent->primaryKey => $id));
            $this->request->data = $this->TableContent->find('first', $options);
        }
    }

    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->TableContent->id = $id;
        if (!$this->TableContent->exists()) {
            throw new NotFoundException(__('Contenido no válido.'));
        }
        $content = $this->TableContent->find('first', array('conditions' => array('TableContent.id' => $id)));
        
        if ($this->TableContent->delete()) {
           if ($content['TableContent']['children'] == 1) {
               $contentChildren = $this->TableContent->find('all', array('conditions' => array('TableContent.parent_id' => $id)));
               foreach ($contentChildren as $children) {
                  $this->TableContent->delete($children['TableContent']['id']);
               }
               /*echo '<pre>';
               print_r($contentChildren);
               echo '</pre>'; die();*/  
           }
            $this->Session->setFlash(__('Contenido eliminado.'), 'flash/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('El contenido no ha sido eliminado.'), 'flash/error');
        $this->redirect(array('action' => 'index'));
    }

    public function getContentByBook() {
        $bookId = $this->request->data['TableContent']['book_id'];
        $contents = $this->TableContent->find('list', array(
            'conditions' => array('TableContent.book_id' => $bookId),
            'recursive' => -1
        ));
        $this->set('contents', $contents);
        $this->layout = 'ajax';
    }

}
