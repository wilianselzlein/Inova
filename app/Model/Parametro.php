<?php
App::uses('AppModel', 'Model');
/**
 * Parametro Model
 *
 */
class Parametro extends AppModel {

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
 *-
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
		'valor' => array(
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
/**
 * valor method
 *
 * @throws NotFoundException
 * @param string $id
 * @return string
 */
	public function valor($id = null) {
		if (!$this->exists($id)) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		$options = array('conditions' => array('Parametro.' . $this->primaryKey => $id));
		$parametro = $this->find('first', $options);
                return $parametro['Parametro']['valor'];
	}
        
}
