<?php

App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');

/**
 * User Model
 *
 * @property Cliente $Cliente
 * @property Historico $Historico
 * @property Mural $Mural
 */
class User extends AppModel {

    /**
     * Use database config
     *
     * @var string
     */
    public $useDbConfig = 'inova';

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'nickname';

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'username' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'role' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),

     'password' => array( 
            'Not empty' => array( 
                'rule' => 'notEmpty', 'message' => 'Digite a senha.' 
            ), 
         'Letras e Numeros' => array(
                'rule' => 'alphaNumeric', 
                'allowEmpty' => true, 
                'message' => 'Senha precisa conter letras e números.'
             ),
         'Tamanho Minimo' => array(
                'rule' => array('minLength', 6), 
                'allowEmpty' => true, 
                'message' => 'Tamanho mínimo de 6 dígitos.'
             ),
         'Tamanho Maximo' => array(
                'rule' => array('maxLength', 16), 
                'allowEmpty' => true, 
                'message' => 'Tamanho máximo de 16 dígitos.'
             ),
         'Match passwords' => array( 
                'rule' => 'matchPasswords', 
                'message' => 'Senhas não conferem.' 
            ) 
        ), 
        'password_confirmation' => array( 
            'Not empty' => array( 
                'rule' => 'notEmpty', 'message' => 'Confirme a senha.' 
            ) 
        ), 
        'current_password' => array( 
            'notempty' => array('rule' => 'notEmpty', 'message' => 'Digite sua senha antiga.'), 
            'check password' => array('rule' => 'checkPassword', 
                'message' => 'Senha incorreta.') 
        )
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed
    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Unidade' => array(
            'className' => 'Unidade',
            'foreignKey' => 'unidade_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Role' => array(
            'className' => 'Role',
            'foreignKey' => 'role',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
    );
    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'Cliente' => array(
            'className' => 'Cliente',
            'foreignKey' => 'user_id',
            'dependent' => false,
            'conditions' => 'Cliente.Prospect <> "C"',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'Contador' => array(
            'className' => 'Contador',
            'foreignKey' => 'user_id',
            'dependent' => false,
            'conditions' => 'Contador.Prospect = "C"',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'Historico' => array(
            'className' => 'Historico',
            'foreignKey' => 'user_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'Mural' => array(
            'className' => 'Mural',
            'foreignKey' => 'user_id',
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

    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }
        return true;
    }

    public function matchPasswords($data) { 
        if (isset($this->data['User']['password_confirmation'])) {
            if ($data['password'] == $this->data['User']['password_confirmation']) 
                return true; 
            $this->invalidate('password_confirmation', 'Senhas não conferem.'); 
            return false; 
        }
        else
            return TRUE;
    } 
     
    public function checkPassword($data) { 
        $user1=new User(); 
        $user=$user1->read(null, $this->data['User']['id']); 
        $current_password=AuthComponent::password($data['current_password']); 
        if($current_password==$user['User']['password'])
           return true; 

        return false; 
    }

}
