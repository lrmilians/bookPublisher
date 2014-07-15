<?php

App::uses('AppController', 'Controller');

class FunctionalitiesController extends AppController {

    public $components = array('Paginator', 'Session');

    public function index() {
        $this->Functionality->recursive = 0;
        $this->set('functionalities', $this->paginate());
    }

    public function view($id = null) {
        if (!$this->Functionality->exists($id)) {
            throw new NotFoundException(__('Functionalidad no válida.'));
        }
        $options = array('conditions' => array('Functionality.' . $this->Functionality->primaryKey => $id));
        $this->set('functionality', $this->Functionality->find('first', $options));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Functionality->create();
            if ($this->Functionality->save($this->request->data)) {
                $this->Session->setFlash(__('La funcionalidad ha sido salvada correctamente.'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('La funcionalidad no se salvó.'), 'flash/error');
            }
        }
        $functionalityTypes = $this->Functionality->FunctionalityType->find('list');
        $roles = $this->Functionality->Role->find('list');
        $this->set(compact('functionalityTypes', 'roles'));
    }

    public function edit($id = null) {
        $this->Functionality->id = $id;
        if (!$this->Functionality->exists($id)) {
            throw new NotFoundException(__('Functionalidad no válida.'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Functionality->save($this->request->data)) {
                $this->Session->setFlash(__('La funcionalidad ha sido salvada correctamente.'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('La funcionalidad no se salvó.'), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('Functionality.' . $this->Functionality->primaryKey => $id));
            $this->request->data = $this->Functionality->find('first', $options);
        }
        $functionalityTypes = $this->Functionality->FunctionalityType->find('list');
        $roles = $this->Functionality->Role->find('list');
        $this->set(compact('functionalityTypes', 'roles'));
    }

    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Functionality->id = $id;
        if (!$this->Functionality->exists()) {
            throw new NotFoundException(__('Functionalidad no válida.'));
        }
        if ($this->Functionality->delete()) {
            $this->Session->setFlash(__('Functionalidad eliminada.'), 'flash/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('La functionalidad no ha sido eliminada.'), 'flash/error');
        $this->redirect(array('action' => 'index'));
    }

}
