<div class="panel panel-default">
	<div class="panel-heading">
		<h3>
			<span class="fa fa-wordpress"></span> <?php echo __('Edit').' '.__('Website'); ?>               
			<div class="btn-group pull-right">
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
					<?php echo __('Actions');?><span class="caret"></span>
				</button>
				<ul class="dropdown-menu" role="menu">
					<li class="list-group-item"><?php echo $this->CustomHtml->linkIndex(__('Websites')); ?></li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkIndex(__('Hostings'), array('controller' => 'websites')); ?></li> 
					<li class="list-group-item"><?php echo $this->CustomHtml->linkAdd(__('Hosting'), array('controller' => 'websites')); ?></li> 
					<li class="list-group-item"><?php echo $this->CustomHtml->linkIndex(__('Themes'), array('controller' => 'themes')); ?></li> 
					<li class="list-group-item"><?php echo $this->CustomHtml->linkAdd(__('Theme'), array('controller' => 'themes')); ?></li> 
				</ul>
			</div>
		</h3>
	</div>
	<div class="panel-body">   
		<?php echo $this->Form->create('Website', array('role' => 'form', 'class'=>'form-horizontal')); ?>
		<fieldset>
			<div class="form-group">            
				<?php echo $this->Form->input('hosting_id', array('class' => 'form-control', 'div'=> array('class'=>'col-sm-8'))); ?>
				<?php echo $this->Form->input('theme_id', array('class' => 'form-control', 'div'=> array('class'=>'col-sm-4'))); ?>
			</div><!-- .form-group -->       
			<div class="form-group">
				<?php echo $this->Form->input('url', array('class' => 'form-control', 'div'=> array('class'=>'col-sm-12'))); ?>
			</div><!-- .form-group -->       
			<div class="form-group">
				<?php echo $this->Form->input('color1', array('class' => 'form-control', 'type'=>'color', 'div'=> array('class'=>'col-sm-3'))); ?>
				<?php echo $this->Form->input('color2', array('class' => 'form-control', 'type'=>'color', 'div'=> array('class'=>'col-sm-3'))); ?>
				<?php echo $this->Form->input('color3', array('class' => 'form-control', 'type'=>'color', 'div'=> array('class'=>'col-sm-3'))); ?>
				<?php echo $this->Form->input('color4', array('class' => 'form-control', 'type'=>'color', 'div'=> array('class'=>'col-sm-3'))); ?>
			</div><!-- .form-group -->       
			<div class="form-group">
				<?php echo $this->Form->input('wordpress_user', array('class' => 'form-control', 'div'=> array('class'=>'col-sm-4'))); ?>
				<?php echo $this->Form->input('wordpress_password', array('class' => 'form-control', 'div'=> array('class'=>'col-sm-4'))); ?>
				<?php echo $this->Form->input('wordpress_email', array('class' => 'form-control', 'div'=> array('class'=>'col-sm-4'))); ?>
			</div><!-- .form-group -->
			<div class="form-group">

				<?php echo $this->Form->input('wordpress_version', array('class' => 'form-control', 'div'=> array('class'=>'col-sm-4'))); ?>
			</div><!-- .form-group -->
			<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-large btn-primary')); ?>
		</fieldset>
		<?php echo $this->Form->end(); ?>
	</div>      
</div>