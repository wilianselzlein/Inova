<?php
App::uses('AppModel', 'Model');

class Theme extends AppModel {
 public $useDbConfig = 'inova';
 public $displayField = 'name';

 public $hasMany = array(        
  'Website' => array(
   'className' => 'Website',
   'foreignKey' => 'theme_id',
   'conditions' => '',
   'fields' => '',
   'order' => ''
   ),
  );
}