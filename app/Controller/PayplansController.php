<?php
App::uses('AppController', 'Controller');
 class PayPlansController extends AppController {
    public $components = array('Paginator', 'Session');

    /**
     * index method
     *
     * @return void
     */
    public function web_index() {
        $this->PayPlan->recursive = 0;
        $this->set('payplans', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function web_view($id = null) {
        if (!$this->PayPlan->exists($id)) {
            throw new NotFoundException(__('The record could not be found.'));
        }
        $options = array('conditions' => array('PayPlan.' . $this->PayPlan->primaryKey => $id));
        $this->set('payplan', $this->PayPlan->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function web_add() {
        if ($this->request->is('post')) {
            $this->PayPlan->create();
            if ($this->PayPlan->save($this->request->data)) {
                $this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
                   "link_text" => __('GO_TO'),
                   "link_url" => array(                  
                      "action" => "view",
                      $this->PayPlan->id
                      )
                   ));
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
    public function web_edit($id = null) {
        $this->PayPlan->id = $id;
        if (!$this->PayPlan->exists($id)) {
            throw new NotFoundException(__('The record could not be found.'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->PayPlan->save($this->request->data)) {
                $this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
                 "link_text" => __('GO_TO'),
                 "link_url" => array(                  
                  "action" => "view",
                  $this->PayPlan->id
                  )
                 ));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('PayPlan.' . $this->PayPlan->primaryKey => $id));
            $this->request->data = $this->PayPlan->find('first', $options);
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
    public function web_delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->PayPlan->id = $id;
        if (!$this->PayPlan->exists()) {
            throw new NotFoundException(__('The record could not be found.'));
        }
        if ($this->PayPlan->delete()) {
            $this->Session->setFlash(__('Record deleted'), 'flash/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('The record was not deleted'), 'flash/error');
        $this->redirect(array('action' => 'index'));
    }
}