<?php
App::uses('AppController', 'Controller');
/**
 * Checklists Controller
 *
 * @property Checklist $Checklist
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ChecklistsController extends AppController {

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
		$this->Checklist->recursive = 0;
		$this->set('checklists', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Checklist->exists($id)) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		$options = array('conditions' => array('Checklist.' . $this->Checklist->primaryKey => $id));
		$this->set('checklist', $this->Checklist->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Checklist->create();
			if ($this->Checklist->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$servicos = $this->Checklist->Servico->find('list');
		$this->set(compact('servicos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->Checklist->id = $id;
		if (!$this->Checklist->exists($id)) {
			throw new NotFoundException(__('The record could not be found.?>'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Checklist->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Checklist.' . $this->Checklist->primaryKey => $id));
			$this->request->data = $this->Checklist->find('first', $options);
		}
		$servicos = $this->Checklist->Servico->find('list');
		$this->set(compact('servicos'));
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
		$this->Checklist->id = $id;
		if (!$this->Checklist->exists()) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		if ($this->Checklist->delete()) {
			$this->Session->setFlash(__('Record deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The record was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
