<div class="users view">
<h2><?php echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Role'); ?></dt>
		<dd>
			<?php echo h($user['User']['role']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($user['User']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clientes'), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cliente'), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Historicos'), array('controller' => 'historicos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Historico'), array('controller' => 'historicos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Murals'), array('controller' => 'murals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mural'), array('controller' => 'murals', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Clientes'); ?></h3>
	<?php if (!empty($user['Cliente'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Fantasia'); ?></th>
		<th><?php echo __('Razaosocial'); ?></th>
		<th><?php echo __('Cpfcnpj'); ?></th>
		<th><?php echo __('Cidade Id'); ?></th>
		<th><?php echo __('Subgrupo Id'); ?></th>
		<th><?php echo __('Dtvenda'); ?></th>
		<th><?php echo __('Endereco'); ?></th>
		<th><?php echo __('Numero'); ?></th>
		<th><?php echo __('Bairro'); ?></th>
		<th><?php echo __('Complemento'); ?></th>
		<th><?php echo __('Ie'); ?></th>
		<th><?php echo __('Senha'); ?></th>
		<th><?php echo __('Dtinstalacao'); ?></th>
		<th><?php echo __('Contato'); ?></th>
		<th><?php echo __('Caixas'); ?></th>
		<th><?php echo __('Retaguardas'); ?></th>
		<th><?php echo __('Prioridade'); ?></th>
		<th><?php echo __('Mensalidade'); ?></th>
		<th><?php echo __('Valorvenda'); ?></th>
		<th><?php echo __('Estrutura'); ?></th>
		<th><?php echo __('Obs'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Telefone'); ?></th>
		<th><?php echo __('Celular'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Cep'); ?></th>
		<th><?php echo __('Unidade Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Cliente'] as $cliente): ?>
		<tr>
			<td><?php echo $cliente['id']; ?></td>
			<td><?php echo $cliente['fantasia']; ?></td>
			<td><?php echo $cliente['razaosocial']; ?></td>
			<td><?php echo $cliente['cpfcnpj']; ?></td>
			<td><?php echo $cliente['cidade_id']; ?></td>
			<td><?php echo $cliente['subgrupo_id']; ?></td>
			<td><?php echo $cliente['dtvenda']; ?></td>
			<td><?php echo $cliente['endereco']; ?></td>
			<td><?php echo $cliente['numero']; ?></td>
			<td><?php echo $cliente['bairro']; ?></td>
			<td><?php echo $cliente['complemento']; ?></td>
			<td><?php echo $cliente['ie']; ?></td>
			<td><?php echo $cliente['senha']; ?></td>
			<td><?php echo $cliente['dtinstalacao']; ?></td>
			<td><?php echo $cliente['contato']; ?></td>
			<td><?php echo $cliente['caixas']; ?></td>
			<td><?php echo $cliente['retaguardas']; ?></td>
			<td><?php echo $cliente['prioridade']; ?></td>
			<td><?php echo $cliente['mensalidade']; ?></td>
			<td><?php echo $cliente['valorvenda']; ?></td>
			<td><?php echo $cliente['estrutura']; ?></td>
			<td><?php echo $cliente['obs']; ?></td>
			<td><?php echo $cliente['user_id']; ?></td>
			<td><?php echo $cliente['telefone']; ?></td>
			<td><?php echo $cliente['celular']; ?></td>
			<td><?php echo $cliente['email']; ?></td>
			<td><?php echo $cliente['cep']; ?></td>
			<td><?php echo $cliente['unidade_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'clientes', 'action' => 'view', $cliente['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'clientes', 'action' => 'edit', $cliente['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'clientes', 'action' => 'delete', $cliente['id']), null, __('Are you sure you want to delete # %s?', $cliente['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Cliente'), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Historicos'); ?></h3>
	<?php if (!empty($user['Historico'])): ?>
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
	<?php foreach ($user['Historico'] as $historico): ?>
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
	<h3><?php echo __('Related Murals'); ?></h3>
	<?php if (!empty($user['Mural'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Data'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Recado'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Mural'] as $mural): ?>
		<tr>
			<td><?php echo $mural['id']; ?></td>
			<td><?php echo $mural['data']; ?></td>
			<td><?php echo $mural['user_id']; ?></td>
			<td><?php echo $mural['recado']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'murals', 'action' => 'view', $mural['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'murals', 'action' => 'edit', $mural['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'murals', 'action' => 'delete', $mural['id']), null, __('Are you sure you want to delete # %s?', $mural['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Mural'), array('controller' => 'murals', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
