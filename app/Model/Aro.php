<?php
App::uses('AppModel', 'Model');
/**
 * Role Model
 *
 * @property Chamado $Chamado
 */
class Aro extends AppModel {

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
	public $displayField = 'alias';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'model' => array(
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
    public $hasMany = array(
        'Acos' => array(
			'className' => 'Aros_acos',
			'foreignKey' => 'aco_id',
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
        'parent_id' => array(
            'className' => 'Aro',
            'foreignKey' => 'parent_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
    );

}
