<?php

App::uses('AppController', 'Controller');

/**
 * Modulos Controller
 *
 * @property Modulo $Modulo
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ModulosController extends AppController {

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
        $this->Modulo->recursive = 0;
        $this->set('modulos', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Modulo->exists($id)) {
            throw new NotFoundException(__('The record could not be found.'));
        }

        $options = array(
            'conditions' => array('Modulo.' . $this->Modulo->primaryKey => $id),
            );
        $this->Modulo->recursive = 1;
        $this->set('modulo', $this->Modulo->find('first', $options));
        
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Modulo->create();
            if ($this->Modulo->save($this->request->data)) {
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
        $this->Modulo->id = $id;
        if (!$this->Modulo->exists($id)) {
            throw new NotFoundException(__('The record could not be found.?>'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Modulo->save($this->request->data)) {
                $this->Session->setFlash(__('The record has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('Modulo.' . $this->Modulo->primaryKey => $id));
            $this->request->data = $this->Modulo->find('first', $options);
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
        $this->Modulo->id = $id;
        if (!$this->Modulo->exists()) {
            throw new NotFoundException(__('The record could not be found.'));
        }
        if ($this->Modulo->delete()) {
            $this->Session->setFlash(__('Record deleted'), 'flash/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('The record was not deleted'), 'flash/error');
        $this->redirect(array('action' => 'index'));
    }

}
