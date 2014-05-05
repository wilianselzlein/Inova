<?php
App::uses('AppController', 'Controller');
/**
 * Problemas Controller
 *
 * @property Problema $Problema
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ProblemasController extends AppController {

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
		$this->Problema->recursive = 0;
		$this->set('problemas', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Problema->exists($id)) {
			throw new NotFoundException(__('Invalid problema'));
		}
		$options = array('conditions' => array('Problema.' . $this->Problema->primaryKey => $id));
		$this->set('problema', $this->Problema->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Problema->create();
			if ($this->Problema->save($this->request->data)) {
				$this->Session->setFlash(__('The problema has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The problema could not be saved. Please, try again.'));
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
		if (!$this->Problema->exists($id)) {
			throw new NotFoundException(__('Invalid problema'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Problema->save($this->request->data)) {
				$this->Session->setFlash(__('The problema has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The problema could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Problema.' . $this->Problema->primaryKey => $id));
			$this->request->data = $this->Problema->find('first', $options);
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
		$this->Problema->id = $id;
		if (!$this->Problema->exists()) {
			throw new NotFoundException(__('Invalid problema'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Problema->delete()) {
			$this->Session->setFlash(__('The problema has been deleted.'));
		} else {
			$this->Session->setFlash(__('The problema could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
