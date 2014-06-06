<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">

			<ul class="list-group">
				<?php if ($basico == 'N') { ?> 
				<li class="list-group-item"><?php echo $this->Html->link(__('Cadastro').' '.__('Rápido'), array('action' => 'index', 'S'), array('class' => '')); ?></li>
				<?php } ?>
				<li class="list-group-item"><?php echo $this->Html->link(__('New').' '.__('Cliente'), array('action' => 'add', $basico), array('class' => '')); ?></li>
				<li class="list-group-item"><?php echo $this->Html->link(__('List').' '.__('Cidades'), array('controller' => 'cidades', 'action' => 'index'), array('class' => '')); ?></li> 
				<li class="list-group-item"><?php echo $this->Html->link(__('New').' '.__('Cidade'), array('controller' => 'cidades', 'action' => 'add'), array('class' => '')); ?></li> 
				<?php if ($basico == 'N') { ?> 
				<li class="list-group-item"><?php echo $this->Html->link(__('List').' '.__('Subgrupos'), array('controller' => 'subgrupos', 'action' => 'index'), array('class' => '')); ?></li> 
				<li class="list-group-item"><?php echo $this->Html->link(__('New').' '.__('Subgrupo'), array('controller' => 'subgrupos', 'action' => 'add'), array('class' => '')); ?></li> 
				<li class="list-group-item"><?php echo $this->Html->link(__('List').' '.__('Users'), array('controller' => 'users', 'action' => 'index'), array('class' => '')); ?></li> 
				<li class="list-group-item"><?php echo $this->Html->link(__('New').' '.__('User'), array('controller' => 'users', 'action' => 'add'), array('class' => '')); ?></li> 
				<?php } ?>
				<li class="list-group-item"><?php echo $this->Html->link(__('List').' '.__('Unidades'), array('controller' => 'unidades', 'action' => 'index'), array('class' => '')); ?></li> 
				<li class="list-group-item"><?php echo $this->Html->link(__('New').' '.__('Unidade'), array('controller' => 'unidades', 'action' => 'add'), array('class' => '')); ?></li> 
				<li class="list-group-item"><?php echo $this->Html->link(__('List').' '.__('Chamados'), array('controller' => 'chamados', 'action' => 'index'), array('class' => '')); ?></li> 
				<li class="list-group-item"><?php echo $this->Html->link(__('New').' '.__('Chamado'), array('controller' => 'chamados', 'action' => 'add'), array('class' => '')); ?></li> 
			</ul><!-- /.list-group -->
			
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .col-sm-3 -->
	
	<div id="page-content" class="col-sm-9">

		<div class="clientes index">
		
			<h2><?php echo __('Clientes'); ?></h2>
			
			<div class="table-responsive">
				<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th><?php echo $this->Paginator->sort('id'); ?></th>
						<?php if ($basico == 'N') { ?>
							<th><?php echo $this->Paginator->sort('fantasia'); ?></th>
							<th><?php echo $this->Paginator->sort('razaosocial'); ?></th>
							<th><?php echo $this->Paginator->sort('cpfcnpj'); ?></th>
							<th><?php echo $this->Paginator->sort('cidade_id'); ?></th>
							<th><?php echo $this->Paginator->sort('sistema_id'); ?></th>
							<th><?php echo $this->Paginator->sort('build'); ?></th>
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
				<?php } else {?>
							<th><?php echo $this->Paginator->sort('fantasia'); ?></th>
							<th><?php echo $this->Paginator->sort('razaosocial'); ?></th>
							<th><?php echo $this->Paginator->sort('cidade_id'); ?></th>
							<th><?php echo $this->Paginator->sort('endereco'); ?></th>
							<th><?php echo $this->Paginator->sort('numero'); ?></th>
							<th><?php echo $this->Paginator->sort('bairro'); ?></th>
							<th><?php echo $this->Paginator->sort('complemento'); ?></th>
							<th><?php echo $this->Paginator->sort('cep'); ?></th>
							<th><?php echo $this->Paginator->sort('contato'); ?></th>
							<th><?php echo $this->Paginator->sort('obs'); ?></th>
							<th><?php echo $this->Paginator->sort('telefone'); ?></th>
				<?php } ?>
							<th><?php echo $this->Paginator->sort('unidade_id'); ?></th>
                                                        <th><?php echo $this->Paginator->sort('prospect'); ?></th>
							<th class="actions"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
<?php foreach ($clientes as $cliente): ?>
	<tr>
	<?php if ($basico == 'N') { ?>
		<td><?php echo h($cliente['Cliente']['id']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['fantasia']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['razaosocial']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['cpfcnpj']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($cliente['Cidade']['nome'], array('controller' => 'cidades', 'action' => 'view', $cliente['Cidade']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($cliente['Sistema']['nome'], array('controller' => 'sistemas', 'action' => 'view', $cliente['Sistema']['id'])); ?>
		</td>
		<td><?php echo h($cliente['Cliente']['build']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($cliente['Subgrupo']['nome'], array('controller' => 'subgrupos', 'action' => 'view', $cliente['Subgrupo']['id'])); ?>
		</td>
		<td><?php echo date("d/m/y", strtotime($cliente['Cliente']['dtvenda'])); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['endereco']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['numero']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['bairro']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['complemento']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['ie']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['senha']); ?>&nbsp;</td>
		<td><?php echo date("d/m/y", strtotime($cliente['Cliente']['dtinstalacao'])); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['contato']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['caixas']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['retaguardas']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['prioridade']); ?>&nbsp;</td>
		<td><?php echo $this->Number->currency($cliente['Cliente']['mensalidade']/100, 'BRL'); ?>&nbsp;</td>
		<td><?php echo $this->Number->currency($cliente['Cliente']['valorvenda']/100, 'BRL'); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['estrutura']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['obs']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($cliente['User']['username'], array('controller' => 'users', 'action' => 'view', $cliente['User']['id'])); ?>
		</td>
		<td><?php echo h($cliente['Cliente']['telefone']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['celular']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['email']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['cep']); ?>&nbsp;</td>
	<?php } else {?>
		<td><?php echo h($cliente['Cliente']['id']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['fantasia']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['razaosocial']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($cliente['Cidade']['nome'], array('controller' => 'cidades', 'action' => 'view', $cliente['Cidade']['id'])); ?>
		</td>
		<td><?php echo h($cliente['Cliente']['endereco']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['numero']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['bairro']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['complemento']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['cep']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['contato']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['obs']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['telefone']); ?>&nbsp;</td>
	<?php } ?>
		<td>
			<?php echo $this->Html->link($cliente['Unidade']['nome'], array('controller' => 'unidades', 'action' => 'view', $cliente['Unidade']['id'])); ?>
		</td>
                <td><?php echo h($cliente['Cliente']['prospect']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $cliente['Cliente']['id']), array('class' => 'btn btn-default btn-xs')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $cliente['Cliente']['id'], $basico), array('class' => 'btn btn-default btn-xs')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $cliente['Cliente']['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $cliente['Cliente']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
					</tbody>
				</table>
			</div><!-- /.table-responsive -->
			
			<p><small>
				<?php
					echo $this->Paginator->counter(array(
					'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
					));
				?>
			</small></p>

			<ul class="pagination">
				<?php
					echo $this->Paginator->prev('< ' . __('Previous'), array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
					echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'tag' => 'li', 'currentClass' => 'disabled'));
					echo $this->Paginator->next(__('Next') . ' >', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
				?>
			</ul><!-- /.pagination -->
			
		</div><!-- /.index -->
	
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->