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
		$this->set('subgrupos', $this->paginate());
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
			throw new NotFoundException(__('The record could not be found.'));
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
				$this->Session->setFlash(__('The record has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$grupos = $this->Subgrupo->Grupo->findAsCombo();
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
        $this->Subgrupo->id = $id;
		if (!$this->Subgrupo->exists($id)) {
			throw new NotFoundException(__('The record could not be found.?>'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Subgrupo->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Subgrupo.' . $this->Subgrupo->primaryKey => $id));
			$this->request->data = $this->Subgrupo->find('first', $options);
		}
		$grupos = $this->Subgrupo->Grupo->findAsCombo();
		$this->set(compact('grupos'));
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
		$this->Subgrupo->id = $id;
		if (!$this->Subgrupo->exists()) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		if ($this->Subgrupo->delete()) {
			$this->Session->setFlash(__('Record deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The record was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
