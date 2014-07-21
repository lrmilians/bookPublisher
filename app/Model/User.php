<?php
App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
App::uses('AuthComponent', 'Controller/Component');

class User extends AppModel {

    public $avatarUploadDir = 'img/avatars';

    public $displayField = 'name';

    public $validate = array(
        'username' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Indique un nombre de usuario.',
                'allowEmpty' => false,
            ),
            'between' => array(
                'rule' => array('between', 5, 15),
                'required' => true,
                'message' => 'El nombre de usuario debe tener entre 5 y 15 caracteres.',
            ),
            'unique' => array(
                'rule' => array('isUniqueUsername'),
                'message' => 'El nombre de usuario indicado ya se encuentra en uso.',
            ),
            'alphaNumericDashUnderscore' => array(
                'rule' => array('alphaNumericDashUnderscore'),
                'message' => 'El nombre de usuario debe tener solamente letras, números y underscores.',
            )           
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Indique una contraseña.',
            ),
            'min_length' => array(
                'rule' => array('minLength', '8'),
                'message' => 'La contraseña debe tener como mínimo 8 caracteres.',
            )
        ),
        'password_confirm' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Por favor, confirme la contraseña.',
            ),
            'equaltofield' => array(
                'rule' => array('equaltofield', 'password'),
                'message' => 'Las contraseñas no coinciden.',
            )
        ),
        'email' => array(
            'required' => array(
                'rule' => array('email', true),
                'message' => 'Por favor, indique un email válido.',
            ),
            'unique' => array(
                'rule' => array('isUniqueEmail'),
                'message' => 'El email indicado, se encuentra en uso.',
            ),
            'between' => array(
                'rule' => array('between', 6, 60),
                'message' => 'El email debe tener entre 6 y 60 caracteres.',
            )
        ),
        'password_update' => array(
            'min_length' => array(
                'rule' => array('minLength', '8'),
                'message' => 'La contraseña debe tener como mínimo 8 caracteres.',
                'allowEmpty' => true,
                'required' => false,
            )
        ),
        'password_confirm_update' => array(
            'equaltofield' => array(
                'rule' => array('equaltofield', 'password_update'),
                'message' => 'Las contraseñas no coinciden.',
                'required' => false,
            )
        ),
        'name' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Indique el nombre completo.',
                'allowEmpty' => false,
            ),
            'between' => array(
                'rule' => array('between', 3, 50),
                'required' => true,
                'message' => 'El nombre completo debe tener entre  3 y 50 caracteres.',
            ),
        ),
        'active' => array(
            'boolean' => array(
                'rule' => array('boolean'),
                'message' => 'Campo obligatorio.',
                'allowEmpty' => false,
                'required' => true,
            ),
        ),
        'address' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Indique una dirección.',
                'allowEmpty' => false,
            ),
            'between' => array(
                'rule' => array('between', 10, 250),
                'required' => true,
                'message' => 'La dirección debe tener entre 10 to 255 caracteres.',
            ),
        ),
        'ci' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Indique un número de cédula.',
                'allowEmpty' => false,
            ),
            'numeric' => array(
                'rule' => array('numeric'),
                'message' => 'Sólo se aceptan números.',
            ),
            'between' => array(
                'rule' => array('between', 10, 10),
                'required' => true,
                'message' => 'La cédula debe tener 10 números.',
            ),
            'isCi' => array(
                'rule' => array('isCi'),
                'message' => 'Número de cédula no válido.',
            ),
            'unique' => array(
                'rule' => array('isUniqueCi'),
                'message' => 'El número de cédula ya se encuentra registrado.',
            ),
        ),
        'ruc' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Indique un número de RUC.',
                'allowEmpty' => false,
            ),
            'numeric' => array(
                'rule' => array('numeric'),
                'message' => 'Sólo se aceptan números.',
            ),
            'between' => array(
                'rule' => array('between', 13, 13),
                'required' => true,
                'message' => 'El RUC debe tener 13 números.',
            ),
            'isRuc' => array(
                'rule' => array('isRucNat'),
                'message' => 'RUC no válido.',
            ),
            'unique' => array(
                'rule' => array('isUniqueRuc'),
                'message' => 'El número de RUC ya se encuentra registrado.',
            ),
        ),
    );

    function isUniqueUsername($check) {
        $username = $this->find(
            'first', array(
                'fields' => array(
                    'User.id',
                    'User.username'
                ),
                'conditions' => array(
                    'User.username' => $check['username']
                )
            )
        );
        if (!empty($username)) {
            if ($this->data[$this->alias]['id'] == $username['User']['id']) {

                return true;
            } else {

                return false;
            }
        } else {

            return true;
        }
    }

    function isUniqueCi($check) {
        $username = $this->find(
            'first', array(
                'fields' => array(
                    'User.id',
                    'User.ci'
                ),
                'conditions' => array(
                    'User.ci' => $check['ci']
                )
            )
        );
        if (!empty($username)) {
            if ($this->data[$this->alias]['id'] == $username['User']['id']) {

                return true;
            } else {

                return false;
            }
        } else {

            return true;
        }
    }

    function isUniqueEmail($check) {
        $email = $this->find(
            'first', array(
                'fields' => array(
                    'User.id',
                    'User.email'
                ),
                'conditions' => array(
                    'User.email' => $check['email']
                )
            )
        );
        if (!empty($email)) {
            if ($this->data[$this->alias]['id'] == $email['User']['id']) {

                return true;
            } else {

                return false;
            }
        } else {

            return true;
        }
    }

    function isUniqueRuc($check) {
        $ruc = $this->find(
            'first', array(
                'fields' => array(
                    'User.id',
                    'User.ruc'
                ),
                'conditions' => array(
                    'User.ruc' => $check['ruc']
                )
            )
        );

        if (!empty($ruc)) {
            if ($this->data[$this->alias]['id'] == $ruc['User']['id']) {

                return true;
            } else {

                return false;
            }
        } else {

            return true;
        }
    }

    public function alphaNumericDashUnderscore($check) {
        $value = array_values($check);
        $value = $value[0];

        return preg_match('/^[a-zA-Z0-9_ \-]*$/', $value);
    }

    public function equaltofield($check, $otherfield) {
        $fname = '';
        foreach ($check as $key => $value) {
            $fname = $key;
            break;
        }

        return $this->data[$this->name][$otherfield] === $this->data[$this->name][$fname];
    }

    function isCi($check) {
        if ($this->validarCedula($check['ci'])) {

            return true;
        } else {

            return false;
        }
    }

    public function isRucNat($check) {
        if ($this->validarRucPersonaNatural($check['ruc'])) {

            return true;
        } else {

            return false;
        }
    }

    public $belongsTo = array(
        'Role' => array(
            'className' => 'Role',
            'foreignKey' => 'role_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
    );

    

    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }

        if (isset($this->data[$this->alias]['password_update']) && !empty($this->data[$this->alias]['password_update'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password_update']);
        }

        return parent::beforeSave($options);
    }

}
