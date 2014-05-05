<?php
App::uses('AppController', 'Controller');
/**
 * Murals Controller
 *
 * @property Mural $Mural
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class MuralsController extends AppController {

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
		$this->Mural->recursive = 0;
		$this->set('murals', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Mural->exists($id)) {
			throw new NotFoundException(__('Invalid mural'));
		}
		$options = array('conditions' => array('Mural.' . $this->Mural->primaryKey => $id));
		$this->set('mural', $this->Mural->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Mural->create();
			if ($this->Mural->save($this->request->data)) {
				$this->Session->setFlash(__('The mural has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mural could not be saved. Please, try again.'));
			}
		}
		$users = $this->Mural->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Mural->exists($id)) {
			throw new NotFoundException(__('Invalid mural'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Mural->save($this->request->data)) {
				$this->Session->setFlash(__('The mural has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mural could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Mural.' . $this->Mural->primaryKey => $id));
			$this->request->data = $this->Mural->find('first', $options);
		}
		$users = $this->Mural->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Mural->id = $id;
		if (!$this->Mural->exists()) {
			throw new NotFoundException(__('Invalid mural'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Mural->delete()) {
			$this->Session->setFlash(__('The mural has been deleted.'));
		} else {
			$this->Session->setFlash(__('The mural could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
