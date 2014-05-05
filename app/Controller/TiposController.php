<?php
App::uses('AppController', 'Controller');
/**
 * Tipos Controller
 *
 * @property Tipo $Tipo
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class TiposController extends AppController {

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
		$this->Tipo->recursive = 0;
		$this->set('tipos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Tipo->exists($id)) {
			throw new NotFoundException(__('Invalid tipo'));
		}
		$options = array('conditions' => array('Tipo.' . $this->Tipo->primaryKey => $id));
		$this->set('tipo', $this->Tipo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Tipo->create();
			if ($this->Tipo->save($this->request->data)) {
				$this->Session->setFlash(__('The tipo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tipo could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Tipo->exists($id)) {
			throw new NotFoundException(__('Invalid tipo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Tipo->save($this->request->data)) {
				$this->Session->setFlash(__('The tipo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tipo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Tipo.' . $this->Tipo->primaryKey => $id));
			$this->request->data = $this->Tipo->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Tipo->id = $id;
		if (!$this->Tipo->exists()) {
			throw new NotFoundException(__('Invalid tipo'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Tipo->delete()) {
			$this->Session->setFlash(__('The tipo has been deleted.'));
		} else {
			$this->Session->setFlash(__('The tipo could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
