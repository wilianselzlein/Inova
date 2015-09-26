<?php
App::uses('AppModel', 'Model');

class Website extends AppModel {
 public $useDbConfig = 'inova';
 public $displayField = 'url';

 public $belongsTo = array(        
  'Hosting' => array(
   'className' => 'Hosting',
   'foreignKey' => 'hosting_id',
   'conditions' => '',
   'fields' => '',
   'order' => ''
   ),
  'Theme' => array(
    'className' => 'Theme',
    'foreignKey' => 'theme_id',
    'conditions' => '',
    'fields' => '',
    'order' => ''
    ),
  );

 public $hasMany = array(        
  'SocialMedia' => array(
   'className' => 'SocialMedia',
   'foreignKey' => 'post_frequency_id',
   'conditions' => '',
   'fields' => '',
   'order' => ''
   ),
  'Webpage' => array(
   'className' => 'Webpage',
   'foreignKey' => 'website_id',
   'conditions' => '',
   'fields' => '',
   'order' => ''
   ),
  );
}