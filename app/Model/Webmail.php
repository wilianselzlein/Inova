<?php
App::uses('AppModel', 'Model');
/**
 * Domain Model
 *
 */
class Webmail extends AppModel {
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
   public $displayField = 'name';

   /**
     * belongsTo associations
     *
     * @var array
     */
   public $belongsTo = array(        
    'Hosting' => array(
     'className' => 'Hosting',
     'foreignKey' => 'hosting_id',
     'conditions' => '',
     'fields' => '',
     'order' => ''
     ),
    );
 }