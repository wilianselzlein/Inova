<?php 
    $usuario_logado = $this->Session->read('Auth.User');
    $user_id = $usuario_logado['id'];
?>
    <nav class="navbar navbar-default" role="navigation">
	<div class="navbar-header" >
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button><!-- /.navbar-toggle -->
                <?php echo $this->Html->Link('Inovatech', array('controller' => 'Pages', 'action' => 'display'), arraY('class' => 'navbar-brand')); ?>
	</div><!-- /.navbar-header -->
	<div class="collapse navbar-collapse navbar-ex1-collapse">
		<ul class="nav navbar-nav">
			<!--<li class="active">
			    < ? php echo $this->Html->link(__('Chamados'), 	array('controller' => 'chamados', 	'action' => 'index'), array('onclick' =>"__loading();",'escape' => false)) ?>
			</li>-->
                        <li class="dropdown active">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo __('Técnica')?><b class="caret"></b></a>
				<ul class="dropdown-menu">
                            		<li><?php echo $this->Html->link(__('Chamados'), 	array('controller' => 'chamados', 	'action' => 'index'), array('onclick' =>"__loading();",'escape' => false)) ?></li>
					<li><?php echo $this->Html->link(__('Implantações'), 	array('controller' => 'implantacaos', 	'action' => 'index'), array('onclick' =>"__loading();",'escape' => false)) ?></li>
				</ul>
                        </li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo __('Comercial')?><b class="caret"></b></a>
				<ul class="dropdown-menu">
                            		<li><?php echo $this->Html->link(__('Visitas'), 	array('controller' => 'visitas', 	'action' => 'index'), array('onclick' =>"__loading();",'escape' => false)) ?></li>
					<li><?php echo $this->Html->link(__('Prospectos'), 	array('controller' => 'prospectos', 	'action' => 'index'), array('onclick' =>"__loading();",'escape' => false)) ?></li>
				</ul>
                        </li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo __('Usuário')?><b class="caret"></b></a>
				<ul class="dropdown-menu">
                                        <li><?php echo $this->Html->link(__('Alterar Senha  '), 	array('controller' => 'users', 	'action' => 'changePassword'), array('onclick' =>"__loading();",'escape' => false)) ?></li>    
                                        <li><?php echo $this->Html->link(__('Clientes da Carteira'), 	array('controller' => 'users', 	'action' => 'clientes', $user_id), array('onclick' =>"__loading();",'escape' => false)) ?></li>
                                        <li><?php echo $this->Html->link(__('Contadores da Carteira'), 	array('controller' => 'users', 	'action' => 'contadores', $user_id), array('onclick' =>"__loading();",'escape' => false)) ?></li>
                                        <li><?php echo $this->Html->link(__('Mural'),                   array('controller' => 'murals', 	'action' => 'index'), array('onclick' =>"__loading();",'escape' => false)) ?></li>
				</ul>
                        </li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo __('Cadastros')?><b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><?php echo $this->Html->link(__('Checklists'), 	array('controller' => 'checklists',     'action' => 'index'), array('onclick' =>"__loading();",'escape' => false)) ?></li>
					<li><?php echo $this->Html->link(__('Cidades'), 	array('controller' => 'cidades', 	'action' => 'index'), array('onclick' =>"__loading();",'escape' => false)) ?></li>
					<li><?php echo $this->Html->link(__('Clientes'), 	array('controller' => 'clientes', 	'action' => 'index'), array('onclick' =>"__loading();",'escape' => false)) ?></li>
                                        <li><?php echo $this->Html->link(__('Contadores'), 	array('controller' => 'contadors', 	'action' => 'index'), array('onclick' =>"__loading();",'escape' => false)) ?></li>
					<li><?php echo $this->Html->link(__('Grupos'), 		array('controller' => 'grupos', 	'action' => 'index'), array('onclick' =>"__loading();",'escape' => false)) ?></li>
					<li><?php echo $this->Html->link(__('Históricos'), 	array('controller' => 'historicos',     'action' => 'index'), array('onclick' =>"__loading();",'escape' => false)) ?></li>
					<li><?php echo $this->Html->link(__('Módulos'), 	array('controller' => 'modulos', 	'action' => 'index'), array('onclick' =>"__loading();",'escape' => false)) ?></li>
                                        <li><?php echo $this->Html->link(__('Problemas'), 	array('controller' => 'problemas', 	'action' => 'index'), array('onclick' =>"__loading();",'escape' => false)) ?></li>
                                        <li><?php echo $this->Html->link(__('Serviços'), 	array('controller' => 'servicos', 	'action' => 'index'), array('onclick' =>"__loading();",'escape' => false)) ?></li>
					<li><?php echo $this->Html->link(__('Sistemas'), 	array('controller' => 'sistemas', 	'action' => 'index'), array('onclick' =>"__loading();",'escape' => false)) ?></li>
					<li><?php echo $this->Html->link(__('Situações'), 	array('controller' => 'situacaos', 	'action' => 'index'), array('onclick' =>"__loading();",'escape' => false)) ?></li>
					<li><?php echo $this->Html->link(__('Subgrupos'), 	array('controller' => 'subgrupos', 	'action' => 'index'), array('onclick' =>"__loading();",'escape' => false)) ?></li>
					<li><?php echo $this->Html->link(__('Tipos'), 		array('controller' => 'tipos', 		'action' => 'index'), array('onclick' =>"__loading();",'escape' => false)) ?></li>
					<li><?php echo $this->Html->link(__('Unidades'), 	array('controller' => 'unidades', 	'action' => 'index'), array('onclick' =>"__loading();",'escape' => false)) ?></li>                                        
				</ul>
			</li>
                        <li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo __('Administrativa')?><b class="caret"></b></a>
				<ul class="dropdown-menu">
                            		<li><?php echo $this->Html->link(__('Relatórios'), 	array('controller' => 'relatorios', 	'action' => 'index'), array('onclick' =>"__loading();",'escape' => false)) ?></li>
					<li><?php echo $this->Html->link(__('Users'), 	array('controller' => 'users', 	'action' => 'index'), array('onclick' =>"__loading();",'escape' => false)) ?></li>
				</ul>
                        </li>		
			<li style="font-style:italic"><?php echo $this->Html->link(__('Logout'), 	array('controller' => 'users', 	'action' => 'logout')) ?></li>
		</ul><!-- /.nav navbar-nav -->
		<canvas id="mini-logo"  width="107" height="50" class="mini-logo"></canvas>
                <script>drawMiniLogo();</script>
		<!--php echo $this->Html->image('logo.png', array('class' =>'mini-logo'));-->
		 
	</div><!-- /.navbar-collapse -->
</nav><!-- /.navbar navbar-default -->
