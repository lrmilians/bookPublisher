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

    public function welcome() {
       
    }

    
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
        if ($user['User']['role_id'] == 8) {
            $this->set('counter', $this->User->find('first', array('conditions' => array('User.id' => $user['User']['counter_id']))));
        }
    }

    public function add($idRole = null) {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('Usuario añadido correctamente.'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('El usuario no ha sido añadido.'), 'flash/error');
            }
        }
        if ($idRole == null) {
            $roles = $this->User->Role->find('list');
        } elseif ($idRole == 7) { //Contador
            $roles = $this->User->Role->find('list', array('conditions' => array('Role.id' => $idRole)));
        } elseif ($idRole == 8) { //Usuarios
            $roles = $this->User->Role->find('list', array('conditions' => array('Role.id' => $idRole)));
            $counters = $this->User->find('list', array('conditions' => array('role_id' => 7)));
            $this->set('counters', $counters);
        } elseif ($idRole == 6) { //Administradores
            $roles = $this->User->Role->find('list', array('conditions' => array('Role.id' => $idRole)));
        }

        $reportingPeriod = array('mensual' => 'Mensual', 'semestral' => 'Semestral');
        $this->set(compact('roles', 'cities'));
        $this->set('reportingPeriod', $reportingPeriod);
        $this->set('idRole', $idRole);
    }

    public function edit($id = null, $idRole = null) {
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
        if ($idRole == 8) { //Usuarios
            $counters = $this->User->find('list', array('conditions' => array('role_id' => 7)));
            $this->set('counters', $counters);
        }
        $roles = $this->User->Role->find('list');
        
        $reportingPeriod = array('mensual' => 'Mensual', 'semestral' => 'Semestral');
        $this->set(compact('roles', 'cities'));
        $this->set('reportingPeriod', $reportingPeriod);
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
