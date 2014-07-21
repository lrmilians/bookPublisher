<?php
App::uses('AppModel', 'Model');

class TableContent extends AppModel {

    public $displayField = 'content';
    
    public $belongsTo = array(
        'Book' => array(
            'className' => 'Book',
            'foreignKey' => 'book_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    ); 

}
