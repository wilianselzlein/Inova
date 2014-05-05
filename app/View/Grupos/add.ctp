<div class="grupos form">
<?php echo $this->Form->create('Grupo'); ?>
	<fieldset>
		<legend><?php echo __('Add Grupo'); ?></legend>
	<?php
		echo $this->Form->input('nome');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Grupos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Subgrupos'), array('controller' => 'subgrupos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subgrupo'), array('controller' => 'subgrupos', 'action' => 'add')); ?> </li>
	</ul>
</div>
