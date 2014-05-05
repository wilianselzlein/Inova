<div class="clientes index">
	<h2><?php echo __('Clientes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('fantasia'); ?></th>
			<th><?php echo $this->Paginator->sort('razaosocial'); ?></th>
			<th><?php echo $this->Paginator->sort('cpfcnpj'); ?></th>
			<th><?php echo $this->Paginator->sort('cidade_id'); ?></th>
			<th><?php echo $this->Paginator->sort('subgrupo_id'); ?></th>
			<th><?php echo $this->Paginator->sort('dtvenda'); ?></th>
			<th><?php echo $this->Paginator->sort('endereco'); ?></th>
			<th><?php echo $this->Paginator->sort('numero'); ?></th>
			<th><?php echo $this->Paginator->sort('bairro'); ?></th>
			<th><?php echo $this->Paginator->sort('complemento'); ?></th>
			<th><?php echo $this->Paginator->sort('ie'); ?></th>
			<th><?php echo $this->Paginator->sort('senha'); ?></th>
			<th><?php echo $this->Paginator->sort('dtinstalacao'); ?></th>
			<th><?php echo $this->Paginator->sort('contato'); ?></th>
			<th><?php echo $this->Paginator->sort('caixas'); ?></th>
			<th><?php echo $this->Paginator->sort('retaguardas'); ?></th>
			<th><?php echo $this->Paginator->sort('prioridade'); ?></th>
			<th><?php echo $this->Paginator->sort('mensalidade'); ?></th>
			<th><?php echo $this->Paginator->sort('valorvenda'); ?></th>
			<th><?php echo $this->Paginator->sort('estrutura'); ?></th>
			<th><?php echo $this->Paginator->sort('obs'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('telefone'); ?></th>
			<th><?php echo $this->Paginator->sort('celular'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('cep'); ?></th>
			<th><?php echo $this->Paginator->sort('unidade_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($clientes as $cliente): ?>
	<tr>
		<td><?php echo h($cliente['Cliente']['id']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['fantasia']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['razaosocial']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['cpfcnpj']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($cliente['Cidade']['nome'], array('controller' => 'cidades', 'action' => 'view', $cliente['Cidade']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($cliente['Subgrupo']['nome'], array('controller' => 'subgrupos', 'action' => 'view', $cliente['Subgrupo']['id'])); ?>
		</td>
		<td><?php echo h($cliente['Cliente']['dtvenda']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['endereco']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['numero']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['bairro']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['complemento']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['ie']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['senha']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['dtinstalacao']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['contato']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['caixas']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['retaguardas']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['prioridade']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['mensalidade']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['valorvenda']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['estrutura']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['obs']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($cliente['User']['username'], array('controller' => 'users', 'action' => 'view', $cliente['User']['id'])); ?>
		</td>
		<td><?php echo h($cliente['Cliente']['telefone']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['celular']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['email']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['cep']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($cliente['Unidade']['nome'], array('controller' => 'unidades', 'action' => 'view', $cliente['Unidade']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $cliente['Cliente']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $cliente['Cliente']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $cliente['Cliente']['id']), null, __('Are you sure you want to delete # %s?', $cliente['Cliente']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Cliente'), array('action' => 'add')); ?></li>
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
