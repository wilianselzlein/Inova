<?php
App::uses('AppModel', 'Model');

class SocialMedia extends AppModel {
   /**
 * Use database config
 *
 * @var string
 */
   public $useDbConfig = 'inova';

  /**
  * Use table
  *
  * @var mixed False or table name
  */
  public $useTable = 'social_medias';

   /**
 * Display field
 *
 * @var string
 */
   public $displayField = 'url';

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
     ),
    'PostFrequency' => array(
     'className' => 'PostFrequency',
     'foreignKey' => 'post_frequency_id',
     'conditions' => '',
     'fields' => '',
     'order' => ''
     )
    );

   public $hasMany = array(
    'Income' => array(
      'className' => 'Income',
      'foreignKey' => 'social_media_id',
      ),
    ); 
   
 }