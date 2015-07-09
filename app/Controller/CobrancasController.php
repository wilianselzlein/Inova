<?php
/**
 * Document   : app/Controller/CobrancaController.php
 * Created on : 2015-07-09 07:26 PM
 *
 * @author Pedro Escobar
 */


App::uses('AppController', 'Controller');

/**
 * Cobrancas Controller
 *
 * @property Cobranca $Cobranca
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class CobrancasController extends AppController {

   /**
     * Components
     *
     * @var array
     */
   public $components = array('Paginator', 'Session');

   private function TestaPermissao() {
      $usuario_logado = $this->Session->read('Auth.User');        
      if (strtolower($usuario_logado['role']) == 'vendas') {
         //throw new NotFoundException(__('__PERMISSAO'));
         $this->Session->setFlash(__('__PERMISSAO'), 'flash/error');
         $this->redirect(array('action' => 'index', 'S'));            
      }
   }
   /**
     * index method
     *
     * @return void
     */
   public function index() {
      $this->TestaPermissao();
      $this->Cobranca->recursive = 0;
      $this->set('cobrancas', $this->paginate());
   }

   /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
   public function view($id = null) {
      if (!$this->Cobranca->exists($id)) {
         throw new NotFoundException(__('The record could not be found.'));
      }
      $options = array('conditions' => array('Cobranca.' . $this->Cobranca->primaryKey => $id));
      $this->set('cobranca', $this->Cobranca->find('first', $options));
   }

   /**
     * add method
     *
     * @return void
     */
   public function add($origem=null) {       
      $this->TestaPermissao();
      if ($this->request->is('post')) {
         $this->Cobranca->create();
         if ($this->Cobranca->save($this->request->data)) {
            $this->Session->setFlash(__('The record has been saved'), 'flash/success');
            if(isset($origem)){
               $this->redirect(array('controller' => $origem, 'action' => 'add', $this->Cobranca->id));                   
            }else{
               $this->redirect(array('action' => 'index'));
            }
         } else {
            $this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
         }
      }
      $clientes = $this->Cobranca->Cliente->findAsCombo('asc', 'prospect = "N"', 'fantasiarazaosocial');
      $users = $this->Cobranca->User->findAsCombo();
      $this->set(compact('clientes', 'users'));
   }

   /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
   public function edit($id = null) {
      $this->TestaPermissao();
      $this->Cobranca->id = $id;      
      if (!$this->Cobranca->exists($id)) {
         throw new NotFoundException(__('The record could not be found.'));
      }
      if ($this->request->is('post') || $this->request->is('put')) {
         if ($this->Cobranca->save($this->request->data)) {
            $this->Session->setFlash(__('The record has been saved'), 'flash/success');
            $this->redirect(array('action' => 'index'));
         } else {
            $this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
         }
      } else {
         $options = array('conditions' => array('Cobranca.' . $this->Cobranca->primaryKey => $id));
         $this->request->data = $this->Cobranca->find('first', $options);
      }
      $clientes = $this->Cobranca->Cliente->findAsCombo('asc', 'prospect = "N"', 'fantasiarazaosocial');
      $users = $this->Cobranca->User->findAsCombo();
      $this->set(compact('clientes', 'users'));
   }

   /**
     * delete method
     *
     * @throws NotFoundException
     * @throws MethodNotAllowedException
     * @param string $id
     * @return void
     */
   public function delete($id = null) {
      if (!$this->request->is('post')) {
         throw new MethodNotAllowedException();
      }
      $this->Cobranca->id = $id;
      if (!$this->Cobranca->exists()) {
         throw new NotFoundException(__('The record could not be found.'));
      }
      if ($this->Cobranca->delete()) {
         $this->Session->setFlash(__('Record deleted'), 'flash/success');
         $this->redirect(array('action' => 'index'));
      }
      $this->Session->setFlash(__('The record was not deleted'), 'flash/error');
      $this->redirect(array('action' => 'index'));
   }

}