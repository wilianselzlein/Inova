<?php
/**
 * Document   : app/Controller/HomeController.php
 * Created on : 2015-07-21 07:44 PM
 *
 * @author Pedro Escobar
 */


?>
<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
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

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class HomeController extends AppController {

   /**
 * This controller does not use a model
 *
 * @var array
 */
   public $uses = array('Situacao', 'Chamado');
   public $components = array('RequestHandler','Paginator', 'Session');
   public $helpers = array('Js' => array('Jquery'), 'Paginator');

   public function beforeRender() {
      //$this->layout = ($this->request->is("ajax")) ? "ajax" : "iframe";
   }
   
   public function index(){
      
   }
   
   public function getChamadosBySituacao($id=1){
      $this->layout = "iframe";
      $this->Paginator->settings = array(
         'conditions' => array('Chamado.situacao_id' => $id, ),//'Chamado.user_id'=>$this->Auth->User('id')
         'limit' => 10
      );
      $chamados = $this->Paginator->paginate('Chamado');
      //$chamados = $this->Chamado->find('all', array('conditions' => array('Chamado.situacao_id' => $id)));
      //$chamados2 = $this->Chamado->find('all', array('conditions' => array('Chamado.situacao_id' => 2)));
      //$chamados4 = $this->Chamado->find('all', array('conditions' => array('Chamado.situacao_id' => 4)));


      $this->set(compact('chamados'));
      $this->render('iframe/chamados');
   } 
}


















































