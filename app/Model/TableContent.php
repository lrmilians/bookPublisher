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
    
    public $validate = array(
        'book_id' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Seleccione un Libro.',
                'allowEmpty' => false,
            )
        ),
        'content' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Escriba el nombre del contenido.',
                'allowEmpty' => false,
            )
        ),
    );

}
