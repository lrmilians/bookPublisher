<?php
App::uses('AppModel', 'Model');

class Role extends AppModel {

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
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'role_id',
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

    public $hasAndBelongsToMany = array(
        'Functionality' => array(
            'className' => 'Functionality',
            'joinTable' => 'roles_functionalities',
            'foreignKey' => 'role_id',
            'associationForeignKey' => 'functionality_id',
            'unique' => 'keepExisting',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'finderQuery' => '',
        )
    );

    public function getFunctionalitiesByRole($idRole) {

        return $this->find('all', array('conditions' => array('id' => $idRole), 'recursive' => 3));
    }

}
