<?php 
$usuario_logado = $this->Session->read('Auth.User');
$user_id = $usuario_logado['id'];
?>
<ul class="nav navbar-nav side-nav">
   <li class="dropdown">
      <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"data-target="#tecnica"><i class="fa fa-fw fa-arrows-v"></i><?php echo __('Técnica');?><i class="fa fa-fw fa-caret-down"></i></a>
      <ul id="tecnica" class="dropdown-menu">
         <li><?php echo $this->Html->link(__('Chamados'), 	                  array('controller' => 'chamados','action' => 'index'));?></li>
         <li><?php echo $this->Html->link(__('Implantações'), 	               array('controller' => 'implantacaos','action' => 'index'));?></li>
      </ul>
   </li>
   <li class="dropdown">
      <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-target="#comercial"><i class="fa fa-fw fa-arrows-v"></i><?php echo __('Comercial');?><i class="fa fa-fw fa-caret-down"></i></a>
      <ul id="comercial" class="dropdown-menu">
         <li><?php echo $this->Html->link(__('Visitas'), 	                  array('controller' => 'visitas','action' => 'index'));?></li>
         <li><?php echo $this->Html->link(__('Prospectos'), 	               array('controller' => 'prospectos','action' => 'index'));?></li>
      </ul>
   </li>
   <li class="dropdown">
      <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-target="#cadastros"><i class="fa fa-fw fa-arrows-v"></i><?php echo __('Cadastros');?><i class="fa fa-fw fa-caret-down"></i></a>
      <ul id="cadastros" class="dropdown-menu">
         <li><?php echo $this->Html->link(__('Checklists'), 	               array('controller' => 'checklists','action' => 'index'));?></li>
         <li><?php echo $this->Html->link(__('Cidades'), 	                  array('controller' => 'cidades','action' => 'index'));?></li>
         <li><?php echo $this->Html->link(__('Clientes'), 	                  array('controller' => 'clientes','action' => 'index'));?></li>
         <li><?php echo $this->Html->link(__('Contadores'), 	               array('controller' => 'contadors','action' => 'index'));?></li>
         <li><?php echo $this->Html->link(__('Grupos'), 		                  array('controller' => 'grupos','action' => 'index'));?></li>
         <li><?php echo $this->Html->link(__('Históricos'), 	               array('controller' => 'historicos','action' => 'index'));?></li>
         <li><?php echo $this->Html->link(__('Módulos'), 	                  array('controller' => 'modulos','action' => 'index'));?></li>
         <li><?php echo $this->Html->link(__('Problemas'), 	                  array('controller' => 'problemas','action' => 'index'));?></li>
         <li><?php echo $this->Html->link(__('Serviços'), 	                  array('controller' => 'servicos','action' => 'index'));?></li>
         <li><?php echo $this->Html->link(__('Sistemas'), 	                  array('controller' => 'sistemas','action' => 'index'));?></li>
         <li><?php echo $this->Html->link(__('Situações'), 	                  array('controller' => 'situacaos','action' => 'index'));?></li>
         <li><?php echo $this->Html->link(__('Subgrupos'), 	                  array('controller' => 'subgrupos','action' => 'index'));?></li>
         <li><?php echo $this->Html->link(__('Tipos'), 		                  array('controller' => 'tipos','action' => 'index'));?></li>
         <li><?php echo $this->Html->link(__('Unidades'), 	                  array('controller' => 'unidades','action' => 'index'));?></li>    
         <!--usuario-->
         <li><?php echo $this->Html->link(__('Alterar Senha  '), 	            array('controller' => 'users','action' => 'changePassword'));?></li>    
         <li><?php echo $this->Html->link(__('Clientes da Carteira'), 	      array('controller' => 'users','action' => 'clientes', $user_id));?></li>
         <li><?php echo $this->Html->link(__('Contadores da Carteira'), 	   array('controller' => 'users','action' => 'contadores', $user_id));?></li>
         <li><?php echo $this->Html->link(__('Mural'),                        array('controller' => 'murals','action' => 'index'));?></li>
      </ul>
   </li>
   <li class="dropdown">
      <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-target="#administrativa"><i class="fa fa-fw fa-arrows-v"></i><?php echo __('Administrativa');?><i class="fa fa-fw fa-caret-down"></i></a>
      <ul id="administrativa" class="dropdown-menu">
         <li><?php echo $this->Html->link(__('Arquivos'), 	                   array('controller' => 'arquivos','action' => 'index'));?></li>
         <li><?php echo $this->Html->link(__('Relatórios'), 	                array('controller' => 'relatorios','action' => 'index'));?></li>
         <li><?php echo $this->Html->link(__('Users'), 	                      array('controller' => 'users','action' => 'index'));?></li>
      </ul>
   </li>
</ul>