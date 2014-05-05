<div class="checklists view">
<h2><?php echo __('Checklist'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($checklist['Checklist']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($checklist['Checklist']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo'); ?></dt>
		<dd>
			<?php echo h($checklist['Checklist']['tipo']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Checklist'), array('action' => 'edit', $checklist['Checklist']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Checklist'), array('action' => 'delete', $checklist['Checklist']['id']), null, __('Are you sure you want to delete # %s?', $checklist['Checklist']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Checklists'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Checklist'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Historicos'), array('controller' => 'historicos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Historico'), array('controller' => 'historicos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Servicos'), array('controller' => 'servicos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Servico'), array('controller' => 'servicos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Historicos'); ?></h3>
	<?php if (!empty($checklist['Historico'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Chamado Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Datainicial'); ?></th>
		<th><?php echo __('Datafinal'); ?></th>
		<th><?php echo __('Descricao'); ?></th>
		<th><?php echo __('Checklist Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($checklist['Historico'] as $historico): ?>
		<tr>
			<td><?php echo $historico['id']; ?></td>
			<td><?php echo $historico['chamado_id']; ?></td>
			<td><?php echo $historico['user_id']; ?></td>
			<td><?php echo $historico['datainicial']; ?></td>
			<td><?php echo $historico['datafinal']; ?></td>
			<td><?php echo $historico['descricao']; ?></td>
			<td><?php echo $historico['checklist_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'historicos', 'action' => 'view', $historico['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'historicos', 'action' => 'edit', $historico['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'historicos', 'action' => 'delete', $historico['id']), null, __('Are you sure you want to delete # %s?', $historico['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Historico'), array('controller' => 'historicos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Servicos'); ?></h3>
	<?php if (!empty($checklist['Servico'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($checklist['Servico'] as $servico): ?>
		<tr>
			<td><?php echo $servico['id']; ?></td>
			<td><?php echo $servico['nome']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'servicos', 'action' => 'view', $servico['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'servicos', 'action' => 'edit', $servico['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'servicos', 'action' => 'delete', $servico['id']), null, __('Are you sure you want to delete # %s?', $servico['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Servico'), array('controller' => 'servicos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
