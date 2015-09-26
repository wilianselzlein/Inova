<?php
App::uses('AppModel', 'Model');

class PostFrequency extends AppModel {
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
    'SocialMedia' => array(
     'className' => 'SocialMedia',
     'foreignKey' => 'post_frequency_id',
     'conditions' => '',
     'fields' => '',
     'order' => ''
     ),
    );
 }