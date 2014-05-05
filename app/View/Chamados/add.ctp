<div class="chamados form">
<?php echo $this->Form->create('Chamado'); ?>
	<fieldset>
		<legend><?php echo __('Add Chamado'); ?></legend>
	<?php
		echo $this->Form->input('tipo_id');
		echo $this->Form->input('descricao');
		echo $this->Form->input('contato');
		echo $this->Form->input('cliente_id');
		echo $this->Form->input('prioridade');
		echo $this->Form->input('problema_id');
		echo $this->Form->input('situacao_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Chamados'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Tipos'), array('controller' => 'tipos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipo'), array('controller' => 'tipos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clientes'), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cliente'), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Problemas'), array('controller' => 'problemas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Problema'), array('controller' => 'problemas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Situacaos'), array('controller' => 'situacaos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Situacao'), array('controller' => 'situacaos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Historicos'), array('controller' => 'historicos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Historico'), array('controller' => 'historicos', 'action' => 'add')); ?> </li>
	</ul>
</div>
