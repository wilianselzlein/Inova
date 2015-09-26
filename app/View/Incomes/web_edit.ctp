<div class="panel panel-default">
	<div class="panel-heading">
		<h3>
			<span class="fa fa-money"></span> <?php echo __('Edit').' '.__('Income'); ?>               
			<div class="btn-group pull-right">
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
					<?php echo __('Actions');?><span class="caret"></span>
				</button>
				<ul class="dropdown-menu" role="menu">
					<li class="list-group-item"><?php echo $this->CustomHtml->linkIndex(__('Incomes')); ?></li>
					<li class="divider"></li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkIndex(__('Domains'), array('controller' => 'domains'));?></li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkAdd(__('Domain'), array('controller' => 'domains'));?></li>
					<li class="divider"></li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkIndex(__('Hostings'), array('controller' => 'hostings'));?></li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkAdd(__('Hosting'), array('controller' => 'hostings'));?></li>
					<li class="divider"></li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkIndex(__('SocialMedias'), array('controller' => 'socialmedias'));?></li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkAdd(__('SocialMedia'), array('controller' => 'socialmedias'));?></li>         
				</ul>
			</div>
		</h3>
	</div>
	<div class="panel-body">   
		<?php echo $this->Form->create('Income', array('role' => 'form', 'class'=>'form-horizontal')); ?>
		<fieldset>
			<div class="form-group">            
				<?php echo $this->Form->input('value', array('class' => 'form-control', 'div'=> array('class'=>'col-sm-6'))); ?> 
				<?php echo $this->Form->input('date', array('type' => 'text','class' => 'form-control datepickerStart', 'div'=> array('class'=>'col-sm-6'))); ?> 
			</div><!-- .form-group -->
			<div class="form-group">    
				<?php echo $this->Form->input('domain_id', array('class' => 'form-control', 'div'=> array('class'=>'col-sm-4'), 'empty' => true)); ?>
				<?php echo $this->Form->input('hosting_id', array('class' => 'form-control', 'div'=> array('class'=>'col-sm-4'), 'empty' => true)); ?>
				<?php echo $this->Form->input('socialMedia_id', array('class' => 'form-control', 'div'=> array('class'=>'col-sm-4'), 'empty' => true)); ?>
			</div><!-- .form-group -->
			<div class="form-group">  
				<?php echo $this->Form->input('is_paid', array('class' => 'form-control checkbox2', 'div'=> array('class'=>'col-sm-12'), 'before'=>'<label>Pago</label>', 'label'=>false, 'checked'=>true)); ?>
			</div><!-- .form-group -->
			<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-large btn-primary')); ?>
		</fieldset>
		<?php echo $this->Form->end(); ?>
	</div>      
</div>