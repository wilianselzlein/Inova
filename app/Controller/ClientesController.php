<?php

App::uses('AppController', 'Controller');

/**
 * Clientes Controller
 *
 * @property Cliente $Cliente
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ClientesController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session');

    private function TestaPermissao() {
        $usuario_logado = $this->Session->read('Auth.User');        
        if (strtolower($usuario_logado['role']) == 'vendas') {
            //throw new NotFoundException(__('__PERMISSAO'));
            $this->Session->setFlash(__('__PERMISSAO'), 'flash/error');
            $this->redirect(array('action' => 'index', 'S'));            
        }
    }
    /**
     * index method
     *
     * @return void
     */
    public function index() {

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

        $this->set('clientes', $this->paginate(array('Cliente.Prospect' =>  'N')));//, 'Cliente.is_ativo'=> '1'
    }

        /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
        public function view($id = null) {
            if (!$this->Cliente->exists($id)) {
                throw new NotFoundException(__('The record could not be found.'));
            }
            $options = array('conditions' => array('Cliente.' . $this->Cliente->primaryKey => $id));
            $this->set('cliente', $this->Cliente->find('first', $options));
        }

    /**
     * add method
     *
     * @return void
     */
    public function add($origem=null) {       
        $this->TestaPermissao();
        if ($this->request->is('post')) {
            $this->Cliente->create();
            if ($this->Cliente->save($this->request->data)) {
               $this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
                   "link_text" => __('GO_TO'),
                   "link_url" => array(                  
                      "action" => "view",
                      $this->Cliente->id
                      )
                   ));
               if(isset($origem)){
                $this->redirect(array('controller' => $origem, 'action' => 'add', $this->Cliente->id));                   
            }else{
                $this->redirect(array('action' => 'index'));
            }
        } else {
            $this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
        }
    }
    $cidades = $this->Cliente->Cidade->findAsCombo();
    $sistemas = $this->Cliente->Sistema->findAsCombo();
    $subgrupos = $this->Cliente->Subgrupo->findAsCombo();
    $users = $this->Cliente->User->findAsCombo();
    $unidades = $this->Cliente->Unidade->findAsCombo();
    $modulos = $this->Cliente->Modulo->findAsCombo();
    $contadors = $this->Cliente->Contador->findAsCombo('asc', 'Contador.prospect = "C"');
    $this->set(compact('cidades', 'sistemas', 'subgrupos', 'users', 'unidades', 'modulos', 'contadors'));
}

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->TestaPermissao();
        $this->Cliente->id = $id;      
        if (!$this->Cliente->exists($id)) {
            throw new NotFoundException(__('The record could not be found.?>'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Cliente->save($this->request->data)) {
             $this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
                 "link_text" => __('GO_TO'),
                 "link_url" => array(                  
                  "action" => "view",
                  $this->Cliente->id
                  )
                 ));
             $this->redirect(array('action' => 'index'));
         } else {
            $this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
        }
    } else {
        $options = array('conditions' => array('Cliente.' . $this->Cliente->primaryKey => $id));
        $this->request->data = $this->Cliente->find('first', $options);
    }
    $cidades = $this->Cliente->Cidade->findAsCombo();
    $sistemas = $this->Cliente->Sistema->findAsCombo();
    $subgrupos = $this->Cliente->Subgrupo->findAsCombo();
    $users = $this->Cliente->User->findAsCombo();
    $unidades = $this->Cliente->Unidade->findAsCombo();
    $modulos = $this->Cliente->Modulo->findAsCombo();
    $contadors = $this->Cliente->Contador->findAsCombo('asc', 'Contador.prospect = "C"');
    $this->set(compact('cidades', 'sistemas', 'subgrupos', 'users', 'unidades', 'modulos', 'contadors'));
}

    /**
     * delete method
     *
     * @throws NotFoundException
     * @throws MethodNotAllowedException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Cliente->id = $id;
        if (!$this->Cliente->exists()) {
            throw new NotFoundException(__('The record could not be found.'));
        }
        if ($this->Cliente->delete()) {
            $this->Session->setFlash(__('Record deleted'), 'flash/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('The record was not deleted'), 'flash/error');
        $this->redirect(array('action' => 'index'));
    }

}
