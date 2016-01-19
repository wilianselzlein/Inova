<?php
App::uses('AppController', 'Controller');
 /**
 * Document   : app/Controller/HostingsWeb.php
 * Created on : 2015-08-10 05:38 PM
 *
 * @author Pedro Escobar
 */

 class HostingsController extends AppController {
    public $components = array('Paginator', 'Session');

    /**
     * index method
     *
     * @return void
     */
    public function web_index() {
        $this->Hosting->recursive = 0;
        $this->set('hostings', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function web_view($id = null) {
        if (!$this->Hosting->exists($id)) {
            throw new NotFoundException(__('The record could not be found.'));
        }
        $options = array('conditions' => array('Hosting.' . $this->Hosting->primaryKey => $id));
        $this->set('hosting', $this->Hosting->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function web_add($cid=null) {
        if ($this->request->is('post')) {
            $this->Hosting->create();
            if ($this->Hosting->save($this->request->data)) {
             $this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
               "link_text" => __('GO_TO'),
               "link_url" => array(
                  "action" => "view",
                  "controller" => "hostings",
                  $this->Hosting->id
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
      $domains = $this->Hosting->Domain->findAsCombo('asc', 'Domain.customer_id = '.$cid);
      if(count($domains) == 1){
        $domain = array_values($domains)[0];
        $domainDefaults = [
            'id' => array_keys($domains)[0],
            'ftp_user' => substr($domain, 0, strpos($domain, '.')),
            'ftp_url' => 'ftp.'.$domain,
          ];
      }
      $payPlans = $this->Hosting->PayPlan->findAsCombo();
      $this->set(compact('domains', 'payPlans', 'domainDefaults'));
    }else{
      $domains = $this->Hosting->Domain->findAsCombo();
      $payPlans = $this->Hosting->PayPlan->findAsCombo();
      $this->set(compact('domains', 'payPlans'));
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
        $this->Hosting->id = $id;
        if (!$this->Hosting->exists($id)) {
            throw new NotFoundException(__('The record could not be found.?>'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Hosting->save($this->request->data)) {
                $this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
                   "link_text" => __('GO_TO'),
                   "link_url" => array(
                      "action" => "view",
                      "controller" => "hostings",
                      $this->Hosting->id
                      )
                   ));
                $this->redirect($this->referer(array('action'=>'index'), true));
            } else {
                $this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('Hosting.' . $this->Hosting->primaryKey => $id));
            $this->request->data = $this->Hosting->find('first', $options);
        }
        $domains = $this->Hosting->Domain->findAsCombo();
        $payPlans = $this->Hosting->PayPlan->findAsCombo();
        $this->set(compact('domains', 'payPlans'));
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
        $this->Hosting->id = $id;
        if (!$this->Hosting->exists()) {
            throw new NotFoundException(__('The record could not be found.'));
        }

        $cid = $this->findClienteByHostingId($id);

        if ($this->Hosting->delete()) {
            $this->Session->setFlash(__('Record deleted'), 'flash/success');
            $this->redirect(array('controller' => 'services', $cid));
        }
        $this->Session->setFlash(__('The record was not deleted'), 'flash/error');
        $this->redirect(array('controller' => 'services', $cid));
    }

    private function findClienteByHostingId($id){
      $hosting = $this->Hosting->findById($id);
      $domains = $this->Hosting->Domain->findById($hosting['Hosting']['domain_id']);
      return $domains['Domain']['customer_id'];
    }
}
