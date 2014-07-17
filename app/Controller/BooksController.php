<?php
App::uses('AppController', 'Controller');

class BooksController extends AppController {

    public $components = array('Paginator', 'Session');
    public $uses = array('Book', 'TableContent');
    
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
                $this->Session->setFlash(__('El Libro ha sido guardado'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('El Libro no ha sido guardado. Por favor, intente de nuevo.'), 'flash/error');
            }
        }
    }

    public function edit($id = null) {
        $this->Book->id = $id;
        if (!$this->Book->exists($id)) {
            throw new NotFoundException(__('Libro no válido'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Book->save($this->request->data)) {
                $this->Session->setFlash(__('El Libro ha sido guardado'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('El Libro no ha sido guardado. Por favor, intente de nuevo.'), 'flash/error');
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
            throw new NotFoundException(__('Libro no válido'));
        }
        if ($this->Book->delete()) {
            $this->Session->setFlash(__('Libro eliminado'), 'flash/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('El libro no ha sido eliminado'), 'flash/error');
        $this->redirect(array('action' => 'index'));
    }
    
    public function showContent($id = null) {
        $this->Book->id = $id;
        if (!$this->Book->exists($id)) {
            throw new NotFoundException(__('Libro no válido'));
        }    
        $options = array('conditions' => array('Book.' . $this->Book->primaryKey => $id));
        $this->set('book', $this->Book->find('first', $options));
        $this->set('bookId', $id);
        
    }
    
    public function loadTable ($id, $parentId) {
        $options = array('conditions' => array('TableContent.book_id' => $id, 'TableContent.parent_id' => $parentId));
        $book = $this->Book->TableContent->find('all', $options);
        if (!empty ($book)) {
           foreach ($book as $content) {
                if ($content['TableContent']['children'] == 1 ) {
                    echo '<li id="list_'.$content['TableContent']['id'].'" class="mjs-nestedSortable-leaf sortable-element-class"><div class="ui-sortable-handle">'.$content['TableContent']['content'].'</div><ol>';
                    $this->loadTable($id, $content['TableContent']['id']);
                    echo '</ol></li>';
                } else {
                   echo '<li id="list_'.$content['TableContent']['id'].'" class="mjs-nestedSortable-leaf sortable-element-class"><div class="ui-sortable-handle">'.$content['TableContent']['content'].'</div></li>';
                }
            }  
        } else {
            echo '<div>Este libro no tiene contenidos.</div>';
        }
         
    }

}
