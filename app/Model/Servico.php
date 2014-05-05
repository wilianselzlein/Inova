<?php
App::uses('AppModel', 'Model');
/**
 * Servico Model
 *
 * @property Checklist $Checklist
 * @property Historico $Historico
 */
class Servico extends AppModel {

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
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Checklist' => array(
			'className' => 'Checklist',
			'joinTable' => 'checklists_servicos',
			'foreignKey' => 'servico_id',
			'associationForeignKey' => 'checklist_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		'Historico' => array(
			'className' => 'Historico',
			'joinTable' => 'historicos_servicos',
			'foreignKey' => 'servico_id',
			'associationForeignKey' => 'historico_id',
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
