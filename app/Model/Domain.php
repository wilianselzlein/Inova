<?php
App::uses('AppModel', 'Model');
/**
 * Domain Model
 *
 */
class Domain extends AppModel {
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
      'Cliente' => array(
         'className' => 'Cliente',
         'foreignKey' => 'customer_id',
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
      )
   );

   public $hasMany = array(
        'Hosting' => array(
            'className' => 'Hosting',
            'foreignKey' => 'domain_id',
        ),
        'Income' => array(
            'className' => 'Income',
            'foreignKey' => 'domain_id',
        )
    );     

   
}