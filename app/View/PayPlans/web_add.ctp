<div class="panel panel-default">
	<div class="panel-heading">
		<h3>
			<span class="fa fa-calendar"></span> <?php echo __('Add').' '.__('PayPlan'); ?>               
			<div class="btn-group pull-right">
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
					<?php echo __('Actions');?><span class="caret"></span>
				</button>
				<ul class="dropdown-menu" role="menu">
					<li class="list-group-item"><?php echo $this->CustomHtml->linkIndex(__('PayPlans')); ?></li>
					<li class="divider"></li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkIndex(__('Domains'), array('controller' => 'domains')); ?></li> 
					<li class="list-group-item"><?php echo $this->CustomHtml->linkAdd(__('Domain'), array('controller' => 'domains')); ?></li> 
					<li class="divider"></li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkIndex(__('Hostings'), array('controller' => 'hostings')); ?></li> 
					<li class="list-group-item"><?php echo $this->CustomHtml->linkAdd(__('Hosting'), array('controller' => 'hostings')); ?></li> 
					<li class="divider"></li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkIndex(__('SocialMedias'), array('controller' => 'socialmedias')); ?></li> 
					<li class="list-group-item"><?php echo $this->CustomHtml->linkAdd(__('SocialMedia'), array('controller' => 'socialmedias')); ?></li> 
				</ul>
			</div>
		</h3>
	</div>
	<div class="panel-body">   
		<?php echo $this->Form->create('PayPlan', array('role' => 'form', 'class'=>'form-horizontal')); ?>
		<fieldset>
			<div class="form-group">            
				<?php echo $this->Form->input('name', array('type' => 'text', 'class' => 'form-control', 'div'=> array('class'=>'col-sm-12'))); ?>
			</div><!-- .form-group -->       
			<div class="form-group">
				<?php echo $this->Form->input('note', array('class' => 'form-control', 'div'=> array('class'=>'col-sm-12'))); ?>
			</div><!-- .form-group -->
			<div class="form-group">    
				<?php echo $this->Form->input('is_active', array('class' => 'form-control checkbox2', 'div'=> array('class'=>'col-sm-12'), 'before'=>'<label>Ativo</label>', 'label'=>false, 'checked'=>true)); ?>
			</div><!-- .form-group -->
			<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-large btn-primary')); ?>
		</fieldset>
		<?php echo $this->Form->end(); ?>
	</div>			
</div>