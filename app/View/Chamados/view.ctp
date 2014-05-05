<div class="chamados view">
<h2><?php echo __('Chamado'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($chamado['Chamado']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo'); ?></dt>
		<dd>
			<?php echo $this->Html->link($chamado['Tipo']['nome'], array('controller' => 'tipos', 'action' => 'view', $chamado['Tipo']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descricao'); ?></dt>
		<dd>
			<?php echo h($chamado['Chamado']['descricao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contato'); ?></dt>
		<dd>
			<?php echo h($chamado['Chamado']['contato']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cliente'); ?></dt>
		<dd>
			<?php echo $this->Html->link($chamado['Cliente']['razaosocial'], array('controller' => 'clientes', 'action' => 'view', $chamado['Cliente']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Prioridade'); ?></dt>
		<dd>
			<?php echo h($chamado['Chamado']['prioridade']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Problema'); ?></dt>
		<dd>
			<?php echo $this->Html->link($chamado['Problema']['nome'], array('controller' => 'problemas', 'action' => 'view', $chamado['Problema']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Situacao'); ?></dt>
		<dd>
			<?php echo $this->Html->link($chamado['Situacao']['nome'], array('controller' => 'situacaos', 'action' => 'view', $chamado['Situacao']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Chamado'), array('action' => 'edit', $chamado['Chamado']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Chamado'), array('action' => 'delete', $chamado['Chamado']['id']), null, __('Are you sure you want to delete # %s?', $chamado['Chamado']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Chamados'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chamado'), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php echo __('Related Historicos'); ?></h3>
	<?php if (!empty($chamado['Historico'])): ?>
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
	<?php foreach ($chamado['Historico'] as $historico): ?>
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
