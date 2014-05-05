<div class="clientes form">
<?php echo $this->Form->create('Cliente'); ?>
	<fieldset>
		<legend><?php echo __('Edit Cliente'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('fantasia');
		echo $this->Form->input('razaosocial');
		echo $this->Form->input('cpfcnpj');
		echo $this->Form->input('cidade_id');
		echo $this->Form->input('subgrupo_id');
		echo $this->Form->input('dtvenda');
		echo $this->Form->input('endereco');
		echo $this->Form->input('numero');
		echo $this->Form->input('bairro');
		echo $this->Form->input('complemento');
		echo $this->Form->input('ie');
		echo $this->Form->input('senha');
		echo $this->Form->input('dtinstalacao');
		echo $this->Form->input('contato');
		echo $this->Form->input('caixas');
		echo $this->Form->input('retaguardas');
		echo $this->Form->input('prioridade');
		echo $this->Form->input('mensalidade');
		echo $this->Form->input('valorvenda');
		echo $this->Form->input('estrutura');
		echo $this->Form->input('obs');
		echo $this->Form->input('user_id');
		echo $this->Form->input('telefone');
		echo $this->Form->input('celular');
		echo $this->Form->input('email');
		echo $this->Form->input('cep');
		echo $this->Form->input('unidade_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Cliente.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Cliente.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Clientes'), array('action' => 'index')); ?></li>
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
