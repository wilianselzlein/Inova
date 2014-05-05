<div class="clientes view">
<h2><?php echo __('Cliente'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fantasia'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['fantasia']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Razaosocial'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['razaosocial']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cpfcnpj'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['cpfcnpj']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cidade'); ?></dt>
		<dd>
			<?php echo $this->Html->link($cliente['Cidade']['nome'], array('controller' => 'cidades', 'action' => 'view', $cliente['Cidade']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Subgrupo'); ?></dt>
		<dd>
			<?php echo $this->Html->link($cliente['Subgrupo']['nome'], array('controller' => 'subgrupos', 'action' => 'view', $cliente['Subgrupo']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dtvenda'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['dtvenda']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Endereco'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['endereco']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Numero'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['numero']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bairro'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['bairro']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Complemento'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['complemento']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ie'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['ie']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Senha'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['senha']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dtinstalacao'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['dtinstalacao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contato'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['contato']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Caixas'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['caixas']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Retaguardas'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['retaguardas']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Prioridade'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['prioridade']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mensalidade'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['mensalidade']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valorvenda'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['valorvenda']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estrutura'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['estrutura']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Obs'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['obs']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($cliente['User']['username'], array('controller' => 'users', 'action' => 'view', $cliente['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Telefone'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['telefone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Celular'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['celular']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cep'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['cep']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Unidade'); ?></dt>
		<dd>
			<?php echo $this->Html->link($cliente['Unidade']['nome'], array('controller' => 'unidades', 'action' => 'view', $cliente['Unidade']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Cliente'), array('action' => 'edit', $cliente['Cliente']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Cliente'), array('action' => 'delete', $cliente['Cliente']['id']), null, __('Are you sure you want to delete # %s?', $cliente['Cliente']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Clientes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cliente'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cidades'), array('controller' => 'cidades', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cidade'), array('controller' => 'cidades', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Subgrupos'), array('controller' => 'subgrupos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subgrupo'), array('controller' => 'subgrupos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Unidades'), array('controller' => 'unidades', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Unidade'), array('controller' => 'unidades', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Chamados'), array('controller' => 'chamados', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chamado'), array('controller' => 'chamados', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Chamados'); ?></h3>
	<?php if (!empty($cliente['Chamado'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Tipo Id'); ?></th>
		<th><?php echo __('Descricao'); ?></th>
		<th><?php echo __('Contato'); ?></th>
		<th><?php echo __('Cliente Id'); ?></th>
		<th><?php echo __('Prioridade'); ?></th>
		<th><?php echo __('Problema Id'); ?></th>
		<th><?php echo __('Situacao Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($cliente['Chamado'] as $chamado): ?>
		<tr>
			<td><?php echo $chamado['id']; ?></td>
			<td><?php echo $chamado['tipo_id']; ?></td>
			<td><?php echo $chamado['descricao']; ?></td>
			<td><?php echo $chamado['contato']; ?></td>
			<td><?php echo $chamado['cliente_id']; ?></td>
			<td><?php echo $chamado['prioridade']; ?></td>
			<td><?php echo $chamado['problema_id']; ?></td>
			<td><?php echo $chamado['situacao_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'chamados', 'action' => 'view', $chamado['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'chamados', 'action' => 'edit', $chamado['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'chamados', 'action' => 'delete', $chamado['id']), null, __('Are you sure you want to delete # %s?', $chamado['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Chamado'), array('controller' => 'chamados', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
