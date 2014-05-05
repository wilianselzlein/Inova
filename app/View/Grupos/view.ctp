<div class="grupos view">
<h2><?php echo __('Grupo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($grupo['Grupo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($grupo['Grupo']['nome']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Grupo'), array('action' => 'edit', $grupo['Grupo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Grupo'), array('action' => 'delete', $grupo['Grupo']['id']), null, __('Are you sure you want to delete # %s?', $grupo['Grupo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Grupos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Grupo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Subgrupos'), array('controller' => 'subgrupos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subgrupo'), array('controller' => 'subgrupos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Subgrupos'); ?></h3>
	<?php if (!empty($grupo['Subgrupo'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th><?php echo __('Grupo Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($grupo['Subgrupo'] as $subgrupo): ?>
		<tr>
			<td><?php echo $subgrupo['id']; ?></td>
			<td><?php echo $subgrupo['nome']; ?></td>
			<td><?php echo $subgrupo['grupo_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'subgrupos', 'action' => 'view', $subgrupo['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'subgrupos', 'action' => 'edit', $subgrupo['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'subgrupos', 'action' => 'delete', $subgrupo['id']), null, __('Are you sure you want to delete # %s?', $subgrupo['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Subgrupo'), array('controller' => 'subgrupos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
