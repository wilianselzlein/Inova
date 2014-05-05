<div class="chamados index">
	<h2><?php echo __('Chamados'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('tipo_id'); ?></th>
			<th><?php echo $this->Paginator->sort('descricao'); ?></th>
			<th><?php echo $this->Paginator->sort('contato'); ?></th>
			<th><?php echo $this->Paginator->sort('cliente_id'); ?></th>
			<th><?php echo $this->Paginator->sort('prioridade'); ?></th>
			<th><?php echo $this->Paginator->sort('problema_id'); ?></th>
			<th><?php echo $this->Paginator->sort('situacao_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($chamados as $chamado): ?>
	<tr>
		<td><?php echo h($chamado['Chamado']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($chamado['Tipo']['nome'], array('controller' => 'tipos', 'action' => 'view', $chamado['Tipo']['id'])); ?>
		</td>
		<td><?php echo h($chamado['Chamado']['descricao']); ?>&nbsp;</td>
		<td><?php echo h($chamado['Chamado']['contato']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($chamado['Cliente']['razaosocial'], array('controller' => 'clientes', 'action' => 'view', $chamado['Cliente']['id'])); ?>
		</td>
		<td><?php echo h($chamado['Chamado']['prioridade']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($chamado['Problema']['nome'], array('controller' => 'problemas', 'action' => 'view', $chamado['Problema']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($chamado['Situacao']['nome'], array('controller' => 'situacaos', 'action' => 'view', $chamado['Situacao']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $chamado['Chamado']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $chamado['Chamado']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $chamado['Chamado']['id']), null, __('Are you sure you want to delete # %s?', $chamado['Chamado']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Chamado'), array('action' => 'add')); ?></li>
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
