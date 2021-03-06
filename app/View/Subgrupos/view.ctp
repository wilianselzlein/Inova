
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
			
			<ul class="list-group">			
						<li class="list-group-item"><?php echo $this->Html->link(__('Edit').' '.__('Subgrupo'), array('action' => 'edit', $subgrupo['Subgrupo']['id']), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Form->postLink(__('Delete').' '.__('Subgrupo'), array('action' => 'delete', $subgrupo['Subgrupo']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $subgrupo['Subgrupo']['id'])); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List').' '.__('Subgrupos'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New').' '.__('Subgrupo'), array('action' => 'add'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List').' '.__('Grupos'), array('controller' => 'grupos', 'action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New').' '.__('Grupo'), array('controller' => 'grupos', 'action' => 'add'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List').' '.__('Clientes'), array('controller' => 'clientes', 'action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New').' '.__('Cliente'), array('controller' => 'clientes', 'action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- /.list-group -->
			
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .span3 -->
	
	<div id="page-content" class="col-sm-9">
		
		<div class="subgrupos view">

			<h2><?php  echo __('Subgrupo'); ?></h2>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($subgrupo['Subgrupo']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Nome'); ?></strong></td>
		<td>
			<?php echo h($subgrupo['Subgrupo']['nome']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Grupo'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($subgrupo['Grupo']['nome'], array('controller' => 'grupos', 'action' => 'view', $subgrupo['Grupo']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

					
			<div class="related">

				<h3><?php echo __('Clientes'); ?></h3>
				
				<?php if (!empty($subgrupo['Cliente'])): ?>
					
					<div class="table-responsive">
						<table class="table table-striped table-bordered">
							<thead>
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
		<th><?php echo __('Telefone'); ?></th>
		<th><?php echo __('Celular'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Cep'); ?></th>
		<th><?php echo __('Unidade'); ?></th>
									<th class="actions"><?php echo __('Actions'); ?></th>
								</tr>
							</thead>
							<tbody>
									<?php
										$i = 0;
										foreach ($subgrupo['Cliente'] as $cliente): ?>
		<tr>
			<td><?php echo $cliente['id']; ?></td>
			<td><?php echo $cliente['fantasia']; ?></td>
			<td><?php echo $cliente['razaosocial']; ?></td>
			<td><?php echo $cliente['cpfcnpj']; ?></td>
			<td><?php echo DisplayField('Cidade', $cliente['cidade_id']); ?></td>
			<td><?php echo DisplayField('Subgrupo', $cliente['subgrupo_id']); ?></td>
			<td><?php echo date("d/m/y", strtotime($cliente['dtvenda'])); ?>&nbsp;</td>
			<td><?php echo $cliente['endereco']; ?></td>
			<td><?php echo $cliente['numero']; ?></td>
			<td><?php echo $cliente['bairro']; ?></td>
			<td><?php echo $cliente['complemento']; ?></td>
			<td><?php echo $cliente['ie']; ?></td>
			<td><?php echo $cliente['senha']; ?></td>
                        <td><?php echo date("d/m/y", strtotime($cliente['dtinstalacao'])); ?>&nbsp;</td>
			<td><?php echo $cliente['contato']; ?></td>
			<td><?php echo $cliente['caixas']; ?></td>
			<td><?php echo $cliente['retaguardas']; ?></td>
			<td><?php echo $cliente['prioridade']; ?></td>
			<td><?php echo $this->Number->currency($cliente['mensalidade'], 'BRL'); ?></td>
                        <td><?php echo $this->Number->currency($cliente['valorvenda'], 'BRL'); ?></td>
                        <td><?php echo $this->Html->wrapText('A' . $cliente['id'], $cliente['estrutura']); ?>&nbsp;</td>
			<td><?php echo $this->Html->wrapText('B' . $cliente['id'], $cliente['obs']); ?>&nbsp;</td>
			<td><?php echo $cliente['telefone']; ?></td>
			<td><?php echo $cliente['celular']; ?></td>
			<td><?php echo $cliente['email']; ?></td>
			<td><?php echo $cliente['cep']; ?></td>
			<td><?php echo DisplayField('Unidade', $cliente['unidade_id']); ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'clientes', 'action' => 'view', $cliente['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'clientes', 'action' => 'edit', $cliente['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'clientes', 'action' => 'delete', $cliente['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $cliente['id'])); ?>
			</td>
		</tr>

	<?php endforeach; ?>
							</tbody>
						</table><!-- /.table table-striped table-bordered -->
					</div><!-- /.table-responsive -->
					
				<?php endif; ?>

				
				<div class="actions">
					<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('New').' '.__('Cliente'), array('controller' => 'clientes', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- /.actions -->
				
			</div><!-- /.related -->

			
	</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
