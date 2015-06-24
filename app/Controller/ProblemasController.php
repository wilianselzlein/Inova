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
		$this->set('problemas', $this->paginate());
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
			throw new NotFoundException(__('The record could not be found.'));
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
				$this->Session->setFlash(__('The record has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
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
        $this->Problema->id = $id;
		if (!$this->Problema->exists($id)) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Problema->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
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
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Problema->id = $id;
		if (!$this->Problema->exists()) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		if ($this->Problema->delete()) {
			$this->Session->setFlash(__('Record deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The record was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
