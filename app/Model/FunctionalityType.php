<?php
App::uses('AppModel', 'Model');

class FunctionalityType extends AppModel {

    public $displayField = 'name';

    public $validate = array(
        'name' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
            ),
        ),
        'description' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
            ),
        ),
    );

    public $hasMany = array(
        'Functionality' => array(
            'className' => 'Functionality',
            'foreignKey' => 'functionality_type_id',
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
