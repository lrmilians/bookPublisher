<?php
App::uses('AppController', 'Controller');

class FunctionalityTypesController extends AppController {

    public $components = array('Paginator', 'Session');

    public function index() {
        $this->FunctionalityType->recursive = 0;
        $this->set('functionalityTypes', $this->paginate());
    }

    public function view($id = null) {
        if (!$this->FunctionalityType->exists($id)) {
            throw new NotFoundException(__('Tipo Funcionalidad no válida.'));
        }
        $options = array('conditions' => array('FunctionalityType.' . $this->FunctionalityType->primaryKey => $id));
        $this->set('functionalityType', $this->FunctionalityType->find('first', $options));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->FunctionalityType->create();
            if ($this->FunctionalityType->save($this->request->data)) {
                $this->Session->setFlash(__('El Tipo Funcionalidad ha sido salvado correctamente.'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('El Tipo Funcionalidad no ha sido salvado.'), 'flash/error');
            }
        }
    }

    public function edit($id = null) {
        $this->FunctionalityType->id = $id;
        if (!$this->FunctionalityType->exists($id)) {
            throw new NotFoundException(__('Tipo Funcionalidad no válida.'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->FunctionalityType->save($this->request->data)) {
                $this->Session->setFlash(__('El Tipo Funcionalidad ha sido salvada correctamente.'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('El Tipo Funcionalidad no ha sido salvada.'), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('FunctionalityType.' . $this->FunctionalityType->primaryKey => $id));
            $this->request->data = $this->FunctionalityType->find('first', $options);
        }
    }

    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->FunctionalityType->id = $id;
        if (!$this->FunctionalityType->exists()) {
            throw new NotFoundException(__('Tipo Funcionalidad no válida.'));
        }
        if ($this->FunctionalityType->delete()) {
            $this->Session->setFlash(__('Tipo Funcionalidad eliminada.'), 'flash/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('El Tipo Funcionalidad no ha sido eliminada.'), 'flash/error');
        $this->redirect(array('action' => 'index'));
    }

}
