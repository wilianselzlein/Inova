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

    public $uses = array('RelatorioDataset', 'RelatorioFiltro', 'Relatorio');

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
        $this->Relatorio->id = $id;
		if (!$this->Relatorio->exists($id)) {
			throw new NotFoundException(__('The record could not be found.'));
		}

       $options = array('recursive'=>'2', 'conditions' => array('Relatorio.' . $this->Relatorio->primaryKey => $id));
		$this->set('relatorio', $this->Relatorio->find('first', $options));       
      $this->set('relatorioFiltrosDisponiveis', 
                 $this->RelatorioFiltro->find('all', array('group'=>array('RelatorioFiltro.campo')))
                );
    }
   
    public function download($id = null){
       if ($this->request->is('post') || $this->request->is('put')) {
          $this->Relatorio->id = $id;
		    if (!$this->Relatorio->exists($id)) {
			   throw new NotFoundException(__('The record could not be found.'));
		    }
   
          $options = array('recursive' => '2','conditions' => array('Relatorio.' . $this->Relatorio->primaryKey => $id));
          $relatorio = $this->Relatorio->find('first', $options);   
          $this->set(compact('relatorio'));
	
          
          foreach ($relatorio['RelatorioDataset'] as $dataset){                          
             $sql = $dataset['sql'];
             foreach ($dataset['RelatorioFiltro'] as $filtro){    
               $sql .= $this->appendFilters($filtro);
             }
             //#debug PeterX
             //debug($sql);
             
             $queryResult = $this->Relatorio->query($sql);            
             
             
             $this->set($dataset['nome'], $queryResult);  
             
             
             
             
          }
       }
       $this->layout = '/pdf/default';
       $this->render('/Relatorios/pdfs/'.$relatorio['Relatorio']['arquivo']);
    }
       
   function appendFilters($filtro){
      $filtros = "";
      
      if (isset($this->request->data)) {             
            foreach ($this->request->data as $key => $value){                    
               $compositeKey = explode(",", $key);
               $compositeValue = explode(",", $value);
               
               $tipoFiltro = $compositeKey[0];
               
               $campo = $compositeKey[1];    
               
               if($campo == $filtro['campo']){
                  switch($tipoFiltro){
                     case 7:
                     {
                        $filtros .= " AND ".str_replace("_",".", $campo)." LIKE '%".$compositeValue[0]."%'";                                   
                        break;
                     }   
                     case 8:
                     {
                        $filtros .= " 
                        AND cast(".$campo." as DATE) BETWEEN STR_TO_DATE('".$compositeValue[0]."','%d/%m/%Y') ";           
                        $filtros .= " AND STR_TO_DATE('".$compositeValue[1]."','%d/%m/%Y') ";
                        break;
                     }    
                  }  
               }
               
                                        
            }
          }
      return $filtros;
   }
}
