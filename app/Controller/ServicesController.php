<?php
App::uses('AppController', 'Controller');

/**
 * Document   : app/Controller/ClientesWeb.php
 * Created on : 2015-08-10 05:38 PM
 *
 * @author Pedro Escobar
 */
class ServicesController extends AppController
{
    public $uses = array('Cliente', 'Domain', 'Hosting', 'Webmail', 'SocialMedia', 'Income', 'Website', 'Webpage');
    public $components = array('Paginator', 'Session');


    private function TestaPermissao() {
      $usuario_logado = $this->Session->read('Auth.User');
      if ((strtolower($usuario_logado['role']) != 'root') && (strtolower($usuario_logado['role']) != 'admin') && (strtolower($usuario_logado['role']) != 'webmaster')) {
         //throw new NotFoundException(__('__PERMISSAO'));
         $this->Session->setFlash(__('__PERMISSAO'), 'flash/error');
         $this->redirect(array('controller' => 'Pages', 'action' => 'display', 'web' => false));
     }
 }


    public function web_customers(){

              $this->TestaPermissao();

              $this->Filter->addFilters(
                  array('filter1' => array('OR' => array(
                              //'Cliente.id' => array('operator' => 'LIKE'),
                      'Cliente.RazaoSocial' => array('operator' => 'LIKE'),
                      'Cliente.Fantasia' => array('operator' => 'LIKE'),
                      'Cliente.cpfcnpj' => array('operator' => 'LIKE'),
                              //'Subgrupo.nome' => array('operator' => 'LIKE'),
                              //'Cidade.nome' => array('operator' => 'LIKE'),
                              //'Cliente.endereco' => array('operator' => 'LIKE'),
                              //'Cliente.bairro' => array('operator' => 'LIKE'),
                              //'Cliente.numero' => array('operator' => 'LIKE'),
                              //'Cliente.complemento' => array('operator' => 'LIKE'),
                              //'Cliente.Ie' => array('operator' => 'LIKE'),
                              //'Cliente.contato' => array('operator' => 'LIKE'),
                              //'Cliente.estrutura' => array('operator' => 'LIKE'),
                              //'Cliente.build' => array('operator' => 'LIKE'),
                              //'Cliente.obs' => array('operator' => 'LIKE'),
                      'Cliente.telefone' => array('operator' => 'LIKE'),
                      'Cliente.telefone2' => array('operator' => 'LIKE'),
                      'Cliente.celular' => array('operator' => 'LIKE'),
                              //'Cliente.email' => array('operator' => 'LIKE'),
                              //'Cliente.cep' => array('operator' => 'LIKE'),
                              //'Unidade.nome' => array('operator' => 'LIKE'),
                              //'Sistema.nome' => array('operator' => 'LIKE')
                      )
      )
      )
      );
              $this->Filter->setPaginate('order', 'Cliente.RazaoSocial ASC'); // optional
              //$this->Filter->setPaginate('limit', 10); // optional
              $this->Filter->setPaginate('conditions', $this->Filter->getConditions());

              $this->Cliente->recursive = 0;


              $domains = $this->Domain->find('list', array('fields' => 'customer_id'));
              $socialMedias = $this->SocialMedia->find('list', array('fields' => 'customer_id'));
              $customerIds = array_unique(array_merge($domains, $socialMedias), SORT_REGULAR);

              //debug($domains);
              //debug($socialMedias);
              //debug(array_merge($domains, $socialMedias));
              //debug(array_unique(array_merge($domains, $socialMedias), SORT_REGULAR));

              $this->set('clientes', $this->paginate(array('Cliente.id' =>  $customerIds)));//, 'Cliente.is_ativo'=> '1'
    }
    /**
     * index method
     *
     * @return void
     */
    public function web_index($id = null) {
        $this->TestaPermissao();

        if (!$this->Cliente->exists($id)) {
            throw new NotFoundException(__('The record could not be found.'));
        }
        $this->Cliente->recursive = 0;

        //$this->Domain->recursive = 0;
        //$this->Hosting->recursive = 0;
        //$this->Domain->recursive = 1;
        //$this->set('domains', $this->paginate());

        $options = array('conditions' => array('Cliente.' . $this->Cliente->primaryKey => $id), 'fields' => array('id', 'fantasiarazaosocial'));
        $cliente = $this->Cliente->find('first', $options);
        $socialMedias = $this->SocialMedia->find('all', array('conditions' => array('SocialMedia.customer_id' => $id)));
        $socialmedias_id = Hash::extract($socialMedias, '{n}.SocialMedia.id');

        $domains = $this->Domain->find('all', array('conditions' => array('Domain.customer_id' => $id)));
        $domains_id = Hash::extract($domains, '{n}.Domain.id');

        $hostings = $this->Hosting->find('all', array('conditions' => array('Hosting.domain_id' => $domains_id)));
        $hostings_id = Hash::extract($hostings, '{n}.Hosting.id');

        $webmails = $this->Webmail->find('all', array('conditions' => array('Webmail.hosting_id' => $hostings_id)));

        $websites = $this->Website->find('all', array('conditions' => array('Website.hosting_id' => $hostings_id)));
        $websites_id = Hash::extract($websites, '{n}.Website.id');

        $webpages = $this->Webpage->find('all', array('conditions' => array('Webpage.website_id' => $websites_id)));

        $incomes = array();
        if (!empty($domains_id) || !empty($socialmedias_id) || !empty($hosting_id)) {
            $incomes = $this->Income->find('all', $this->getIncomeOptions($domains_id, $hostings_id, $socialmedias_id));
        }

        $this->set(compact('cliente', 'domains', 'hostings', 'webmails', 'socialMedias', 'incomes', 'websites', 'webpages'));
    }


    private function getIncomeOptions($domains_id = null, $hostings_id = null, $socialmedias_id = null) {
        $domainsOptions = array();
        $hostingsOptions = array();
        $socialMediasOptions = array();
        $incomeOptions = array();

        if (!empty($domains_id)) {
            $domainsOptions = array('Income.domain_id' => $domains_id);
        }
        if (!empty($hostings_id)) {
            $hostingsOptions = array('Income.hosting_id' => $hostings_id);
        }

        if (!empty($socialmedias_id)) {
            $socialMediasOptions = array('Income.social_media_id' => $socialmedias_id);
        }

        $incomeOptions = array('conditions' => array('OR' => array($domainsOptions, $hostingsOptions, $socialMediasOptions)));

        return $incomeOptions;
    }
}
