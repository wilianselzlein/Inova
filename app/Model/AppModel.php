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

    private $date_format = "Y-m-d H:i";
    private $date_format_reverse = "d/m/Y H:i";

    //public $dateFields = array();

    public function convertDateFormat($date, $reverse = false) {

        if ($reverse) {
            return date($this->date_format_reverse, strtotime($date));
        } else {
            $newDate = str_replace("/", "-", $date);
            return date($this->date_format, strtotime($newDate));
        }
        
    }

    public function convertAndSetDateFormat($reverse = false) {
        foreach ($this->datetimeFields as $datetime_field) {
            if (isset($this->data[$this->alias][$datetime_field])) {
                $this->data[$this->alias][$datetime_field] = $this->convertDateFormat($this->data[$this->alias][$datetime_field], $reverse);
            }
        }
    }

    public function beforeSave($options = array()) {
        if (isset($this->datetimeFields)) {
            $this->convertAndSetDateFormat();
        }

        return true;
    }    
}
