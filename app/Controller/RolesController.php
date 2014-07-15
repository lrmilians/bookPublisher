<?php
App::uses('AppController', 'Controller');

class RolesController extends AppController {

    public $components = array('Paginator', 'Session');

    public function index() {
        $this->Role->recursive = 0;
        $this->set('roles', $this->paginate());
    }

    public function view($id = null) {
        if (!$this->Role->exists($id)) {
            throw new NotFoundException(__('Rol no válido.'));
        }
        $options = array('conditions' => array('Role.' . $this->Role->primaryKey => $id));
        $this->set('role', $this->Role->find('first', $options));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Role->create();
            if ($this->Role->save($this->request->data)) {
                $this->Session->setFlash(__('El rol ha sido salvado correctamente.'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('El rol no ha sido salvado.'), 'flash/error');
            }
        }
        $functionalities = $this->Role->Functionality->find('list');
        $this->set(compact('functionalities'));
    }

    public function edit($id = null) {
        $this->Role->id = $id;
        if (!$this->Role->exists($id)) {
            throw new NotFoundException(__('Rol no válido.'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Role->save($this->request->data)) {
                $this->Session->setFlash(__('El rol ha sido salvado correctamente.'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Los cambios no han sido salvado.'), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('Role.' . $this->Role->primaryKey => $id));
            $this->request->data = $this->Role->find('first', $options);
        }
        $functionalities = $this->Role->Functionality->find('list');
        $this->set(compact('functionalities'));
    }

    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Role->id = $id;
        if (!$this->Role->exists()) {
            throw new NotFoundException(__('Rol no válido.'));
        }
        if ($this->Role->delete()) {
            $this->Session->setFlash(__('Rol eliminado correctamente.'), 'flash/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('El Rol no ha sido eliminado.'), 'flash/error');
        $this->redirect(array('action' => 'index'));
    }

}
