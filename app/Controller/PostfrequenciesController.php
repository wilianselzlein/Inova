<?php
App::uses('AppController', 'Controller');

class PostFrequenciesController extends AppController {
    public $components = array('Paginator', 'Session');

    /**
     * index method
     *
     * @return void
     */
    public function web_index() {
        $this->PostFrequency->recursive = 0;
        $this->set('postFrequencies', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function web_view($id = null) {
        if (!$this->PostFrequency->exists($id)) {
            throw new NotFoundException(__('The record could not be found.'));
        }
        $options = array('conditions' => array('PostFrequency.' . $this->PostFrequency->primaryKey => $id));
        $this->set('postFrequency', $this->PostFrequency->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function web_add($cid=null) {
        if ($this->request->is('post')) {
            $this->PostFrequency->create();
            if ($this->PostFrequency->save($this->request->data)) {
                $this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
                   "link_text" => __('GO_TO'),
                   "link_url" => array(                  
                      "action" => "view",
                      $this->PostFrequency->id
                      )
                   ));
                if(isset($cid))
                   $this->redirect(array('controller' => 'services', $cid)); 
               else
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
        $this->PostFrequency->id = $id;
        if (!$this->PostFrequency->exists($id)) {
            throw new NotFoundException(__('The record could not be found.?>'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->PostFrequency->save($this->request->data)) {
                $this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
                   "link_text" => __('GO_TO'),
                   "link_url" => array(                  
                      "action" => "view",
                      $this->PostFrequency->id
                      )
                   ));
                $this->redirect($this->referer(array('action'=>'index'), true));
            } else {
                $this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('PostFrequency.' . $this->PostFrequency->primaryKey => $id));
            $this->request->data = $this->PostFrequency->find('first', $options);
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
        $this->PostFrequency->id = $id;
        if (!$this->PostFrequency->exists()) {
            throw new NotFoundException(__('The record could not be found.'));
        }
        if ($this->PostFrequency->delete()) {
            $this->Session->setFlash(__('Record deleted'), 'flash/success');
            $this->redirect($this->referer(array('action'=>'index'), true));
        }
        $this->Session->setFlash(__('The record was not deleted'), 'flash/error');
        $this->redirect(array('action' => 'index'));
    }
}