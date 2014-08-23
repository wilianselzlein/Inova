<?php
App::uses('AppController', 'Controller');
/**
 * Aros Controller
 *
 * @property Aro $Aro
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ArosController extends AppController {

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
		$this->Aro->recursive = 0;
		$this->set('aros', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Aro->exists($id)) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		$options = array('conditions' => array('Aro.' . $this->Aro->primaryKey => $id));
		$this->set('Aro', $this->Aro->find('first', $options));
                
            $optionssons = array('conditions' => array('Aro.parent_id' => $id), 'recursive' => -1);
            $Sons = $this->Aro->find('all', $optionssons);
            
            $this->set(compact('Sons'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Aro->create();
			if ($this->Aro->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		}
            $parents = $this->Aro->find('list');
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
            $this->Aro->id = $id;
            if (!$this->Aro->exists($id)) {
                    throw new NotFoundException(__('The record could not be found.?>'));
            }
            if ($this->request->is('post') || $this->request->is('put')) {
                    if ($this->Aro->save($this->request->data)) {
                            $this->Session->setFlash(__('The record has been saved'), 'flash/success');
                            $this->redirect(array('action' => 'index'));
                    } else {
                            $this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
                    }
            } else {
                    $options = array('conditions' => array('Aro.' . $this->Aro->primaryKey => $id));
                    $this->request->data = $this->Aro->find('first', $options);
            }
            $parents = $this->Aro->find('list');
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
		$this->Aro->id = $id;
		if (!$this->Aro->exists()) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		if ($this->Aro->delete()) {
			$this->Session->setFlash(__('Record deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The record was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
