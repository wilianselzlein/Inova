<div class="panel panel-default">
	<div class="panel-heading">
		<h3>
			<span class="fa fa-github-alt"></span> <?php echo __('Add').' '.__('Domain'); ?>               
			<div class="btn-group pull-right">
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
					<?php echo __('Actions');?><span class="caret"></span>
				</button>
				<ul class="dropdown-menu" role="menu">
					<li class="list-group-item"><?php echo $this->CustomHtml->linkIndex(__('Domains')); ?></li>
					<li class="divider"></li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkIndex(__('Clientes'), array('controller' => 'clientes','web' => false)); ?></li> 
					<li class="list-group-item"><?php echo $this->CustomHtml->linkAdd(__('Cliente'), array('controller' => 'clientes', 'web' => false)); ?></li> 
					<li class="divider"></li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkIndex(__('PayPlans'), array('controller' => 'payplans')); ?></li> 
					<li class="list-group-item"><?php echo $this->CustomHtml->linkAdd(__('PayPlan'), array('controller' => 'payplans')); ?></li> 
				</ul>
			</div>
		</h3>
	</div>
	<div class="panel-body">   
		<?php echo $this->Form->create('Domain', array('role' => 'form', 'class'=>'form-horizontal')); ?>
		<fieldset>
			<div class="form-group">
				<?php echo $this->Form->input('customer_id', array('class' => 'form-control combobox','empty'=>true, 'div'=> array('class'=>'col-sm-10'))); ?>
			</div><!-- .form-group -->
			<div class="form-group">            
				<?php echo $this->Form->input('name', array('type' => 'text', 'class' => 'form-control', 'div'=> array('class'=>'col-sm-10'))); ?>
			</div><!-- .form-group -->       
			<div class="form-group">
				<?php echo $this->Form->input('dns1', array('class' => 'form-control', 'div'=> array('class'=>'col-sm-4'))); ?>         
				<?php echo $this->Form->input('dns2', array('class' => 'form-control', 'div'=> array('class'=>'col-sm-4'))); ?>
			</div><!-- .form-group -->
			<div class="form-group">
				<?php echo $this->Form->input('dns3', array('class' => 'form-control', 'div'=> array('class'=>'col-sm-4'))); ?>         
				<?php echo $this->Form->input('dns4', array('class' => 'form-control', 'div'=> array('class'=>'col-sm-4'))); ?>
			</div><!-- .form-group -->
			<div class="form-group">
				<?php echo $this->Form->input('pay_plan_id', array('class' => 'form-control combobox','empty'=>true, 'div'=> array('class'=>'col-sm-4'))); ?>        
				<?php echo $this->Form->input('is_active', array('class' => 'form-control checkbox2', 'div'=> array('class'=>'col-sm-4'), 'before'=>'<label>Ativo</label>', 'label'=>false, 'checked'=>true)); ?>
			</div><!-- .form-group -->
			<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-large btn-primary')); ?>
		</fieldset>
		<?php echo $this->Form->end(); ?>
	</div>			
</div>