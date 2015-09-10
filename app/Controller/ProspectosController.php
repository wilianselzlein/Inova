<?php

App::uses('AppController', 'Controller');

/**
 * Prospectos Controller
 *
 * @property Prospecto $Prospecto
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ProspectosController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session');
 
    private function TestaPermissao($basico = 'N') {
        $usuario_logado = $this->Session->read('Auth.User');        
        if ((strtolower($usuario_logado['role']) == 'vendas') && ($basico == 'N')) {
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

        $this->Filter->addFilters(
                array('filter1' => array('OR' => array(
                        'Prospecto.id' => array('operator' => 'LIKE'),
                        'Prospecto.RazaoSocial' => array('operator' => 'LIKE'),
                        'Prospecto.Fantasia' => array('operator' => 'LIKE'),
                        'Prospecto.cpfcnpj' => array('operator' => 'LIKE'),
                        'Cidade.nome' => array('operator' => 'LIKE'),
                        'Prospecto.endereco' => array('operator' => 'LIKE'),
                        'Prospecto.bairro' => array('operator' => 'LIKE'),
                        'Prospecto.numero' => array('operator' => 'LIKE'),
                        'Prospecto.complemento' => array('operator' => 'LIKE'),   
                        'Prospecto.Ie' => array('operator' => 'LIKE'),   
                        'Prospecto.contato' => array('operator' => 'LIKE'),   
                        'Prospecto.estrutura' => array('operator' => 'LIKE'),   
                        'Prospecto.build' => array('operator' => 'LIKE'),   
                        'Prospecto.obs' => array('operator' => 'LIKE'),   
                        'Prospecto.telefone' => array('operator' => 'LIKE'),
                        'Prospecto.celular' => array('operator' => 'LIKE'),
                        'Prospecto.email' => array('operator' => 'LIKE'),
                        'Prospecto.cep' => array('operator' => 'LIKE')
                        )
                    )
                )
        );
        $this->Filter->setPaginate('order', 'Prospecto.RazaoSocial ASC'); // optional
        //$this->Filter->setPaginate('limit', 10); // optional
        $this->Filter->setPaginate('conditions', $this->Filter->getConditions());
        
        $this->Prospecto->recursive = 0;

        $this->set('prospectos', $this->paginate(array('Prospecto.Prospect' =>  'S')));
    }

        /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Prospecto->exists($id)) {
            throw new NotFoundException(__('The record could not be found.'));
        }
        $options = array('conditions' => array('Prospecto.' . $this->Prospecto->primaryKey => $id));
        $this->set('prospecto', $this->Prospecto->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {       
        $this->TestaPermissao();
        if ($this->request->is('post')) {
            $this->Prospecto->create();
            if ($this->Prospecto->save($this->request->data)) {
                $this->Session->setFlash(__('The record has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index', $basico));
            } else {
                $this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
            }
        }
        $cidades = $this->Prospecto->Cidade->findAsCombo();
        $users = $this->Prospecto->User->findAsCombo();
        $this->set(compact('cidades', 'users'));
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
        $this->Prospecto->id = $id;      
        if (!$this->Prospecto->exists($id)) {
            throw new NotFoundException(__('The record could not be found.?>'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Prospecto->save($this->request->data)) {
                $this->Session->setFlash(__('The record has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('Prospecto.' . $this->Prospecto->primaryKey => $id));
            $this->request->data = $this->Prospecto->find('first', $options);
        }
        $cidades = $this->Prospecto->Cidade->findAsCombo();
        $users = $this->Prospecto->User->findAsCombo();
        $this->set(compact('cidades', 'users'));
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
        $this->Prospecto->id = $id;
        if (!$this->Prospecto->exists()) {
            throw new NotFoundException(__('The record could not be found.'));
        }
        if ($this->Prospecto->delete()) {
            $this->Session->setFlash(__('Record deleted'), 'flash/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('The record was not deleted'), 'flash/error');
        $this->redirect(array('action' => 'index'));
    }

}
