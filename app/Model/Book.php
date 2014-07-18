<?php

App::uses('AppModel', 'Model');

class Book extends AppModel {

    public $displayField = 'title';
    
    public $validate = array(
        'title' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Indique el nombre del libro.',
                'allowEmpty' => false,
            ),
            'unique' => array(
                'rule' => array('isUniqueBookTitle'),
                'message' => 'El nombre del libro ya esta registrado.',
            )
        ));
    
    function isUniqueBookTitle($check) {
        $bookTitle = $this->find(
            'first', array(
                'fields' => array(
                    'Book.id',
                    'Book.title'
                ),
                'conditions' => array(
                    'Book.title' => $check['title']
                )
            )
        );
        if (!empty($bookTitle)) { 
            if ($this->data[$this->alias]['id'] == $bookTitle['Book']['id']) {
                
                return true;
            } else {

                return false;
            }
        } else {

            return true;
        }
    }
    
    public $hasMany = array(
        'TableContent' => array(
            'className' => 'TableContent',
            'foreignKey' => 'book_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );

}
