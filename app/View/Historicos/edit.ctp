<div class="historicos form">
<?php echo $this->Form->create('Historico'); ?>
	<fieldset>
		<legend><?php echo __('Edit Historico'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('chamado_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('datainicial');
		echo $this->Form->input('datafinal');
		echo $this->Form->input('descricao');
		echo $this->Form->input('checklist_id');
		echo $this->Form->input('Servico');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Historico.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Historico.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Historicos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Chamados'), array('controller' => 'chamados', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chamado'), array('controller' => 'chamados', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Checklists'), array('controller' => 'checklists', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Checklist'), array('controller' => 'checklists', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Servicos'), array('controller' => 'servicos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Servico'), array('controller' => 'servicos', 'action' => 'add')); ?> </li>
	</ul>
</div>
