<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Historicos Controller
 *
 * @property Historico $Historico
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class HistoricosController extends AppController {

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
        $this->Historico->recursive = 0;
        $this->set('historicos', $this->paginate());     
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Historico->exists($id)) {
            throw new NotFoundException(__('The record could not be found.'));
        }
        $options = array('conditions' => array('Historico.' . $this->Historico->primaryKey => $id));
        $this->set('historico', $this->Historico->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add($chamado_id = null) {
        if ($this->request->is('post')) {
            $this->Historico->create();
            if ($this->Historico->save($this->request->data)) {
                $this->Session->setFlash(__('The record has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
            }
        }
        $chamados = $this->Historico->Chamado->findAsCombo();
        $users = $this->Historico->User->findAsCombo();
        $checklists = $this->Historico->Checklist->findAsCombo();
        $servicos = $this->Historico->Servico->findByChecklist(null);
        $this->set(compact('chamados', 'users', 'checklists', 'servicos', 'chamado_id'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Historico->id = $id;
        if (!$this->Historico->exists($id)) {
            throw new NotFoundException(__('The record could not be found.?>'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Historico->save($this->request->data)) {                
                $this->Session->setFlash(__('The record has been saved'), 'flash/success');
                //$this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('Historico.' . $this->Historico->primaryKey => $id));
            $this->request->data = $this->Historico->find('first', $options);
        }
        $chamados = $this->Historico->Chamado->findAsCombo();
        $users = $this->Historico->User->findAsCombo();
        $checklists = $this->Historico->Checklist->findAsCombo();        
        $servicos = $this->Historico->Servico->findByChecklist($this->request->data['Checklist']['id']);
        $this->set(compact('chamados', 'users', 'checklists', 'servicos'));
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
        $this->Historico->id = $id;
        if (!$this->Historico->exists()) {
            throw new NotFoundException(__('The record could not be found.'));
        }
        if ($this->Historico->delete()) {
            $this->Session->setFlash(__('Record deleted'), 'flash/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('The record was not deleted'), 'flash/error');
        $this->redirect(array('action' => 'index'));
    }

    public function getComboServicos() {
        $checklist_id = $this->request->data['Historico']['checklist_id'];
        $servicos = $this->Historico->Servico->findByChecklist($checklist_id);
        $this->set('servicos', $servicos);
        $this->layout = 'ajax';
        $this->render('combos/servicos');
    }

}
