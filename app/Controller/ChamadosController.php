<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Chamados Controller
 *
 * @property Chamado $Chamado
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ChamadosController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session');
    
    /**
     * feed method
     *
     * @return void
     */
    function feed() {
        $mysqlstart = date('Y-m-d', strtotime($this->params['url']['start'])); //H:i:s
        $mysqlend = date('Y-m-d', strtotime($this->params['url']['end'])); //H:i:s
        
        $filtrousuario = '';
        $usuario_logado = $this->Session->read('Auth.User');
        if ((strtolower($usuario_logado['role']) !== 'admin') && (strtolower($usuario_logado['role']) !== 'admin')) {
           $filtrousuario = 'and Historicos.user_id = ' . $usuario_logado['id'];
        }
        
        $events = $this->Chamado->query('
                SELECT Chamados.id, Clientes.fantasia, Historicos.datainicial, AddTime(Historicos.datafinal, "1:0:0") as datafinal 
                FROM Chamados
                JOIN Clientes ON cliente_id = Clientes.id
                JOIN Historicos ON chamado_id = Chamados.id
                Where Historicos.datainicial BETWEEN "' . $mysqlstart . '" AND "' . $mysqlend . '"' . 
                $filtrousuario . ' order by Historicos.datainicial LIMIT 0,1;');

        $this->set('events', $events);
    }
    
    /**
     * TestaPermissao method
     *
     * @return void
     */
    private function TestaPermissao() {
        $usuario_logado = $this->Session->read('Auth.User');
        if (strtolower($usuario_logado['role']) == 'vendas') {
            //throw new NotFoundException(__('__PERMISSAO'));
            $this->Session->setFlash(__('__PERMISSAO'), 'flash/error');
            $this->redirect(array('controller' => 'Pages', 'action' => 'display'));
        }
    }

    /**
     * situacao method
     *
     * @return void
     */
	function situacao() {

		if (!empty($this->request->data)) {
                        $this->request->data['situacao_id'] = $this->request->data['value'];
            		if ($this->Chamado->save($this->request->data)) {
				$thisId=$this->Chamado->id;
				$this->header("Content-Type: application/json");
                                $situacao = $this->Chamado->Situacao->findById($this->request->data['value']);
				echo $situacao['Situacao']['nome'];
                                
                                $usuario_logado = $this->Session->read('Auth.User');
                                $historico['chamado_id'] = $this->request->data['id'];
                                $historico['user_id'] = $usuario_logado['id'];
                                $historico['datainicial'] = Date('Y.m.d H.i.s');
                                $historico['datafinal'] = Date('Y.m.d H.i.s');
                                $historico['descricao'] = 'Trocou a situação do chamado para ' . $situacao['Situacao']['nome'];

                                $this->Chamado->Historico->create();
                                $this->Chamado->Historico->save($historico);
                                                                
				exit;
			} else {
				return 'Fail';
			}
		}
		$this->Autorender = false;
		exit;
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
                        'Chamado.id' => array('operator' => 'LIKE'),
                        'Chamado.descricao' => array('operator' => 'LIKE'),
                        'Chamado.contato' => array('operator' => 'LIKE'),
                        'Tipo.nome' => array('operator' => 'LIKE'),
                        'Cliente.fantasia' => array('operator' => 'LIKE'),
                        'Cliente.razaosocial' => array('operator' => 'LIKE'),
                        'Prioridade.nome' => array('operator' => 'LIKE'),
                        'User.username' => array('operator' => 'LIKE'),
                        'Problema.nome' => array('operator' => 'LIKE'),
                        'Situacao.nome' => array('operator' => 'LIKE')
                        )
                )
                )
        );
        //$this->Filter->setPaginate('order', 'Cliente.RazaoSocial ASC'); // optional
        //$this->Filter->setPaginate('limit', 10); // optional
        $this->Filter->setPaginate('conditions', $this->Filter->getConditions());

        $situacoes_data = $this->Chamado->Situacao->find('all', array('recursive' => 0));
        for ($i = 0; $i < count($situacoes_data); $i++){
            $situacoes[$situacoes_data[$i]['Situacao']['id']] = $situacoes_data[$i]['Situacao']['nome']; 
        }
        
        $this->Chamado->recursive = 0;
        $this->set('chamados', $this->paginate());
        $this->set('situacoes', $situacoes);
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->TestaPermissao();
        if (!$this->Chamado->exists($id)) {
            throw new NotFoundException(__('The record could not be found.'));
        }
        $options = array('conditions' => array('Chamado.' . $this->Chamado->primaryKey => $id), 'recursive' => 2);
        $this->set('chamado', $this->Chamado->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add($selected = null) {
        $this->TestaPermissao();
        if ($this->request->is('post')) {
            $this->Chamado->create();
            if ($this->Chamado->save($this->request->data)) {
                 
                $usuario_logado = $this->Session->read('Auth.User');
                $historico['chamado_id'] = $this->Chamado->getLastInsertID();
                $historico['user_id'] = $usuario_logado['id'];
                $historico['datainicial'] = Date('Y/m/d H.i.s');
                $historico['datafinal'] = Date('Y/m/d H.i.s');
                $historico['descricao'] = 'Registro cadastrado';
                
                $this->Chamado->Historico->create();
                $this->Chamado->Historico->save($historico);

                $this->Session->setFlash(__('The record has been saved') . ' ' . $this->Chamado->getLastInsertID(), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
            }
        }
        if (isset($selected)) {
            $this->set(compact('selected'));
        }
        $tipos = $this->Chamado->Tipo->findAsCombo();
        $clientes = $this->Chamado->Cliente->findAsCombo('asc', 'prospect = "N"');
        $prioridades = $this->Chamado->Prioridade->findAsCombo();
        $problemas = $this->Chamado->Problema->findAsCombo();
        $situacaos = $this->Chamado->Situacao->findAsCombo();
        $users = $this->Chamado->User->findAsCombo();
        $usuario_logado = $this->Session->read('Auth.User');     
        $this->set(compact('tipos', 'clientes', 'problemas', 'situacaos', 'prioridades', 'users'));
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
        $this->Chamado->id = $id;
        if (!$this->Chamado->exists($id)) {
            throw new NotFoundException(__('The record could not be found.?>'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Chamado->save($this->request->data)) {
                $this->Session->setFlash(__('The record has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('Chamado.' . $this->Chamado->primaryKey => $id));
            $this->request->data = $this->Chamado->find('first', $options);
        }
        $tipos = $this->Chamado->Tipo->findAsCombo();
        $clientes = $this->Chamado->Cliente->findAsCombo('asc', 'prospect = "N"');
        $prioridades = $this->Chamado->Prioridade->findAsCombo();
        $problemas = $this->Chamado->Problema->findAsCombo();
        $situacaos = $this->Chamado->Situacao->findAsCombo();
        $users = $this->Chamado->User->findAsCombo();
        $this->set(compact('tipos', 'clientes', 'problemas', 'situacaos', 'prioridades', 'users'));
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
        $this->TestaPermissao();
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Chamado->id = $id;
        if (!$this->Chamado->exists()) {
            throw new NotFoundException(__('The record could not be found.'));
        }
        if ($this->Chamado->delete()) {
            $this->Session->setFlash(__('Record deleted'), 'flash/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('The record was not deleted'), 'flash/error');
        $this->redirect(array('action' => 'index'));
    }
    /**
     * getComboUsers method
     *
     * @throws NotFoundException
     * @throws MethodNotAllowedException
     * @param void
     * @return void
     */
    public function getComboUsers() {
        $cliente_id = 0;
        $usuario = 0;
        if (isset($this->request->data['Chamado'])) {
          $cliente_id = $this->request->data['Chamado']['cliente_id'];
          $clientes = $this->Chamado->Cliente->Find('list', array(
              'conditions' => array('Cliente.Id' => $cliente_id),
              'fields' => array('user_id')
              )
           );
          $usuario = $clientes[$cliente_id]; 
        }
        $users = $this->Chamado->User->find('list');
        
        $this->set('users', $users);
        $this->set('usuario', $usuario);
        $this->layout = 'ajax';
        $this->render('combos/users');
    }
}
