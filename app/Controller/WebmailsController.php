<?php
App::uses('AppController', 'Controller');

class WebmailsController extends AppController {
    public $components = array('Paginator', 'Session');

    /**
     * index method
     *
     * @return void
     */
    public function web_index() {
        $this->Webmail->recursive = 0;
        $this->set('webmails', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function web_view($id = null) {
        if (!$this->Webmail->exists($id)) {
            throw new NotFoundException(__('The record could not be found.'));
        }
        $options = array('conditions' => array('Webmail.' . $this->Webmail->primaryKey => $id));
        $this->set('webmail', $this->Webmail->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function web_add($cid=null) {
        if ($this->request->is('post')) {
            $this->Webmail->create();
            if ($this->Webmail->save($this->request->data)) {
                $this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
                   "link_text" => __('GO_TO'),
                   "link_url" => array(
                      "action" => "view",
                      "controller" => "webmails",
                      $this->Webmail->id
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
    if(isset($cid)){
      $domains = $this->Webmail->Hosting->Domain->findAsCombo('asc', 'Domain.customer_id = '.$cid.'');
      $domainsId = implode(',',array_keys($domains));
      $hostings = $this->Webmail->Hosting->findAsCombo('asc', 'Hosting.domain_id in ('.$domainsId.')');
      if(count($hostings) == 1){
        $hostingDefaults = [
            'id' => array_keys($hostings)[0],
          ];
      }
    }else{
      $hostings = $this->Webmail->Hosting->findAsCombo();
    }
    $this->set(compact('hostings','hostingDefaults'));
}

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function web_edit($id = null) {
        $this->Webmail->id = $id;
        if (!$this->Webmail->exists($id)) {
            throw new NotFoundException(__('The record could not be found.?>'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Webmail->save($this->request->data)) {
                $this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
                   "link_text" => __('GO_TO'),
                   "link_url" => array(
                      "action" => "view",
                      "controller" => "webmails",
                      $this->Webmail->id
                      )
                   ));
                $this->redirect(array('controller' => 'services', $this->findClienteByWebmailId($id)));
            } else {
                $this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('Webmail.' . $this->Webmail->primaryKey => $id));
            $this->request->data = $this->Webmail->find('first', $options);
        }
        $hostings = $this->Webmail->Hosting->findAsCombo();
        $this->set(compact('hostings'));
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
        $this->Webmail->id = $id;
        if (!$this->Webmail->exists()) {
            throw new NotFoundException(__('The record could not be found.'));
        }

        $cid = $this->findClienteByWebmailId($id);

        if ($this->Webmail->delete()) {
            $this->Session->setFlash(__('Record deleted'), 'flash/success');
            $this->redirect(array('controller' => 'services', $cid));
        }
        $this->Session->setFlash(__('The record was not deleted'), 'flash/error');
        $this->redirect(array('controller' => 'services', $cid));
    }

    private function findClienteByWebmailId($id){
      $webmail = $this->Webmail->findById($id);
      $domain = $this->Webmail->Hosting->Domain->findById($webmail['Hosting']['domain_id']);
      return $domain['Domain']['customer_id'];
    }
}
