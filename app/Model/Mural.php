<?php

App::uses('AppModel', 'Model');

/**
 * Mural Model
 *
 * @property User $User
 */
class Mural extends AppModel {

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
    public $useTable = 'mural';

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'recado';
    
    
    public $datetimeFields = array('data');
    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        //'data' => array(
         //   'datetime' => array(
                //'rule' => array('datetime'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
     //       //'on' => 'create', // Limit validation to 'create' or 'update' operations
     //       ),
      //  ),
        'user_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'cadastradorpor_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'recado' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'UserFrom' => array(
            'className' => 'User',
            'foreignKey' => 'cadastradopor_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );   
}
