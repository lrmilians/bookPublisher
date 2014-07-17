<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController {

    public $components = array('Paginator', 'Session');
    public $uses = array('User', 'Role');
  
        
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('login', 'add');
    }

    public function isAuthorized($user) {
        if ($this->action === 'add') {
            return true;
        }

        return parent::isAuthorized($user);
    }

    public function welcome() {}

    public function login() {
        if ($this->Session->check('Auth.User')) {
            $this->redirect(array('action' => 'index'));
        }

        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->Session->write('Functionalities', $this->Role->getFunctionalitiesByRole($this->Auth->user('role_id')));
                $this->Session->setFlash(__('Bienvenido, ' . $this->Auth->user('name')), 'flash/success');
                
                return $this->redirect($this->Auth->redirect());
            }
            $this->Session->setFlash(__('Usuario o contraseña incorrecta.'), 'flash/error');
        }
    }
    
    public function logout() {
        return $this->redirect($this->Auth->logout());
    }
    
    public function index($idCounter = null) {
        if ($idCounter == null) {
            $conditions = array();
        } else {
            $conditions = array('User.counter_id' => $idCounter);
        }
        $this->paginate = array(
            'limit' => 50,
            'conditions' => $conditions,
            'order' => array('User.username' => 'asc'),
        );

        $users = $this->paginate('User');
        $this->set(compact('users'));
    }

    public function view($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Usuario no válido.'));
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $user = $this->User->find('first', $options);
        $this->set('user', $user);
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('Usuario añadido correctamente.'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('El usuario no ha sido añadido.'), 'flash/error');
            }
        }
       
        $roles = $this->User->Role->find('list');
        $this->set(compact('roles'));
    }

    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Usuario no válido.'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('Datos actualizados correctamente.'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('El usuario no ha sido editado.'), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }
        $roles = $this->User->Role->find('list');
        $this->set(compact('roles'));
    }

    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuario no válido.'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('Usuario eliminado correctamente.'), 'flash/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('El usuario no ha sido eliminado.'), 'flash/error');
        $this->redirect(array('action' => 'index'));
    }

    public function activate($id = null) {
        if (!$id) {
            $this->Session->setFlash('Por favor, indique el id de usuario.');
            $this->redirect(array('action' => 'index'));
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            $this->Session->setFlash('Usuario no válido.');
            $this->redirect(array('action' => 'index'));
        }
        if ($this->User->saveField('status', 1)) {
            $this->Session->setFlash(__('Usuario re-activado.'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('El usuario no ha sido activado.'));
        $this->redirect(array('action' => 'index'));
    }

}
