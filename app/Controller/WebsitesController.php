<?php
App::uses('AppController', 'Controller');

class WebsitesController extends AppController {
    public $components = array('Paginator', 'Session');

    /**
     * index method
     *
     * @return void
     */
    public function web_index() {
        $this->Website->recursive = 0;
        $this->set('websites', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function web_view($id = null) {
        if (!$this->Website->exists($id)) {
            throw new NotFoundException(__('The record could not be found.'));
        }
        $options = array('conditions' => array('Website.' . $this->Website->primaryKey => $id));
        $this->set('website', $this->Website->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function web_add($cid=null) {
        if ($this->request->is('post')) {
            $this->Website->create();
            if ($this->Website->save($this->request->data)) {
                $this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
                   "link_text" => __('GO_TO'),
                   "link_url" => array(
                      "action" => "view",
                      "controller" => "websites",
                      $this->Website->id
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
      $domains = $this->Website->Hosting->Domain->findAsCombo('asc', 'Domain.customer_id = '.$cid.'');
      $domainsId = implode(',',array_keys($domains));

      if(count($domains)>0){
        $hostings = $this->Website->Hosting->findAsCombo('asc', 'Hosting.domain_id in ('.$domainsId.')');
        if(count($hostings) == 1){
          $hostingDefaults = [
              'id' => array_keys($hostings)[0],
            ];
        }
      }else{
        $hostings = $this->Website->Hosting->findAsCombo();
      }
    }else{
      $hostings = $this->Website->Hosting->findAsCombo();
    }

    $themes = $this->Website->Theme->findAsCombo();
    $this->set(compact('hostings', 'themes', 'hostingDefaults'));
}

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function web_edit($id = null) {
        $this->Website->id = $id;
        if (!$this->Website->exists($id)) {
            throw new NotFoundException(__('The record could not be found.?>'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Website->save($this->request->data)) {
                $this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
                   "link_text" => __('GO_TO'),
                   "link_url" => array(
                      "action" => "view",
                      "controller" => "websites",
                      $this->Website->id
                      )
                   ));
                $this->redirect($this->referer(array('action'=>'index'), true));
            } else {
                $this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('Website.' . $this->Website->primaryKey => $id));
            $this->request->data = $this->Website->find('first', $options);
        }
        $hostings = $this->Website->Hosting->findAsCombo();
        $themes = $this->Website->Theme->findAsCombo();
        $this->set(compact('hostings', 'themes'));
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
        $this->Website->id = $id;
        if (!$this->Website->exists()) {
            throw new NotFoundException(__('The record could not be found.'));
        }

        $cid = $this->findClienteByWebsiteId($id);

        if ($this->Website->delete()) {
            $this->Session->setFlash(__('Record deleted'), 'flash/success');
            $this->redirect(array('controller' => 'services', $cid));
        }
        $this->Session->setFlash(__('The record was not deleted'), 'flash/error');
        $this->redirect(array('controller' => 'services', $cid));
    }

    private function findClienteByWebsiteId($id){
      $website = $this->Website->findById($id);
      $domain = $this->Website->Hosting->Domain->findById($website['Hosting']['domain_id']);
      return $domain['Domain']['customer_id'];
    }
}
