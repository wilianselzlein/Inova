<?php
App::uses('AppModel', 'Model');

class PayPlan extends AppModel {
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
   public $hasMany = array(        
    'Domain' => array(
     'className' => 'Domain',
     'foreignKey' => 'pay_plan_id',
     'conditions' => '',
     'fields' => '',
     'order' => ''
     ),
    'Hosting' => array(
     'className' => 'Hosting',
     'foreignKey' => 'pay_plan_id',
     'conditions' => '',
     'fields' => '',
     'order' => ''
     ),
    'SocialMedia' => array(
     'className' => 'SocialMedia',
     'foreignKey' => 'pay_plan_id',
     'conditions' => '',
     'fields' => '',
     'order' => ''
     ),
    );
 }