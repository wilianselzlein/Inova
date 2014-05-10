<nav class="navbar navbar-default" role="navigation">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button><!-- /.navbar-toggle -->
		<?php echo $this->Html->Link('Inovatech', 'http://inovatechinfo.com.br/sistema/', array('class' => 'navbar-brand')); ?>
	</div><!-- /.navbar-header -->
	<div class="collapse navbar-collapse navbar-ex1-collapse">
		<ul class="nav navbar-nav">
			<li class="active"><a href="#"><?php echo __('Home')?></a></li>
			<li><li><?php echo $this->Html->link(__('Users'), 	array('controller' => 'users', 	'action' => 'index'), array('onclick' =>"__loading();",'escape' => false)) ?></li></li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo __('Cadastros')?><b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><?php echo $this->Html->link(__('Chamados'), 	array('controller' => 'chamados', 	'action' => 'index'), array('onclick' =>"__loading();",'escape' => false)) ?></li>
					<li><?php echo $this->Html->link(__('Checklists'), 	array('controller' => 'checklists', 'action' => 'index'), array('onclick' =>"__loading();",'escape' => false)) ?></li>
					<li><?php echo $this->Html->link(__('Cidades'), 	array('controller' => 'cidades', 	'action' => 'index'), array('onclick' =>"__loading();",'escape' => false)) ?></li>
					<li><?php echo $this->Html->link(__('Clientes'), 	array('controller' => 'clientes', 	'action' => 'index'), array('onclick' =>"__loading();",'escape' => false)) ?></li>
					<li><?php echo $this->Html->link(__('Grupos'), 		array('controller' => 'grupos', 	'action' => 'index'), array('onclick' =>"__loading();",'escape' => false)) ?></li>
					<li><?php echo $this->Html->link(__('Históricos'), 	array('controller' => 'historicos', 'action' => 'index'), array('onclick' =>"__loading();",'escape' => false)) ?></li>
					<li><?php echo $this->Html->link(__('Mural'), 		array('controller' => 'murals', 	'action' => 'index'), array('onclick' =>"__loading();",'escape' => false)) ?></li>
					<li><?php echo $this->Html->link(__('Problemas'), 	array('controller' => 'problemas', 	'action' => 'index'), array('onclick' =>"__loading();",'escape' => false)) ?></li>
					<li><?php echo $this->Html->link(__('Serviços'), 	array('controller' => 'servicos', 	'action' => 'index'), array('onclick' =>"__loading();",'escape' => false)) ?></li>
					<li><?php echo $this->Html->link(__('Situações'), 	array('controller' => 'situacaos', 	'action' => 'index'), array('onclick' =>"__loading();",'escape' => false)) ?></li>
					<li><?php echo $this->Html->link(__('Subgrupos'), 	array('controller' => 'subgrupos', 	'action' => 'index'), array('onclick' =>"__loading();",'escape' => false)) ?></li>
					<li><?php echo $this->Html->link(__('Tipos'), 		array('controller' => 'tipos', 		'action' => 'index'), array('onclick' =>"__loading();",'escape' => false)) ?></li>				
					<li><?php echo $this->Html->link(__('Unidades'), 	array('controller' => 'unidades', 	'action' => 'index'), array('onclick' =>"__loading();",'escape' => false)) ?></li>				
				</ul>
			</li>
			<li style="font-style:italic"><?php echo $this->Html->link(__('Logout'), 	array('controller' => 'users', 	'action' => 'logout')) ?></li>
		</ul><!-- /.nav navbar-nav -->
	</div><!-- /.navbar-collapse -->
</nav><!-- /.navbar navbar-default -->