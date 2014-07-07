<?php

/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {

    private $datetime_format = "Y-m-d H:i";
    private $datetime_format_reverse = "d/m/Y H:i";
    private $date_format = "Y-m-d";
    private $date_format_reverse = "d/m/Y";

    //public $dateFields = array();

    public function convertDateFormat($date, $reverse = false, $datetime = true) {
        if ($datetime) {
            if ($reverse) {
                return date($this->datetime_format_reverse, strtotime($date));
            } else {
                $newDate = str_replace("/", "-", $date);
                return date($this->datetime_format, strtotime($newDate));
            }
        } else {
            if ($reverse) {
                return date($this->date_format_reverse, strtotime($date));
            } else {
                $newDate = str_replace("/", "-", $date);
                return date($this->date_format, strtotime($newDate));
            }
        }
    }

    public function convertAndSetDatetimeFormat($reverse = false) {
        foreach ($this->datetimeFields as $datetime_field) {
            if (isset($this->data[$this->alias][$datetime_field])) {
                $this->data[$this->alias][$datetime_field] = $this->convertDateFormat($this->data[$this->alias][$datetime_field], $reverse);
            }
        }
    }

    public function convertAndSetDateFormat($reverse = false) {
        foreach ($this->dateFields as $date_field) {
            if (isset($this->data[$this->alias][$date_field])) {
                $this->data[$this->alias][$date_field] = $this->convertDateFormat($this->data[$this->alias][$date_field], $reverse, false);
            }
        }
    }

    public function convertMonetaryFormat($monetary, $reverse = false) {
        if ($reverse) {
            $antes = substr($monetary, 0, $monetary.length-2);
            $depois = substr($monetary, $monetary.length-2);
            $monetary = $antes . "," . $depois;

           return $monetary;
        } else {            
            $newValue = str_replace(".","", $monetary);
            $value = str_replace(",","", $newValue);
            return $value;
        }
    }

    public function convertAndSetMonetaryFormat($reverse = false) {
        foreach ($this->monetaryFields as $monetary_field) {
            if (isset($this->data[$this->alias][$monetary_field])) {
                $this->data[$this->alias][$monetary_field] = $this->convertMonetaryFormat($this->data[$this->alias][$monetary_field], $reverse);
            }
        }
    }

    public function beforeSave($options = array()) {

        if (isset($this->datetimeFields)) {
            $this->convertAndSetDatetimeFormat();
        }
        if (isset($this->dateFields)) {
            $this->convertAndSetDateFormat();
        }
        if (isset($this->monetaryFields)) {
            $this->convertAndSetMonetaryFormat();
        }

        return true;
    }   
    
    public function findAsCombo($order='asc', $conditions=array()){         
        $list  = $this->find('list', array('order' => $this->displayField.' '.$order, 'conditions'=> $conditions));
        return $list;
    }

    /**
* Transform a set of hasMany multi-select data into a format which can be saved
* using saveAll in the controller
* 
* @param array $data
* @param str $fieldToSave
* @param int $deleteId
* @return array
*/
public function massageHasManyForSaveAll($data, $fieldToSave, $deleteId = null) {
  foreach ($this->belongsTo as $model => $relationship) {
      if ($relationship['foreignKey'] != $fieldToSave) {
          $relatedModel = $model;
          $relatedModelPrimaryKey = $this->{$model}->primaryKey;
          $relatedForeignKey = $relationship['foreignKey'];
      }
  }

  if ($deleteId !== null) {
      $this->deleteAll(array(
          $this->alias .'.'. $relatedForeignKey => $deleteId
      ));
  }

  if (is_array($data[$fieldToSave])) {
      foreach ($data[$fieldToSave] as $packageId) {
          $return[] = array($fieldToSave => $packageId);
      }
      
      return $return;
  }

  return $data;
}
}
