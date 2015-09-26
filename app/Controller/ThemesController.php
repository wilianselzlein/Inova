<?php
App::uses('AppController', 'Controller');
 class ThemesController extends AppController {
    public $components = array('Paginator', 'Session');

    /**
     * index method
     *
     * @return void
     */
    public function web_index() {
        $this->Theme->recursive = 0;
        $this->set('themes', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function web_view($id = null) {
        if (!$this->Theme->exists($id)) {
            throw new NotFoundException(__('The record could not be found.'));
        }
        $options = array('conditions' => array('Theme.' . $this->Theme->primaryKey => $id));
        $this->set('theme', $this->Theme->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function web_add() {
        if ($this->request->is('post')) {
            $this->Theme->create();
            if ($this->Theme->save($this->request->data)) {
                $this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
                   "link_text" => __('GO_TO'),
                   "link_url" => array(                  
                      "action" => "view",
                      $this->Theme->id
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
        $this->Theme->id = $id;
        if (!$this->Theme->exists($id)) {
            throw new NotFoundException(__('The record could not be found.'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Theme->save($this->request->data)) {
                $this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
                 "link_text" => __('GO_TO'),
                 "link_url" => array(                  
                  "action" => "view",
                  $this->Theme->id
                  )
                 ));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('Theme.' . $this->Theme->primaryKey => $id));
            $this->request->data = $this->Theme->find('first', $options);
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
        $this->Theme->id = $id;
        if (!$this->Theme->exists()) {
            throw new NotFoundException(__('The record could not be found.'));
        }
        if ($this->Theme->delete()) {
            $this->Session->setFlash(__('Record deleted'), 'flash/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('The record was not deleted'), 'flash/error');
        $this->redirect(array('action' => 'index'));
    }
}