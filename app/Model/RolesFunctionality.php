<?php
App::uses('AppModel', 'Model');

class RolesFunctionality extends AppModel {

    public $displayField = 'id';
    public $belongsTo = array(
        'Role' => array(
            'className' => 'Role',
            'foreignKey' => 'role_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Functionality' => array(
            'className' => 'Functionality',
            'foreignKey' => 'functionality_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

}
