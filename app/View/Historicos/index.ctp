<div class="historicos index">
	<h2><?php echo __('Historicos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('chamado_id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('datainicial'); ?></th>
			<th><?php echo $this->Paginator->sort('datafinal'); ?></th>
			<th><?php echo $this->Paginator->sort('descricao'); ?></th>
			<th><?php echo $this->Paginator->sort('checklist_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($historicos as $historico): ?>
	<tr>
		<td><?php echo h($historico['Historico']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($historico['Chamado']['descricao'], array('controller' => 'chamados', 'action' => 'view', $historico['Chamado']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($historico['User']['username'], array('controller' => 'users', 'action' => 'view', $historico['User']['id'])); ?>
		</td>
		<td><?php echo h($historico['Historico']['datainicial']); ?>&nbsp;</td>
		<td><?php echo h($historico['Historico']['datafinal']); ?>&nbsp;</td>
		<td><?php echo h($historico['Historico']['descricao']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($historico['Checklist']['nome'], array('controller' => 'checklists', 'action' => 'view', $historico['Checklist']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $historico['Historico']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $historico['Historico']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $historico['Historico']['id']), null, __('Are you sure you want to delete # %s?', $historico['Historico']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Historico'), array('action' => 'add')); ?></li>
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
