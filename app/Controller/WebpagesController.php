<?php
App::uses('AppController', 'Controller');

class WebpagesController extends AppController {
    public $components = array('Paginator', 'Session');

    /**
     * index method
     *
     * @return void
     */
    public function web_index() {
        $this->Webpage->recursive = 0;
        $this->set('webpages', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function web_view($id = null) {
        if (!$this->Webpage->exists($id)) {
            throw new NotFoundException(__('The record could not be found.'));
        }
        $options = array('conditions' => array('Webpage.' . $this->Webpage->primaryKey => $id));
        $this->set('webpage', $this->Webpage->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function web_add($cid=null) {
        if ($this->request->is('post')) {
            $this->Webpage->create();
            if ($this->Webpage->save($this->request->data)) {
                $this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
                   "link_text" => __('GO_TO'),
                   "link_url" => array(
                      "action" => "view",
                      "controller" => "webpages",
                      $this->Webpage->id
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
      $domains = $this->Webpage->Website->Hosting->Domain->findAsCombo('asc', 'Domain.customer_id = '.$cid.'');
      $domainsId = implode(',',array_keys($domains));
      $hostings = $this->Webpage->Website->Hosting->findAsCombo('asc', 'Hosting.domain_id in ('.$domainsId.')');
      $hostingsId = implode(',',array_keys($hostings));
      $websites = $this->Webpage->Website->findAsCombo('asc', 'Website.hosting_id in ('.$hostingsId.')');

      if(count($websites) == 1){
        $websiteDefaults = [
            'id' => array_keys($websites)[0],
          ];
      }
    }else{
      $websites = $this->Webpage->Website->findAsCombo();
    }

    $this->set(compact('websites','websiteDefaults'));
}

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function web_edit($id = null) {
        $this->Webpage->id = $id;
        if (!$this->Webpage->exists($id)) {
            throw new NotFoundException(__('The record could not be found.?>'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Webpage->save($this->request->data)) {
                $this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
                   "link_text" => __('GO_TO'),
                   "link_url" => array(
                      "action" => "view",
                      "controller" => "webpages",
                      $this->Webpage->id
                      )
                   ));
                $this->redirect(array('controller' => 'services', $this->findClienteByWebpageId($id)));
            } else {
                $this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('Webpage.' . $this->Webpage->primaryKey => $id));
            $this->request->data = $this->Webpage->find('first', $options);
        }
        $websites = $this->Webpage->Website->findAsCombo();
        $this->set(compact('websites'));
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
        $this->Webpage->id = $id;
        if (!$this->Webpage->exists()) {
            throw new NotFoundException(__('The record could not be found.'));
        }

        $cid = $this->findClienteByWebpageId($id);

        if ($this->Webpage->delete()) {
            $this->Session->setFlash(__('Record deleted'), 'flash/success');
            $this->redirect(array('controller' => 'services', $cid));
        }
        $this->Session->setFlash(__('The record was not deleted'), 'flash/error');
        $this->redirect(array('controller' => 'services', $cid));
    }

    private function findClienteByWebpageId($id){
      $webpage = $this->Webpage->findById($id);
      $website = $this->Webpage->Website->findById($webpage['Webpage']['website_id']);
      $domain = $this->Webpage->Website->Hosting->Domain->findById($website['Hosting']['domain_id']);
      return $domain['Domain']['customer_id'];
    }
}
