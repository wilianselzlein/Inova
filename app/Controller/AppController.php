<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public $theme = "Cakestrap";
    var $helpers = array('Js'   => array('Jquery'),
                         'Mural' => array('className' => 'Mural'),
                         'Visita' => array('className' => 'Visita'),
						  'FilterResults.Search'
    );

    public function beforeFilter() {
        //$this->Auth->allow('index', 'view');
        $this->Auth->authError = __('You must be logged in to view this page.');
        $locale = Configure::read('Config.language');
        if ($locale && file_exists(APP . 'View' . DS . $locale . DS . $this->viewPath)) {
            // e.g. use /app/View/fra/Pages/tos.ctp instead of /app/View/Pages/tos.ctp
            $this->viewPath = $locale . DS . $this->viewPath;
        }
    }

    public $components = array(
        'Session',
        'Auth' => array(
            'loginRedirect' => array('controller' => 'pages', 'action' => 'display', 'home'),
            'logoutRedirect' => array('controller' => 'pages', 'action' => 'display', 'home')
        ),
        'FilterResults.Filter' => array(
            'auto' => array(
                'paginate' => false,
                'explode' => true, // recomendado
            ),
            'explode' => array(
                'character' => ' ',
                 'concatenate' => 'AND',
            )
        )
    );

    private function convertAndSetDatetimeFormat($model) {
        foreach ($this->$model->datetimeFields as $datetime_field) {
            if (isset($this->request->data[$this->$model->alias][$datetime_field])) {
                $this->request->data[$this->$model->alias][$datetime_field] = $this->$model->convertDateFormat($this->request->data[$this->$model->alias][$datetime_field], true, true);
            }
        }
    }
    
    private function convertAndSetDateFormat($model) {
        foreach ($this->$model->dateFields as $date_field) {
            if (isset($this->request->data[$this->$model->alias][$date_field])) {
                $this->request->data[$this->$model->alias][$date_field] = $this->$model->convertDateFormat($this->request->data[$this->$model->alias][$date_field], true, false);
            }
        }
    }
    
    private function convertAndSetMonetaryFormat($model) {
        foreach ($this->$model->monetaryFields as $monetary_field) {
            if (isset($this->request->data[$this->$model->alias][$monetary_field])) {
                $this->request->data[$this->$model->alias][$monetary_field] = $this->$model->convertMonetaryFormat($this->request->data[$this->$model->alias][$monetary_field], true);
            }
        }
    }

    public function beforeRender() {
        $model = $this->modelClass;

        if (isset($this->$model->datetimeFields)) {
            $this->convertAndSetDatetimeFormat($model);
        }
        if (isset($this->$model->dateFields)){
             $this->convertAndSetDateFormat($model);
        }
         if (isset($this->monetaryFields)) {
            $this->convertAndSetMonetaryFormat($model);
        }
        return parent::beforeRender();
    }

}
