<?php
App::uses('AppModel', 'Model');

class Income extends AppModel {
 var $actsAs = array('DateFormat', 'NumberFormat');
 public $useDbConfig = 'inova';
 public $displayField = 'value';

 public $belongsTo = array(        
  'Domain' => array(
   'className' => 'Domain',
   'foreignKey' => 'domain_id',
   'conditions' => '',
   'fields' => '',
   'order' => ''
   ),
  'Hosting' => array(
   'className' => 'Hosting',
   'foreignKey' => 'hosting_id',
   'conditions' => '',
   'fields' => '',
   'order' => ''
   ),
  'SocialMedia' => array(
    'className' => 'SocialMedia',
    'foreignKey' => 'social_media_id',
    'conditions' => '',
    'fields' => '',
    'order' => ''
    ),
  );
}