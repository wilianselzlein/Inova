 <?php

App::uses('AppController', 'Controller');

/**
 * Contadors Controller
 *
 * @property Contador $Contador
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ContadorsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session');
 
    private function TestaPermissao($basico = 'N') {
        $usuario_logado = $this->Session->read('Auth.User');        
        if ((strtolower($usuario_logado['role']) == 'vendas') && ($basico == 'N')) {
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
                        'Contador.id' => array('operator' => 'LIKE'),
                        'Contador.RazaoSocial' => array('operator' => 'LIKE'),
                        'Contador.Fantasia' => array('operator' => 'LIKE'),
                        'Contador.cpfcnpj' => array('operator' => 'LIKE'),
                        'Cidade.nome' => array('operator' => 'LIKE'),
                        'Contador.endereco' => array('operator' => 'LIKE'),
                        'Contador.bairro' => array('operator' => 'LIKE'),
                        'Contador.numero' => array('operator' => 'LIKE'),
                        'Contador.complemento' => array('operator' => 'LIKE'),   
                        'Contador.Ie' => array('operator' => 'LIKE'),   
                        'Contador.contato' => array('operator' => 'LIKE'),   
                        'Contador.estrutura' => array('operator' => 'LIKE'),   
                        'Contador.build' => array('operator' => 'LIKE'),   
                        'Contador.obs' => array('operator' => 'LIKE'),   
                        'Contador.telefone' => array('operator' => 'LIKE'),
                        'Contador.celular' => array('operator' => 'LIKE'),
                        'Contador.email' => array('operator' => 'LIKE'),
                        'Contador.cep' => array('operator' => 'LIKE')
                        )
                    )
                )
        );
        $this->Filter->setPaginate('order', 'Contador.RazaoSocial ASC'); // optional
        //$this->Filter->setPaginate('limit', 10); // optional
        $this->Filter->setPaginate('conditions', $this->Filter->getConditions());
        
        $this->Contador->recursive = 0;

        $this->set('contadors', $this->paginate(array('Contador.Prospect' =>  'C')));
    }

        /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Contador->exists($id)) {
            throw new NotFoundException(__('The record could not be found.'));
        }
        $options = array('conditions' => array('Contador.' . $this->Contador->primaryKey => $id));
        $this->set('cliente', $this->Contador->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {       
        $this->TestaPermissao();
        if ($this->request->is('post')) {
            $this->Contador->create();
            if ($this->Contador->save($this->request->data)) {
                $this->Session->setFlash(__('The record has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index', $basico));
            } else {
                $this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
            }
        }
        $cidades = $this->Contador->Cidade->findAsCombo();
        $users = $this->Contador->User->findAsCombo();
        $this->set(compact('cidades', 'users'));
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
        $this->Contador->id = $id;      
        if (!$this->Contador->exists($id)) {
            throw new NotFoundException(__('The record could not be found.?>'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Contador->save($this->request->data)) {
                $this->Session->setFlash(__('The record has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('Contador.' . $this->Contador->primaryKey => $id));
            $this->request->data = $this->Contador->find('first', $options);
        }
        $cidades = $this->Contador->Cidade->findAsCombo();
        $users = $this->Contador->User->findAsCombo();
        $this->set(compact('cidades', 'users'));
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
        $this->Contador->id = $id;
        if (!$this->Contador->exists()) {
            throw new NotFoundException(__('The record could not be found.'));
        }
        if ($this->Contador->delete()) {
            $this->Session->setFlash(__('Record deleted'), 'flash/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('The record was not deleted'), 'flash/error');
        $this->redirect(array('action' => 'index'));
    }

}
