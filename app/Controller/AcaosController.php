<?php

App::uses('AppController', 'Controller');

/**
 * Acaos Controller
 *
 * @property Acao $Acao
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AcaosController extends AppController {

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
        $this->Acao->recursive = 0;
        $this->set('acaos', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Acao->exists($id)) {
            throw new NotFoundException(__('The record could not be found.'));
        }
        $options = array('recursive' => 2, 'conditions' => array('Acao.' . $this->Acao->primaryKey => $id));
        $this->set('acao', $this->Acao->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Acao->create();
            if ($this->Acao->save($this->request->data)) {
                $this->Session->setFlash(__('The record has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
            }
        }
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Acao->id = $id;
        if (!$this->Acao->exists($id)) {
            throw new NotFoundException(__('The record could not be found.?>'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Acao->save($this->request->data)) {
                $this->Session->setFlash(__('The record has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('Acao.' . $this->Acao->primaryKey => $id));
            $this->request->data = $this->Acao->find('first', $options);
        }
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
        $this->Acao->id = $id;
        if (!$this->Acao->exists()) {
            throw new NotFoundException(__('The record could not be found.'));
        }
        if ($this->Acao->delete()) {
            $this->Session->setFlash(__('Record deleted'), 'flash/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('The record was not deleted'), 'flash/error');
        $this->redirect(array('action' => 'index'));
    }

}
