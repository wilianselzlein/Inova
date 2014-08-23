<?php
App::uses('AppController', 'Controller');
/**
 * Acos Controller
 *
 * @property Aco $Aco
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AcosController extends AppController {

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
		$this->Aco->recursive = 0;
		$this->set('acos', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Aco->exists($id)) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		$options = array('conditions' => array('Aco.' . $this->Aco->primaryKey => $id));
		$this->set('Aco', $this->Aco->find('first', $options));
                
            $optionssons = array('conditions' => array('Aco.parent_id' => $id), 'recursive' => -1);
            $Sons = $this->Aco->find('all', $optionssons);
            
            $this->set(compact('Sons'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Aco->create();
			if ($this->Aco->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		}
            $parents = $this->Aco->find('list');
            $this->set(compact('parents'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {                   
            $this->Aco->id = $id;
            if (!$this->Aco->exists($id)) {
                    throw new NotFoundException(__('The record could not be found.?>'));
            }
            if ($this->request->is('post') || $this->request->is('put')) {
                    if ($this->Aco->save($this->request->data)) {
                            $this->Session->setFlash(__('The record has been saved'), 'flash/success');
                            $this->redirect(array('action' => 'index'));
                    } else {
                            $this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
                    }
            } else {
                    $options = array('conditions' => array('Aco.' . $this->Aco->primaryKey => $id));
                    $this->request->data = $this->Aco->find('first', $options);
            }
            $parents = $this->Aco->find('list');
            $this->set(compact('parents'));
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
		$this->Aco->id = $id;
		if (!$this->Aco->exists()) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		if ($this->Aco->delete()) {
			$this->Session->setFlash(__('Record deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The record was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
