<?php

App::uses('AppModel', 'Model');

/**
 * Visita Model
 *
 * @property Cliente $Cliente
 */
class Visita extends AppModel {

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
    public $displayField = 'detalhes';

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'cliente_id' => array(
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
        'Cliente' => array(
            'className' => 'Cliente',
            'foreignKey' => 'cliente_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    public function beforeSave($options = array()) {        
        $this->convertAndSetDateFormat(array('data', 'nova', 'real'));   
        return true;
    }

}
