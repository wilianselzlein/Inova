<?php
App::uses('AppModel', 'Model');

class Relatorio extends AppModel {   

    public $useTable = 'relatorios';
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

	public $validate = array(
            'nome' => array(
                    'notEmpty' => array(
                            'rule' => array('notEmpty')			
                    ),
            ),
            'tipo' => array(
                              'notEmpty' => array(
                                      'rule' => array('notEmpty')			
                              ),
                      ),
            'arquivo' => array(
                              'notEmpty' => array(
                                      'rule' => array('notEmpty')			
                              ),
                      ),
	);
	
        public $hasMany = array(		
              'RelatorioDataset' => array(
			'className' => 'RelatorioDataset',
			'foreignKey' => 'relatorio_id',
			'dependent' => true
		)
	);

}