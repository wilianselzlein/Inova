<?php

App::uses('AppController', 'Controller');

/**
 * Clientes Controller
 *
 * @property Cliente $Cliente
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ClientesController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session');
    
    private function conditionalRedirect($redirect){
        
    }
    
    /**
     * index method
     *
     * @return void
     */
    public function index($basico = 'N') {
        $this->Cliente->recursive = 0;
        $this->set('clientes', $this->paginate());
        $this->set('basico', $basico);
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Cliente->exists($id)) {
            throw new NotFoundException(__('The record could not be found.'));
        }
        $options = array('conditions' => array('Cliente.' . $this->Cliente->primaryKey => $id));
        $this->set('cliente', $this->Cliente->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add($basico = 'N', $origem=null) {        
        if ($this->request->is('post')) {
            $this->Cliente->create();
            if ($this->Cliente->save($this->request->data)) {
                $this->Session->setFlash(__('The record has been saved'), 'flash/success');
                if(isset($origem)){
                    $this->redirect(array('controller' => $origem, 'action' => 'add', $this->Cliente->id));                   
                }else{
                    $this->redirect(array('action' => 'index'));
                }
            } else {
                $this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
            }
        }
        $cidades = $this->Cliente->Cidade->find('list');
        $sistemas = $this->Cliente->Sistema->find('list');
        $subgrupos = $this->Cliente->Subgrupo->find('list');
        $users = $this->Cliente->User->find('list');
        $unidades = $this->Cliente->Unidade->find('list');
		$this->set('basico', $basico);
        $this->set(compact('cidades', 'sistemas', 'sistemas', 'subgrupos', 'users', 'unidades'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null, $basico = 'N') {
        
        $this->Cliente->id = $id;
        if (!$this->Cliente->exists($id)) {
            throw new NotFoundException(__('The record could not be found.?>'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Cliente->save($this->request->data)) {
                $this->Session->setFlash(__('The record has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('Cliente.' . $this->Cliente->primaryKey => $id));
            $this->request->data = $this->Cliente->find('first', $options);
        }
        $cidades = $this->Cliente->Cidade->find('list');
        $sistemas = $this->Cliente->Sistema->find('list');
        $subgrupos = $this->Cliente->Subgrupo->find('list');
        $users = $this->Cliente->User->find('list');
        $unidades = $this->Cliente->Unidade->find('list');
		$this->set('basico', $basico);
        $this->set(compact('cidades', 'sistemas', 'sistemas', 'subgrupos', 'users', 'unidades'));
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
        $this->Cliente->id = $id;
        if (!$this->Cliente->exists()) {
            throw new NotFoundException(__('The record could not be found.'));
        }
        if ($this->Cliente->delete()) {
            $this->Session->setFlash(__('Record deleted'), 'flash/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('The record was not deleted'), 'flash/error');
        $this->redirect(array('action' => 'index'));
    }

}
