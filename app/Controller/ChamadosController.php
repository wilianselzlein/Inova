<?php

App::uses('AppController', 'Controller');

/**
 * Chamados Controller
 *
 * @property Chamado $Chamado
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ChamadosController extends AppController {

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
                                'Chamado.id' => array('operator' => 'LIKE'),
                                'Chamado.descricao' => array('operator' => 'LIKE'),
                                'Chamado.contato' => array('operator' => 'LIKE'),
                                'Tipo.nome' => array('operator' => 'LIKE'),
                                'Cliente.fantasia' => array('operator' => 'LIKE'),
                                'Cliente.razaosocial' => array('operator' => 'LIKE'),
                                'Prioridade.nome' => array('operator' => 'LIKE'),
                                'User.username' => array('operator' => 'LIKE'),
                                'Problema.nome' => array('operator' => 'LIKE'),
                                'Situacao.nome' => array('operator' => 'LIKE')
                                )
                        )
                        )
                );
                //$this->Filter->setPaginate('order', 'Cliente.RazaoSocial ASC'); // optional
                //$this->Filter->setPaginate('limit', 10); // optional
                $this->Filter->setPaginate('conditions', $this->Filter->getConditions());

        $this->Chamado->recursive = 0;
        $this->set('chamados', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Chamado->exists($id)) {
            throw new NotFoundException(__('The record could not be found.'));
        }
        $options = array('conditions' => array('Chamado.' . $this->Chamado->primaryKey => $id));
        $this->set('chamado', $this->Chamado->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add($selected = null) {
        if ($this->request->is('post')) {
            $this->Chamado->create();
            if ($this->Chamado->save($this->request->data)) {
                $this->Session->setFlash(__('The record has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
            }
        }
        if (isset($selected)) {
            $this->set(compact('selected'));
        }
        $tipos = $this->Chamado->Tipo->findAsCombo();
        $clientes = $this->Chamado->Cliente->findAsCombo('asc', 'prospect = "N"');
        $prioridades = $this->Chamado->Prioridade->findAsCombo();
        $problemas = $this->Chamado->Problema->findAsCombo();
        $situacaos = $this->Chamado->Situacao->findAsCombo();
        $users = $this->Chamado->User->findAsCombo();
        $this->set(compact('tipos', 'clientes', 'problemas', 'situacaos', 'prioridades', 'users'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Chamado->id = $id;
        if (!$this->Chamado->exists($id)) {
            throw new NotFoundException(__('The record could not be found.?>'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Chamado->save($this->request->data)) {
                $this->Session->setFlash(__('The record has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('Chamado.' . $this->Chamado->primaryKey => $id));
            $this->request->data = $this->Chamado->find('first', $options);
        }
        $tipos = $this->Chamado->Tipo->findAsCombo();
        $clientes = $this->Chamado->Cliente->findAsCombo('asc', 'prospect = "N"');
        $prioridades = $this->Chamado->Prioridade->findAsCombo();
        $problemas = $this->Chamado->Problema->findAsCombo();
        $situacaos = $this->Chamado->Situacao->findAsCombo();
        $users = $this->Chamado->User->findAsCombo();
        $this->set(compact('tipos', 'clientes', 'problemas', 'situacaos', 'prioridades', 'users'));
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
        $this->Chamado->id = $id;
        if (!$this->Chamado->exists()) {
            throw new NotFoundException(__('The record could not be found.'));
        }
        if ($this->Chamado->delete()) {
            $this->Session->setFlash(__('Record deleted'), 'flash/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('The record was not deleted'), 'flash/error');
        $this->redirect(array('action' => 'index'));
    }

}
