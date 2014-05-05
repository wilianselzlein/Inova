<div class="checklists form">
<?php echo $this->Form->create('Checklist'); ?>
	<fieldset>
		<legend><?php echo __('Edit Checklist'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nome');
		echo $this->Form->input('tipo');
		echo $this->Form->input('Servico');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Checklist.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Checklist.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Checklists'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Historicos'), array('controller' => 'historicos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Historico'), array('controller' => 'historicos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Servicos'), array('controller' => 'servicos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Servico'), array('controller' => 'servicos', 'action' => 'add')); ?> </li>
	</ul>
</div>
