<?php

App::uses('AppModel', 'Model');

class Book extends AppModel {

    public $displayField = 'title';
    
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
