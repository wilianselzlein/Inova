<?php
App::uses('AppController', 'Controller');

class SocialMediasController extends AppController {
    public $components = array('Paginator', 'Session');

    /**
     * index method
     *
     * @return void
     */
    public function web_index() {
        $this->SocialMedia->recursive = 0;
        $this->set('socialMedias', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function web_view($id = null) {
        if (!$this->SocialMedia->exists($id)) {
            throw new NotFoundException(__('The record could not be found.'));
        }
        $options = array('conditions' => array('SocialMedia.' . $this->SocialMedia->primaryKey => $id));
        $this->set('socialMedia', $this->SocialMedia->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function web_add($cid = null) {
        if ($this->request->is('post')) {
            $this->SocialMedia->create();
            if ($this->SocialMedia->save($this->request->data)) {
                $this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
                   "link_text" => __('GO_TO'),
                   "link_url" => array(                  
                      "action" => "view",
                      $this->SocialMedia->id
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
    $customers = $this->SocialMedia->Cliente->findAsCombo();
    $postFrequencies = $this->SocialMedia->PostFrequency->findAsCombo();
    $payPlans = $this->SocialMedia->PayPlan->findAsCombo();
    $this->set(compact('customers', 'postFrequencies', 'payPlans'));
}

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function web_edit($id = null) {
        $this->SocialMedia->id = $id;
        if (!$this->SocialMedia->exists($id)) {
            throw new NotFoundException(__('The record could not be found.?>'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->SocialMedia->save($this->request->data)) {
                $this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
                   "link_text" => __('GO_TO'),
                   "link_url" => array(                  
                      "action" => "view",
                      $this->SocialMedia->id
                      )
                   ));
                $this->redirect($this->referer(array('action'=>'index'), true));
            } else {
                $this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('SocialMedia.' . $this->SocialMedia->primaryKey => $id));
            $this->request->data = $this->SocialMedia->find('first', $options);
        }
        $customers = $this->SocialMedia->Cliente->findAsCombo();
        $postFrequencies = $this->SocialMedia->PostFrequency->findAsCombo();
        $payPlans = $this->SocialMedia->PayPlan->findAsCombo();
        $this->set(compact('customers', 'postFrequencies', 'payPlans'));
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
        $this->SocialMedia->id = $id;
        if (!$this->SocialMedia->exists()) {
            throw new NotFoundException(__('The record could not be found.'));
        }
        if ($this->SocialMedia->delete()) {
            $this->Session->setFlash(__('Record deleted'), 'flash/success');
            $this->redirect($this->referer(array('action'=>'index'), true));
        }
        $this->Session->setFlash(__('The record was not deleted'), 'flash/error');
        $this->redirect(array('action' => 'index'));
    }
}