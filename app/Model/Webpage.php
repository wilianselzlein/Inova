<?php
App::uses('AppModel', 'Model');

class Webpage extends AppModel {
 public $useDbConfig = 'inova';
 public $displayField = 'name';

 public $belongsTo = array(        
  'Website' => array(
   'className' => 'Website',
   'foreignKey' => 'website_id',
   'conditions' => '',
   'fields' => '',
   'order' => ''
   ),
  );
}