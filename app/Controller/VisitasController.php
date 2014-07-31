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
     * move method
     *
     * @return void
     */
    function move ($id=null,$dayDelta/*,$minDelta,$allDay*/) {
        if ($id!=null) {            
            $ev = $this->Visita->findById($id);
            /*if ($allDay==true) {
                $ev['Event']['allday'] = 1;
            } else {
                $ev['Event']['allday'] = 0;
            }
            $ev['Visita']['end']=date('Y-m-d H:i:s',strtotime($dayDelta.' days '.$minDelta.' minutes',strtotime($ev['Event']['end'])));
            $ev['Visita']['data']=date('Y-m-d H:i:s',strtotime($dayDelta.' days ',strtotime($ev['Visita']['data'])));*/
            $ev['Visita']['data']= date('Y-m-d H:i:s',strtotime(($dayDelta / 1000 / 3600 * 60).' minutes ' , strtotime($ev['Visita']['data'])));
            $this->Visita->save($ev);
            //$this->redirect(array('controller' => 'events', 'action' => “calendar”,substr($ev['Event']['start'],0,4),substr($ev['Event']['start'],5,2),substr($ev['Event']['start'],8,2)));
        }
    }

    /**
     * feed method
     *
     * @return void
     */
    function feed() {
            //1. Transform request parameters to MySQL datetime format.
        $mysqlstart = date('Y-m-d', strtotime($this->params['url']['start'])); //H:i:s
        $mysqlend = date('Y-m-d', strtotime($this->params['url']['end'])); //H:i:s

        //2. Get the events corresponding to the time range
        $conditions = array('Visita.data BETWEEN ? AND ?'  => array($mysqlstart,$mysqlend));
        $events = $this->Visita->find('all',array('conditions' =>$conditions, 
            'fields' => array('Visita.id', 'Cliente.fantasia', 'Visita.data', 'AddTime(Visita.data, "1:0:0") as fim')));

        $this->set('events', $events);
    }
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
 * add2 method
 *
 * @return void
 */
	public function add2($ano = null, $mes = null, $dia = null, $hora = null, $min = null, $seg = null) {
		if ($this->request->is('post')) {
			$this->Visita->create();
			if ($this->Visita->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		}
                $users = $this->Visita->User->findAsCombo();
		$clientes = $this->Visita->Cliente->findAsCombo('asc', 'prospect = "S"');
                $this->layout='';
                $data = $dia . '/' . $mes . '/' . $ano;
                if (! $hora == null)
                  $hora = $hora . ':' . $min;
                $this->set('data', $data);
                $this->set('hora', $hora);
		$this->set(compact('clientes', 'users'));
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
                $users = $this->Visita->User->findAsCombo();
		$clientes = $this->Visita->Cliente->findAsCombo('asc', 'prospect = "S"');
                
                if(isset($selected)){                       
                    $this->set(compact('selected'));
                }
		$this->set(compact('clientes', 'users'));
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
                $users = $this->Visita->User->findAsCombo();
		$clientes = $this->Visita->Cliente->findAsCombo('asc', 'prospect = "S"');
		$this->set(compact('clientes', 'users'));
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
