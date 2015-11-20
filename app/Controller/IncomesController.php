<?php
App::uses('AppController', 'Controller');

class IncomesController extends AppController {
    public $components = array('Paginator', 'Session');

    /**
     * index method
     *
     * @return void
     */
    public function web_index() {
        $this->Income->recursive = 0;
        $this->set('incomes', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function web_view($id = null) {
        if (!$this->Income->exists($id)) {
            throw new NotFoundException(__('The record could not be found.'));
        }
        $options = array('conditions' => array('Income.' . $this->Income->primaryKey => $id));
        $this->set('income', $this->Income->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function web_add($cid = null) {
        if ($this->request->is('post')) {
            $this->Income->create();
            if ($this->Income->save($this->request->data)) {
                $this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
                   "link_text" => __('GO_TO'),
                   "link_url" => array(                  
                      "action" => "view",
                      $this->Income->id
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
    $domains = $this->Income->Domain->findAsCombo();
    $hostings = $this->Income->Hosting->findAsCombo();
    $socialMedia = $this->Income->SocialMedia->findAsCombo();
    $this->set(compact('domains', 'hostings', 'socialMedia'));
}

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function web_edit($id = null) {
        $this->Income->id = $id;
        if (!$this->Income->exists($id)) {
            throw new NotFoundException(__('The record could not be found.?>'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Income->save($this->request->data)) {
                $this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
                   "link_text" => __('GO_TO'),
                   "link_url" => array(                  
                      "action" => "view",
                      $this->Income->id
                      )
                   ));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('Income.' . $this->Income->primaryKey => $id));
            $this->request->data = $this->Income->find('first', $options);
        }
        $domains = $this->Income->Domain->findAsCombo();
        $hostings = $this->Income->Hosting->findAsCombo();
        $socialMedia = $this->Income->SocialMedia->findAsCombo();
        $this->set(compact('domains', 'hostings', 'socialMedia'));
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
        $this->Income->id = $id;
        if (!$this->Income->exists()) {
            throw new NotFoundException(__('The record could not be found.'));
        }
        if ($this->Income->delete()) {
            $this->Session->setFlash(__('Record deleted'), 'flash/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('The record was not deleted'), 'flash/error');
        $this->redirect(array('action' => 'index'));
    }
}