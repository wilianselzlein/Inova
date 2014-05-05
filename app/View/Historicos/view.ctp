<div class="historicos view">
<h2><?php echo __('Historico'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($historico['Historico']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Chamado'); ?></dt>
		<dd>
			<?php echo $this->Html->link($historico['Chamado']['descricao'], array('controller' => 'chamados', 'action' => 'view', $historico['Chamado']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($historico['User']['username'], array('controller' => 'users', 'action' => 'view', $historico['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Datainicial'); ?></dt>
		<dd>
			<?php echo h($historico['Historico']['datainicial']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Datafinal'); ?></dt>
		<dd>
			<?php echo h($historico['Historico']['datafinal']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descricao'); ?></dt>
		<dd>
			<?php echo h($historico['Historico']['descricao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Checklist'); ?></dt>
		<dd>
			<?php echo $this->Html->link($historico['Checklist']['nome'], array('controller' => 'checklists', 'action' => 'view', $historico['Checklist']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Historico'), array('action' => 'edit', $historico['Historico']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Historico'), array('action' => 'delete', $historico['Historico']['id']), null, __('Are you sure you want to delete # %s?', $historico['Historico']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Historicos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Historico'), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php echo __('Related Servicos'); ?></h3>
	<?php if (!empty($historico['Servico'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($historico['Servico'] as $servico): ?>
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
