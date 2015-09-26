<div class="panel panel-default">
	<div class="panel-heading">
		<h3>
			<span class="fa fa-envelope"></span> <?php echo __('Edit').' '.__('Webmail'); ?>               
			<div class="btn-group pull-right">
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
					<?php echo __('Actions');?><span class="caret"></span>
				</button>
				<ul class="dropdown-menu" role="menu">
					<li class="list-group-item"><?php echo $this->CustomHtml->linkIndex(__('Webmails')); ?></li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkIndex(__('Websites'), array('controller' => 'websites')); ?></li> 
					<li class="list-group-item"><?php echo $this->CustomHtml->linkAdd(__('Website'), array('controller' => 'websites')); ?></li> 
				</ul>
			</div>
		</h3>
	</div>
	<div class="panel-body">   
		<?php echo $this->Form->create('Webmail', array('role' => 'form', 'class'=>'form-horizontal')); ?>
		<fieldset>
			<div class="form-group">            
				<?php echo $this->Form->input('hosting_id', array('class' => 'form-control', 'div'=> array('class'=>'col-sm-10'))); ?>
			</div><!-- .form-group -->       
			<div class="form-group">
				<?php echo $this->Form->input('username', array('class' => 'form-control', 'div'=> array('class'=>'col-sm-4'))); ?>
				<?php echo $this->Form->input('password', array('class' => 'form-control', 'type' => 'text','div'=> array('class'=>'col-sm-4'))); ?>
				<?php echo $this->Form->input('size', array('label'=>__('size').' (MB)','class' => 'form-control', 'type' => 'text','div'=> array('class'=>'col-sm-2'))); ?>
			</div><!-- .form-group -->
			<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-large btn-primary')); ?>
		</fieldset>
		<?php echo $this->Form->end(); ?>
	</div>      
</div>