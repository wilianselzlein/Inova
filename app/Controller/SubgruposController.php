<?php
App::uses('AppController', 'Controller');
/**
 * Subgrupos Controller
 *
 * @property Subgrupo $Subgrupo
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class SubgruposController extends AppController {

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
		$this->Subgrupo->recursive = 0;
		$this->set('subgrupos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Subgrupo->exists($id)) {
			throw new NotFoundException(__('Invalid subgrupo'));
		}
		$options = array('conditions' => array('Subgrupo.' . $this->Subgrupo->primaryKey => $id));
		$this->set('subgrupo', $this->Subgrupo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Subgrupo->create();
			if ($this->Subgrupo->save($this->request->data)) {
				$this->Session->setFlash(__('The subgrupo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The subgrupo could not be saved. Please, try again.'));
			}
		}
		$grupos = $this->Subgrupo->Grupo->find('list');
		$this->set(compact('grupos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Subgrupo->exists($id)) {
			throw new NotFoundException(__('Invalid subgrupo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Subgrupo->save($this->request->data)) {
				$this->Session->setFlash(__('The subgrupo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The subgrupo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Subgrupo.' . $this->Subgrupo->primaryKey => $id));
			$this->request->data = $this->Subgrupo->find('first', $options);
		}
		$grupos = $this->Subgrupo->Grupo->find('list');
		$this->set(compact('grupos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Subgrupo->id = $id;
		if (!$this->Subgrupo->exists()) {
			throw new NotFoundException(__('Invalid subgrupo'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Subgrupo->delete()) {
			$this->Session->setFlash(__('The subgrupo has been deleted.'));
		} else {
			$this->Session->setFlash(__('The subgrupo could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
