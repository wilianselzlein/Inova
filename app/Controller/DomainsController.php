<?php
App::uses('AppController', 'Controller');
 /**
 * Document   : app/Controller/ServicosWeb.php
 * Created on : 2015-08-10 05:38 PM
 *
 * @author Pedro Escobar
 */

 class DomainsController extends AppController {
    // public $uses = array('domains');
    public $components = array('Paginator', 'Session');

    /**
     * index method
     *
     * @return void
     */
    public function web_index() {
        $this->Domain->recursive = 0;
        $this->set('domains', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function web_view($id = null) {
        if (!$this->Domain->exists($id)) {
            throw new NotFoundException(__('The record could not be found.'));
        }
        $options = array('conditions' => array('Domain.' . $this->Domain->primaryKey => $id));
        $this->set('domain', $this->Domain->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function web_add($cid=null) {
        if ($this->request->is('post')) {
            $this->Domain->create();
            if ($this->Domain->save($this->request->data)) {
                $this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
                 "link_text" => __('GO_TO'),
                 "link_url" => array(
                  "action" => "view",
                  "controller" => "domains",
                  $this->Domain->id
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
        //$checklists = $this->Domain->Checklist->findAsCombo();

    if(isset($cid)){
      $customers = $this->Domain->Cliente->findAsCombo('asc', 'Cliente.id = '.$cid.'');
    }else{
      $customers = $this->Domain->Cliente->findAsCombo();
    }

    $payPlans = $this->Domain->PayPlan->findAsCombo();
    $this->set(compact('customers', 'payPlans', 'customerDefaults', 'cid'));
}

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function web_edit($id = null) {
        $this->Domain->id = $id;
        if (!$this->Domain->exists($id)) {
            throw new NotFoundException(__('The record could not be found.'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Domain->save($this->request->data)) {
                $this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
                   "link_text" => __('GO_TO'),
                   "link_url" => array(
                      "action" => "view",
                      "controller" => "domains",
                      $this->Domain->id
                      )
                   ));
                $this->redirect(array('controller' => 'services', $this->findClienteByDomainId($id)));
            } else {
                $this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('Domain.' . $this->Domain->primaryKey => $id));
            $this->request->data = $this->Domain->find('first', $options);
        }
        $customers = $this->Domain->Cliente->findAsCombo();
        $payPlans = $this->Domain->PayPlan->findAsCombo();
        $this->set(compact('customers', 'payPlans', 'cid'));
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
        $this->Domain->id = $id;
        if (!$this->Domain->exists()) {
            throw new NotFoundException(__('The record could not be found.'));
        }

        $cid = $this->findClienteByDomainId($id);

        if ($this->Domain->delete()) {
            $this->Session->setFlash(__('Record deleted'), 'flash/success');
            $this->redirect(array('controller' => 'services', $cid));
        }
        $this->Session->setFlash(__('The record was not deleted'), 'flash/error');
        $this->redirect(array('controller' => 'services', $cid));
    }

    private function findClienteByDomainId($id){
      $domain = $this->Domain->findById($id);
      return $domain['Domain']['customer_id'];
    }
}
