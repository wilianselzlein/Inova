<?php

App::uses('AppController', 'Controller');

/**
 * Equipamentos Controller
 *
 * @property Equipamento $Equipamento
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class EquipamentosController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session');

    /**
     * index method
     *
     * @return void
     */
    public function index() {         
        $this->Filter->addFilters(
                array('filter1' => array('OR' => array(                           
                        'Equipamento.id' => array('operator' => 'LIKE'),
                        'Equipamento.descricao' => array('operator' => 'LIKE'),
                        'Equipamento.contato' => array('operator' => 'LIKE'),
                        'Equipamento.fornecedor' => array('operator' => 'LIKE'),
                        'Equipamento.observacao' => array('operator' => 'LIKE'),
                        'Equipamento.telefone' => array('operator' => 'LIKE'),
                        'Cliente.fantasia' => array('operator' => 'LIKE'),
                        'Cliente.razaosocial' => array('operator' => 'LIKE'),
                        'Acao.nome' => array('operator' => 'LIKE'),
                        'User.username' => array('operator' => 'LIKE')
                        )
                )
                )
        );
        //$this->Filter->setPaginate('order', 'Cliente.RazaoSocial ASC'); // optional
        //$this->Filter->setPaginate('limit', 10); // optional
        $this->Filter->setPaginate('conditions', $this->Filter->getConditions());
        $this->Equipamento->recursive = 0;
        $this->set('equipamentos', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Equipamento->exists($id)) {
            throw new NotFoundException(__('The record could not be found.'));
        }
        $options = array('conditions' => array('Equipamento.' . $this->Equipamento->primaryKey => $id));
        $this->set('equipamento', $this->Equipamento->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add($selected = null) {
        if ($this->request->is('post')) {
            $this->Equipamento->create();
            if ($this->Equipamento->save($this->request->data)) {
                $this->Session->setFlash(__('The record has been saved') . ' ' . $this->Equipamento->getLastInsertID(), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
            }
        }
        if (isset($selected)) {
            $this->set(compact('selected'));
        }
        $acaos = $this->Equipamento->Acao->findAsCombo();
        $clientes = $this->Equipamento->Cliente->findAsCombo('asc', 'prospect = "N"');
        $users = $this->Equipamento->User->findAsCombo();
        $this->set(compact('acaos', 'clientes', 'users'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Equipamento->id = $id;
        if (!$this->Equipamento->exists($id)) {
            throw new NotFoundException(__('The record could not be found.?>'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Equipamento->save($this->request->data)) {
                $this->Session->setFlash(__('The record has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('Equipamento.' . $this->Equipamento->primaryKey => $id));
            $this->request->data = $this->Equipamento->find('first', $options);
        }
        $acaos = $this->Equipamento->Acao->findAsCombo();
        $clientes = $this->Equipamento->Cliente->findAsCombo('asc', 'prospect = "N"');
        $users = $this->Equipamento->User->findAsCombo();
        $this->set(compact('acaos', 'clientes', 'users'));
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
        $this->Equipamento->id = $id;
        if (!$this->Equipamento->exists()) {
            throw new NotFoundException(__('The record could not be found.'));
        }
        if ($this->Equipamento->delete()) {
            $this->Session->setFlash(__('Record deleted'), 'flash/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('The record was not deleted'), 'flash/error');
        $this->redirect(array('action' => 'index'));
    }
    /**
     * getComboUsers method
     *
     * @throws NotFoundException
     * @throws MethodNotAllowedException
     * @param void
     * @return void
     */
    public function getComboUsers() {
        $cliente_id = 0;
        $usuario = 0;
        if (isset($this->request->data['Equipamento'])) {
          $cliente_id = $this->request->data['Equipamento']['cliente_id'];
          $clientes = $this->Equipamento->Cliente->Find('list', array(
              'conditions' => array('Cliente.Id' => $cliente_id),
              'fields' => array('user_id')
              )
           );
          $usuario = $clientes[$cliente_id]; 
        }
        $users = $this->Equipamento->User->find('list');
        
        $this->set('users', $users);
        $this->set('usuario', $usuario);
        $this->layout = 'ajax';
        $this->render('combos/users');
    }
}
