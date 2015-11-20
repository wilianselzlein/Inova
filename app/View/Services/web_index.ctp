     <style>
     	.dashboard-icon
     	{
     		text-align: center;
     		float:left;
     		margin:15px;
     		width:10%;
     		border:0px solid red;
     		-moz-transition:-moz-transform 0.2s ease-in; 
     		-webkit-transition:-webkit-transform 0.2s ease-in; 
     		-o-transition:-o-transform 0.2s ease-in;           
     	}                
     	.dashboard-icon img, .dashboard-icon span
     	{

     		width:100%;
     		text-align: center;
     		display: block;
     	}        
     	.dashboard-icon:hover
     	{
     		-moz-transform:scale(1.3); 
     		-webkit-transform:scale(1.3);
     		-o-transform:scale(1.3);
     	}                 
     </style>
     <?php //debug($hostings_id);?>
     <?php //echo $this->element('sql_dump');?>
     <div class="panel panel-default">
     	<div class="panel-heading">
     		<h3>
     			<span class="fa fa-github-alt"></span> <?php echo __('Serviços Web').' => '.h($cliente['Cliente']['fantasiarazaosocial']); ?>               
     			
     			<div class="btn-group pull-right">
     				<!-- <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
     					<?php echo __('Actions');?><span class="caret"></span>
     				</button>
     				<ul class="dropdown-menu" role="menu">
     					<li class="list-group-item"><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New')  .' '.__('Domain'), array('action' => 'add'), array('escape' => false)); ?></li>
     					<li class="list-group-item"><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '   .__('List') .' '.__('Clientes'), array('controller' => 'clientes', 'action' => 'index'), array('escape' => false)); ?></li> 
     					<li class="list-group-item"><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New')  .' '.__('Cliente'), array('controller' => 'clientes', 'action' => 'add'), array('escape' => false)); ?></li> 
     					<li class="list-group-item"><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '   .__('List') .' '.__('Users'), array('controller' => 'users', 'action' => 'index'), array('escape' => false)); ?></li> 
     					<li class="list-group-item"><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New')  .' '.__('User'), array('controller' => 'users', 'action' => 'add'), array('escape' => false)); ?></li> 
     				</ul> -->
     			</div>
				
     		</h3>
     	</div>
     	<div class="panel-body">
     		<div class="dashboard-icon">
     			<?php echo $this->Html->link('<i class="fa fa-registered fa-4x"></i>', array('controller' => 'domains', 'action' => 'add', $cliente['Cliente']['id'], 'web' => true), array('escape'=> false)); ?>
     			<span><?php echo __('Domínios'); ?></span>
     		</div>
     		<div class="dashboard-icon">
     			<?php echo $this->Html->link('<i class="fa fa-cloud fa-4x"></i>', array('controller' => 'hostings', 'action' => 'add', $cliente['Cliente']['id'], 'web' => true), array('escape'=> false)); ?>
     			<span><?php echo __('Hostings'); ?></span>
     		</div>
     		<div class="dashboard-icon">
     			<?php echo $this->Html->link('<i class="fa fa-envelope fa-4x"></i>', array('controller' => 'webmails', 'action' => 'add', $cliente['Cliente']['id'], 'web' => true), array('escape'=> false)); ?>
     			<span><?php echo __('Emails'); ?></span>
     		</div>     		    
     		<div class="dashboard-icon">
     			<?php echo $this->Html->link('<i class="fa fa-share-alt fa-4x"></i>', array('controller' => 'socialmedias', 'action' => 'add', $cliente['Cliente']['id'], 'web' => true), array('escape'=> false)); ?>
     			<span><?php echo __('Social Medias'); ?></span>
     		</div>
     		<div class="dashboard-icon">
     			<?php echo $this->Html->link('<i class="fa fa-money fa-4x"></i>', array('controller' => 'incomes', 'action' => 'add', $cliente['Cliente']['id'], 'web' => true), array('escape'=> false)); ?>
     			<span><?php echo __('Incomes'); ?></span>
     		</div>
     		<div class="dashboard-icon">
     			<?php echo $this->Html->link('<i class="fa fa-wordpress fa-4x"></i>', array('controller' => 'websites', 'action' => 'add', $cliente['Cliente']['id'], 'web' => true), array('escape'=> false)); ?>
     			<span><?php echo __('Websites'); ?></span>
     		</div>
     		<div class="dashboard-icon">
     			<?php echo $this->Html->link('<i class="fa fa-file-text fa-4x"></i>', array('controller' => 'webpages', 'action' => 'add', $cliente['Cliente']['id'], 'web' => true), array('escape'=> false)); ?>
     			<span><?php echo __('Webpages'); ?></span>
     		</div>     		
     	</div>
     	<div class="panel-footer"> 
     		<?php echo $this->element('tabs/viewServices/services'); ?>
     	</div>  
     	<div>

     	</div> 
     </div>