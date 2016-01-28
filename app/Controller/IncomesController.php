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
                      "controller" => "incomes",
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
    if(isset($cid)){
      $domains = $this->Income->Domain->findAsCombo('asc', 'Domain.customer_id = '.$cid);
      $domainsId = implode(',',array_keys($domains));
      $hostings = $this->Income->Hosting->findAsCombo('asc', 'Hosting.domain_id in ('.$domainsId.')');
      $socialMedia = $this->Income->SocialMedia->findAsCombo('asc', 'SocialMedia.customer_id = '.$cid);
      $this->set(compact('domains', 'hostings', 'socialMedia'));
    }else {
      $domains = $this->Income->Domain->findAsCombo();
      $hostings = $this->Income->Hosting->findAsCombo();
      $socialMedia = $this->Income->SocialMedia->findAsCombo();
      $this->set(compact('domains', 'hostings', 'socialMedia'));
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
                      "controller" => "incomes",
                      $this->Income->id
                      )
                   ));

                $cid = $this->findClienteByIncomeId($id);
                $this->redirect(array('controller' => 'services', $cid));
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

        $cid = $this->findClienteByIncomeId($id);

        if ($this->Income->delete()) {
            $this->Session->setFlash(__('Record deleted'), 'flash/success');
            $this->redirect(array('controller' => 'services', $cid));
        }
        $this->Session->setFlash(__('The record was not deleted'), 'flash/error');
        $this->redirect(array('controller' => 'services', $cid));
    }

    private function findClienteByIncomeId($id){
      $income = $this->Income->findById($id);
      $cid = null;

      if(!empty($income['Hosting']['domain_id'])){
        $domain = $this->Income->Domain->findById($income['Hosting']['domain_id']);
        $cid = $domain['Domain']['customer_id'];
      }
      if(!empty($income['SocialMedia']['customer_id']))
        $cid = $income['SocialMedia']['customer_id'];

      if(!empty($income['Domain']['customer_id']))
        $cid = $income['Domain']['customer_id'];

      return $cid;
    }
}
