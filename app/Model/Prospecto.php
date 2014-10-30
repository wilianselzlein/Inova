<?php

App::uses('AppModel', 'Model');

/**
 * Cliente Model
 *
 * @property Cidade $Cidade
 * @property Sistema $Sistema
 * @property Subgrupo $Subgrupo
 * @property User $User
 * @property Unidade $Unidade
 * @property Chamado $Chamado
 */
class Prospecto extends AppModel {

    /**
     * Use database config
     *
     * @var string
     */
    public $useDbConfig = 'inova';

    /**
     * Use table
     *
     * @var mixed False or table name
     */
    public $useTable = 'clientes';
        
    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'razaosocial';
    
    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'fantasia' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'razaosocial' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'cidade_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'user_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        )
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Cidade' => array(
            'className' => 'Cidade',
            'foreignKey' => 'cidade_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Unidade' => array(
            'className' => 'Unidade',
            'foreignKey' => 'unidade_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
    

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'Visita' => array(
            'className' => 'Visita',
            'foreignKey' => 'cliente_id',
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
