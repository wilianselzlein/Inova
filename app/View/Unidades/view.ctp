<div class="unidades view">
<h2><?php echo __('Unidade'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($unidade['Unidade']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($unidade['Unidade']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cidade'); ?></dt>
		<dd>
			<?php echo $this->Html->link($unidade['Cidade']['nome'], array('controller' => 'cidades', 'action' => 'view', $unidade['Cidade']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Unidade'), array('action' => 'edit', $unidade['Unidade']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Unidade'), array('action' => 'delete', $unidade['Unidade']['id']), null, __('Are you sure you want to delete # %s?', $unidade['Unidade']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Unidades'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Unidade'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cidades'), array('controller' => 'cidades', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cidade'), array('controller' => 'cidades', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clientes'), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cliente'), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Clientes'); ?></h3>
	<?php if (!empty($unidade['Cliente'])): ?>
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
	<?php foreach ($unidade['Cliente'] as $cliente): ?>
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
