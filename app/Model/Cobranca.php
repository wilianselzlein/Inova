<?php
App::uses('AppModel', 'Model');

/**
 * Document   : app/Model/Cobranca.php
 * Created on : 2015-07-09 07:07 PM
 *
 * @author Pedro Escobar
 */
/**
 * Cobranca Model
 *
 * @property Submodulo $Submodulo
 */
class Cobranca extends AppModel {

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
   public $displayField = 'data';
   
   public $dateFields = array('data');

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
        ),               
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        
    );
}