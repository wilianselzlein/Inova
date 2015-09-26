<?php
App::uses('AppModel', 'Model');

class Hosting extends AppModel {
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
   public $displayField = 'ftp_url';

   /**
     * belongsTo associations
     *
     * @var array
     */
   public $belongsTo = array(        
    'Domain' => array(
     'className' => 'Domain',
     'foreignKey' => 'domain_id',
     'conditions' => '',
     'fields' => '',
     'order' => ''
     ),
    'PayPlan' => array(
     'className' => 'PayPlan',
     'foreignKey' => 'pay_plan_id',
     'conditions' => '',
     'fields' => '',
     'order' => ''
     ),
    );

   public $hasMany = array(
    'Webmail' => array(
      'className' => 'Webmail',
      'foreignKey' => 'hosting_id',
      ),
    'Website' => array(
      'className' => 'Website',
      'foreignKey' => 'hosting_id',
      ),
    'Income' => array(
      'className' => 'Income',
      'foreignKey' => 'hosting_id',
      )
    );     
 }