<div class="murals form">
<?php echo $this->Form->create('Mural'); ?>
	<fieldset>
		<legend><?php echo __('Add Mural'); ?></legend>
	<?php
		echo $this->Form->input('data');
		echo $this->Form->input('user_id');
		echo $this->Form->input('recado');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Murals'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
