<?php

App::uses('AppController', 'Controller');

/**
 * Servicos Controller
 *
 * @property Servico $Servico
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class RelatoriosController extends AppController {

    var $uses = array('User');

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
        //$this->Servico->recursive = 0;
        $relatorios = array(array('id' => '1', 'name' => 'Relatório de Visitas'),);
        $this->set(compact('relatorios'));
    }

    public function filter($id = null) {

        if ($this->request->is('post') || $this->request->is('put')) {
            $visitas = $this->User->query($this->chooseSelect($id, $this->request->data));
            $periodo = null;
            if (isset($this->request->data)) {
                $periodo = " AND"
                        . " STR_TO_DATE(DATE_FORMAT(v.data, '%d/%m/%Y'), '%d/%m/%Y')"
                        . " BETWEEN "
                        . " STR_TO_DATE('" . $this->request->data['Visita']['data_inicial'] . "', '%d/%m/%Y')"
                        . " AND "
                        . " STR_TO_DATE('" . $this->request->data['Visita']['data_final'] . "', '%d/%m/%Y')";
            }
            $sql2 = "select 
(select count(v.cliente_id)  from visitas v where 1=1 " . $periodo . ") 'total_clientes_periodo',
(select count(v.cliente_id)  from visitas v where 1=1) 'total_clientes_visitados',
(select count(c.id) from clientes c where c.prospect != 'S')'total_clientes_ativos'

from DUAL ";
            
           
            $totais = $this->User->query($sql2);


            $this->set(compact('visitas', 'totais'));

            $this->layout = '/pdf/default';
            $this->render('/Relatorios/1/pdf');
            //if ($this->Grupo->save($this->request->data)) {
            //$this->Session->setFlash(__('The record has been saved'), 'flash/success');
            //$this->redirect(array('action' => 'index'));
            // } else {
            //$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
            //  }
        }
    }

    function chooseSelect($id, $data = null) {
        $sql = null;
        switch ($id) {
            case 1:
                $sql = 'select visita.data, usuario.username nome, cliente.fantasia, cliente.endereco, cliente.bairro, cidade.nome, cliente.telefone'
                        . ' from visitas visita'
                        . ' inner join clientes cliente on cliente.id = visita.cliente_id'
                        . ' inner join cidades cidade on cidade.id = cliente.cidade_id'
                        . ' inner join users    usuario on usuario.id = visita.user_id'
                        . ' where 1 = 1';

                if (isset($data)) {
                    $sql .= " AND"
                            . " STR_TO_DATE(DATE_FORMAT(data, '%d/%m/%Y'), '%d/%m/%Y') "
                            . " BETWEEN"
                            . " STR_TO_DATE('" . $data['Visita']['data_inicial'] . "', '%d/%m/%Y') "
                            . " AND"
                            . " STR_TO_DATE('" . $data['Visita']['data_final'] . "', '%d/%m/%Y')";
                }
                $sql .= " order by visita.data";
                break;
        }
        return $sql;
    }

}
