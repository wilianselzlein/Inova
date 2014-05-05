<div class="murals view">
<h2><?php echo __('Mural'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($mural['Mural']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data'); ?></dt>
		<dd>
			<?php echo h($mural['Mural']['data']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($mural['User']['username'], array('controller' => 'users', 'action' => 'view', $mural['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Recado'); ?></dt>
		<dd>
			<?php echo h($mural['Mural']['recado']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Mural'), array('action' => 'edit', $mural['Mural']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Mural'), array('action' => 'delete', $mural['Mural']['id']), null, __('Are you sure you want to delete # %s?', $mural['Mural']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Murals'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mural'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
