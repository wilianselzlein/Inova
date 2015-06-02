<?php 
$usuario_logado = $this->Session->read('Auth.User');
$user_id = $usuario_logado['id'];
?>
<nav class="navbar navbar-inverse navbar-fixed-top">
   <div class="navbar-header" >
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
         <span class="sr-only">Toggle navigation</span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
      </button>
      <?php echo $this->Html->Link($this->Html->Image('300-logo_white.png', array('height'=>'30px')), array('controller' => 'Pages', 'action' => 'display'), arraY('class' => 'navbar-brand', 'escape'=>false)); ?>
   </div>

   <ul class="nav navbar-nav navbar-right">
      <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
         <img id="gravatar-img" src="//www.gravatar.com/avatar/<?php echo md5( strtolower( trim( $this->Session->read('Auth.User.email') ) ) ) ?>?s=30" >
         <?php echo $this->Session->read('Auth.User.username'); ?>
         <b class="caret"></b></a>
         <ul class="dropdown-menu">
            <li>
               <div class="navbar-content">
                  <div class="row">
                     <div class="col-md-5">
                        <img id="gravatar-img" src="//www.gravatar.com/avatar/<?php echo md5( strtolower( trim( $this->Session->read('Auth.User.email') ) ) ) ?>"
                             class="img-responsive" />                                 
                     </div>
                     <div class="col-md-7">
                        <span><?php echo $usuario_logado['username']; ?></span>
                        <p class="text-muted small"><?php echo $usuario_logado['email']; ?></p>
                        <div class="divider"></div>                                                                  
                        <?php echo $this->Html->link(__('Ver mural'), array('controller' => 'murals', 	'action' => 'index'), array('class'=>'btn btn-primary btn-sm active'))?>
                        <div class="divider"></div>  
                     </div>
                  </div>
               </div>
               <div class="navbar-footer">
                  <div class="navbar-footer-content">
                     <div class="row">
                        <div class="col-md-6">
                           <?php echo $this->Html->link(__('Alterar senha'), 	array('controller' => 'users','action' => 'changePassword'), array('class'=>'btn btn-default btn-sm'));?>
                        </div>
                        <div class="col-md-6">
                           <?php echo $this->Html->link(__('Logout'), 	array('controller' => 'users', 	'action' => 'logout'), array('class'=>'btn btn-default btn-sm pull-right'));?>
                        </div>
                     </div>
                  </div>
               </div>
            </li>
         </ul>
      </li>
   </ul>
   
   <div class="collapse navbar-collapse navbar-ex1-collapse navbar-right">
      <ul class="nav navbar-nav">
         <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo __('Técnica')?><b class="caret"></b></a>
            <ul class="dropdown-menu">
               <li><?php echo $this->Html->link(__('Chamados'), 	   array('controller' => 'chamados', 	   'action' => 'index'), array('escape' => false)) ?></li>
               <li><?php echo $this->Html->link(__('Implantações'), 	array('controller' => 'implantacaos', 	'action' => 'index'), array('escape' => false)) ?></li>
            </ul>
         </li><!-- /. Técnica  -->
         <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo __('Comercial')?><b class="caret"></b></a>
            <ul class="dropdown-menu">
               <li><?php echo $this->Html->link(__('Visitas'), 	   array('controller' => 'visitas', 	   'action' => 'index'), array('escape' => false)) ?></li>
               <li><?php echo $this->Html->link(__('Prospectos'), 	array('controller' => 'prospectos', 	'action' => 'index'), array('escape' => false)) ?></li>
            </ul>
         </li><!-- /. Comercial  -->
         <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo __('Usuário')?><b class="caret"></b></a>
            <ul class="dropdown-menu">
               <li><?php echo $this->Html->link(__('Alterar Senha  '), 	         array('controller' => 'users', 	'action' => 'changePassword'), array('escape' => false)) ?></li>    
               <li><?php echo $this->Html->link(__('Clientes da Carteira'), 	   array('controller' => 'users', 	'action' => 'clientes', $user_id), array('escape' => false)) ?></li>
               <li><?php echo $this->Html->link(__('Contadores da Carteira'), 	array('controller' => 'users', 	'action' => 'contadores', $user_id), array('escape' => false)) ?></li>
               <li><?php echo $this->Html->link(__('Mural'),                     array('controller' => 'murals', 	'action' => 'index'), array('escape' => false)) ?></li>
            </ul>
         </li><!-- /. Usuário  -->
         <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo __('Cadastros')?><b class="caret"></b></a>
            <ul class="dropdown-menu">
               <li><?php echo $this->Html->link(__('Checklists'), array('controller' => 'checklists', 'action' => 'index'), array('escape' => false)) ?></li>
               <li><?php echo $this->Html->link(__('Cidades'), 	array('controller' => 'cidades', 	'action' => 'index'), array('escape' => false)) ?></li>
               <li><?php echo $this->Html->link(__('Clientes'), 	array('controller' => 'clientes', 	'action' => 'index'), array('escape' => false)) ?></li>
               <li><?php echo $this->Html->link(__('Contadores'), array('controller' => 'contadors', 	'action' => 'index'), array('escape' => false)) ?></li>
               <li><?php echo $this->Html->link(__('Grupos'), 		array('controller' => 'grupos', 	   'action' => 'index'), array('escape' => false)) ?></li>
               <li><?php echo $this->Html->link(__('Históricos'), array('controller' => 'historicos', 'action' => 'index'), array('escape' => false)) ?></li>
               <li><?php echo $this->Html->link(__('Módulos'), 	array('controller' => 'modulos', 	'action' => 'index'), array('escape' => false)) ?></li>
               <li><?php echo $this->Html->link(__('Problemas'), 	array('controller' => 'problemas', 	'action' => 'index'), array('escape' => false)) ?></li>
               <li><?php echo $this->Html->link(__('Serviços'), 	array('controller' => 'servicos', 	'action' => 'index'), array('escape' => false)) ?></li>
               <li><?php echo $this->Html->link(__('Sistemas'), 	array('controller' => 'sistemas', 	'action' => 'index'), array('escape' => false)) ?></li>
               <li><?php echo $this->Html->link(__('Situações'), 	array('controller' => 'situacaos', 	'action' => 'index'), array('escape' => false)) ?></li>
               <li><?php echo $this->Html->link(__('Subgrupos'), 	array('controller' => 'subgrupos', 	'action' => 'index'), array('escape' => false)) ?></li>
               <li><?php echo $this->Html->link(__('Tipos'), 		array('controller' => 'tipos', 		'action' => 'index'), array('escape' => false)) ?></li>
               <li><?php echo $this->Html->link(__('Unidades'), 	array('controller' => 'unidades', 	'action' => 'index'), array('escape' => false)) ?></li>                                        
            </ul>
         </li><!-- /. Cadastros  -->
         <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo __('Administrativa')?><b class="caret"></b></a>
            <ul class="dropdown-menu">
               <li><?php echo $this->Html->link(__('Arquivos'), 	array('controller' => 'arquivos', 	'action' => 'index'), array('escape' => false)) ?></li>
               <li><?php echo $this->Html->link(__('Relatórios'), 	array('controller' => 'relatorios', 	'action' => 'index'), array('escape' => false)) ?></li>
               <li><?php echo $this->Html->link(__('Users'), 	array('controller' => 'users', 	'action' => 'index'), array('escape' => false)) ?></li>
            </ul>
         </li><!-- /. Administrativa  -->		
         <!--<li style="font-style:italic"><php echo $this->Html->link(__('Logout'), 	array('controller' => 'users', 	'action' => 'logout')) ?></li /. Sair  -->
      </ul>
   </div>
</nav>

