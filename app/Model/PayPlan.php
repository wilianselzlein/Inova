<?php
App::uses('AppModel', 'Model');
/**
 * Domain Model
 *
 */
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
   /*public $belongsTo = array(        
      'Cliente' => array(
         'className' => 'Cliente',
         'foreignKey' => 'customer_id',
         'conditions' => '',
         'fields' => '',
         'order' => ''
      )
   );*/
}