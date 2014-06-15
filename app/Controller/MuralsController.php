<?php

App::uses('AppController', 'Controller');

/**
 * Murals Controller
 *
 * @property Mural $Mural
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class MuralsController extends AppController {

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
                                'Mural.id' => array('operator' => 'LIKE'),
                                'Mural.data' => array('operator' => 'LIKE'),
                                'Mural.recado' => array('operator' => 'LIKE'),
                                'User.UserName' => array('operator' => 'LIKE'),
                                'UserFrom.UserName' => array('operator' => 'LIKE')
                                )
                        )
                        )
                );
                //$this->Filter->setPaginate('order', 'Cliente.RazaoSocial ASC'); // optional
                //$this->Filter->setPaginate('limit', 10); // optional
                $this->Filter->setPaginate('conditions', $this->Filter->getConditions());

        $this->Mural->recursive = 0;

        if (strtolower($this->Session->read('Auth.User.role')) == 'admin') {
            $this->set('murals', $this->paginate());
        } else {
            $conditions = array('or' => array(
                    "Mural.user_id =" => $this->Session->read('Auth.User.id'),
                    "Mural.cadastradopor_id =" => $this->Session->read('Auth.User.id')
            ));
            $this->set('murals', $this->paginate($conditions));
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
        if (!$this->Mural->exists($id)) {
            throw new NotFoundException(__('The record could not be found.'));
        }
        $options = array('conditions' => array('Mural.' . $this->Mural->primaryKey => $id));
        $this->set('mural', $this->Mural->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Mural->create();
            if ($this->Mural->save($this->request->data)) {
                $this->Session->setFlash(__('The record has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
            }
        }
        $users = $this->Mural->User->find('list');
        $cadastradopors = $this->Mural->UserFrom->find('list');
        $this->set(compact('users', 'cadastradopors'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Mural->id = $id;
        if (!$this->Mural->exists($id)) {
            throw new NotFoundException(__('The record could not be found.?>'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Mural->save($this->request->data)) {
                $this->Session->setFlash(__('The record has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('Mural.' . $this->Mural->primaryKey => $id));
            $this->request->data = $this->Mural->find('first', $options);
        }
        $users = $this->Mural->User->find('list');
        $this->set(compact('users'));
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
        $this->Mural->id = $id;
        if (!$this->Mural->exists()) {
            throw new NotFoundException(__('The record could not be found.'));
        }
        if ($this->Mural->delete()) {
            $this->Session->setFlash(__('Record deleted'), 'flash/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('The record was not deleted'), 'flash/error');
        $this->redirect(array('action' => 'index'));
    }

}
