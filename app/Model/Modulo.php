<?php
App::uses('AppModel', 'Model');
/**
 * Modulo Model
 *
 * @property Submodulo $Submodulo
 */
class Modulo extends AppModel {

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
	public $displayField = 'nome';

/**
 * Use Containable config
 *
 * @var array
 */        
        public $actsAs = array('Containable');

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'nome' => array(
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
 * hasMany associations
 *
 * @var array
 */

var $hasAndBelongsToMany = array(
    'Cliente' => array(
        'className' => 'Cliente',
        'joinTable' => 'clientes_modulos',
        'foreignKey' => 'modulo_id',
        'associationForeignKey' => 'cliente_id',
        'unique' => true,
    )
);

/*	public $hasMany = array(
		'ClientesModulos'/* => array(
			'className' => 'ClientesModulos',
			'foreignKey' => 'modulo_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)*/
	//);
}
