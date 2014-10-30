<?php

App::uses('AppController', 'Controller');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class UsersController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session');

    private function TestaPermissao() {
        $usuario_logado = $this->Session->read('Auth.User');
        if ((strtolower($usuario_logado['role']) != 'root') && (strtolower($usuario_logado['role']) != 'admin')) {
            //throw new NotFoundException(__('__PERMISSAO'));
            $this->Session->setFlash(__('__PERMISSAO'), 'flash/error');
            $this->redirect(array('controller' => 'Pages', 'action' => 'display'));
        }
    }

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add', 'logout');
    }

    public function login() {
        if ($this->Auth->login()) {
            $this->redirect($this->Auth->redirect());
        } else {
            $this->Session->setFlash(__('Invalid username or password, try again'), 'flash/error');
        }
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->TestaPermissao();
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->TestaPermissao();
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('The record could not be found.'));
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->set('user', $this->User->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        $this->TestaPermissao();
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The record has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
            }
        }

         $roles = $this->User->Role->find('list', array('fields' => 'Role.role, Role.role'));
         $unidades = $this->User->Unidade->findAsCombo();
         $this->set(compact('roles', 'unidades'));
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
        $this->User->id = $id;
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('The record could not be found.?>'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The record has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }
        $roles = $this->User->Role->find('list', array('fields' => 'Role.role, Role.role'));
        $unidades = $this->User->Unidade->findAsCombo();
        $this->set(compact('roles', 'unidades'));
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
        $this->TestaPermissao();
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('The record could not be found.'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('Record deleted'), 'flash/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('The record was not deleted'), 'flash/error');
        $this->redirect(array('action' => 'index'));
    }
    /**
     * clientes method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function clientes($id = null) {
        $this->TestaPermissao();
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('The record could not be found.'));
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->set('user', $this->User->find('first', $options));
    }
    /**
     * clientes method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function contadores($id = null) {
        $this->TestaPermissao();
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('The record could not be found.'));
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->set('user', $this->User->find('first', $options));
    }
    /**
     * changePassword method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */

    public function changePassword($id = null) { 
        if ($this->data) { 
            if ($this->User->save($this->data)) 
                $this->Session->setFlash('Senha alterada com sucesso.', 'flash/success'); 
            else
                $this->Session->setFlash('Senha não alterada.', 'flash/error'); 
            //$this->redirect(array('controller' => 'Pages', 'action' => 'display'));
        } else { 
            $this->data = $this->User->read(null, $id); 
        } 
    }

}
