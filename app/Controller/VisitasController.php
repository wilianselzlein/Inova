<?php
App::uses('AppController', 'Controller');
/**
 * Visitas Controller
 *
 * @property Visita $Visita
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class VisitasController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
                $this->Filter->addFilters(
                        array('filter1' => array('OR' => array(
                                'Visita.id' => array('operator' => 'LIKE'),
                                'Visita.data' => array('operator' => 'LIKE'),
                                'Visita.nova' => array('operator' => 'LIKE'),
                                'Cliente.RazaoSocial' => array('operator' => 'LIKE'),
                                'Cliente.Fantasia' => array('operator' => 'LIKE'),
                                'Visita.detalhes' => array('operator' => 'LIKE')
                                )
                        )
                        )
                );
                //$this->Filter->setPaginate('order', 'Cliente.RazaoSocial ASC'); // optional
                //$this->Filter->setPaginate('limit', 10); // optional
                $this->Filter->setPaginate('conditions', $this->Filter->getConditions());

		$this->Visita->recursive = 0;
		$this->set('Visitas', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Visita->exists($id)) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		$options = array('conditions' => array('Visita.' . $this->Visita->primaryKey => $id));
		$this->set('Visita', $this->Visita->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($selected=null) {
		if ($this->request->is('post')) {
			$this->Visita->create();
			if ($this->Visita->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$clientes = $this->Visita->Cliente->findAsCombo('asc', 'prospect = "S"');
                
                if(isset($selected)){                       
                    $this->set(compact('selected'));
                }
		$this->set(compact('clientes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->Visita->id = $id;
		if (!$this->Visita->exists($id)) {
			throw new NotFoundException(__('The record could not be found.?>'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Visita->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Visita.' . $this->Visita->primaryKey => $id));
			$this->request->data = $this->Visita->find('first', $options);
		}
		$clientes = $this->Visita->Cliente->findAsCombo();
		$this->set(compact('clientes'));
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
		$this->Visita->id = $id;
		if (!$this->Visita->exists()) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		if ($this->Visita->delete()) {
			$this->Session->setFlash(__('Record deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The record was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
