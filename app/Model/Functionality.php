<?php
App::uses('AppModel', 'Model');

class Functionality extends AppModel {

    public $displayField = 'name';

    public $validate = array(
        'name' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Indique un nombre de para la funcionalidad.',
                'allowEmpty' => false,
            ),
            'between' => array(
                'rule' => array('between', 3, 30),
                'required' => true,
                'message' => 'El nombre de la funcionalidad debe tener entre 3 y 30 caracteres.',
            ),
            'unique' => array(
                'rule' => array('isUniqueName'),
                'message' => 'La funcionalidad ya se encuentra en uso.',
            ),
        ),
        'active' => array(
            'boolean' => array(
            'rule' => array('boolean'),
            ),
        ),
        'url' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Indique la URL de la funcionalidad.',
                'allowEmpty' => false,
            ),
            'max_length' => array(
                            'rule' => array('maxLength', '50'), 
                            'message' => 'La URL debe tener como máximo 255 caracteres.',
            ),
        ),
        'description' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Indique la descripció de la funcionalidad.',
                'allowEmpty' => false,
            ),
            'max_length' => array(
                            'rule' => array('maxLength', '255'), 
                            'message' => 'La Descripción debe tener como máximo 255 caracteres.',
            ),
        ),
        'param' => array(
            'boolean' => array(
                'rule' => array('boolean'),
            ),
        ),
        'functionality_type_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'message' => 'Indique el Id del tipo de funcionalidad.',
                'allowEmpty' => false,
            ),
        ),
    );
    
    function isUniqueName($check) {
        $name = $this->find(
            'first',
            array(
                'fields' => array(
                    'Functionality.id',
                    'Functionality.name'
                ),
                'conditions' => array(
                    'Functionality.name' => $check['name']
                )
            )
        ); 
        if(!empty($name)){
            if($this->data[$this->alias]['id'] == $name['Functionality']['id']) {
                
                return true;
            } else {
                
                return false;
            }
        } else {
            
            return true;
        }
    }
    
    public $belongsTo = array(
        'FunctionalityType' => array(
            'className' => 'FunctionalityType',
            'foreignKey' => 'functionality_type_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    public $hasAndBelongsToMany = array(
        'Role' => array(
            'className' => 'Role',
            'joinTable' => 'roles_functionalities',
            'foreignKey' => 'functionality_id',
            'associationForeignKey' => 'role_id',
            'unique' => 'keepExisting',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'finderQuery' => '',
        )
    );

}
