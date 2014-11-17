<?php

App::uses('AppController', 'Controller');

/**
 * Arquivos Controller
 *
 * @property Arquivo $Arquivo
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ArquivosController extends AppController {

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
                                'Arquivo.id' => array('operator' => 'LIKE'),
                                'Arquivo.datahora' => array('operator' => 'LIKE'),
                                'Arquivo.descricao' => array('operator' => 'LIKE'),
                                'Arquivo.caminho' => array('operator' => 'LIKE'),
                                'Cliente.Fantasia' => array('operator' => 'LIKE'),
                                'user.UserName' => array('operator' => 'LIKE')
                                )
                        )
                        )
                );
                $this->Filter->setPaginate('conditions', $this->Filter->getConditions());

        $this->Arquivo->recursive = 0;

        if (strtolower($this->Session->read('Auth.User.role')) == 'admin') {
            $this->set('arquivos', $this->paginate());
        } else {
            $conditions = array('or' => array(
                    "Arquivo.user_id =" => $this->Session->read('Auth.User.id'),
            ));
            $this->set('arquivos', $this->paginate($conditions));
        }
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Arquivo->exists($id)) {
            throw new NotFoundException(__('The record could not be found.'));
        }
        $options = array('conditions' => array('Arquivo.' . $this->Arquivo->primaryKey => $id));
        $this->set('arquivo', $this->Arquivo->find('first', $options));
    }
    
    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Arquivo->create();
            if ($this->Arquivo->save($this->request->data)) {
                $this->Session->setFlash(__('The record has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
            }
        }
        $users = $this->Arquivo->User->findAsCombo();
        $clientes = $this->Arquivo->Cliente->findAsCombo();
        $this->set(compact('users', 'clientes'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Arquivo->id = $id;
        if (!$this->Arquivo->exists($id)) {
            throw new NotFoundException(__('The record could not be found.?>'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Arquivo->save($this->request->data)) {
                $this->Session->setFlash(__('The record has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('Arquivo.' . $this->Arquivo->primaryKey => $id));
            $this->request->data = $this->Arquivo->find('first', $options);
        }
        $users = $this->Arquivo->User->findAsCombo();
        $clientes = $this->Arquivo->Cliente->findAsCombo();
        $this->set(compact('users', 'clientes'));
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
        $this->Arquivo->id = $id;
        if (!$this->Arquivo->exists()) {
            throw new NotFoundException(__('The record could not be found.'));
        }
        if ($this->Arquivo->delete()) {
            $this->Session->setFlash(__('Record deleted'), 'flash/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('The record was not deleted'), 'flash/error');
        $this->redirect(array('action' => 'index'));
    }

}
