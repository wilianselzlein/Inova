<div class="panel panel-default">
	<div class="panel-heading">
		<h3>
			<span class="fa fa-odnoklassniki"></span> <?php echo __('Prospectos'); ?>                
			<div class="btn-group pull-right">
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
					<?php echo __('Actions');?><span class="caret"></span>
				</button>
				<ul class="dropdown-menu" role="menu">		
					<li class="list-group-item"><?php echo $this->CustomHtml->linkAdd(__('Prospecto')); ?></li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkIndex(__('Cidades'), array('controller' => 'cidades')); ?></li> 
					<li class="list-group-item"><?php echo $this->CustomHtml->linkAdd(__('Cidade'), array('controller' => 'cidades')); ?></li> 
					<li class="list-group-item"><?php echo $this->CustomHtml->linkIndex(__('Unidades'), array('controller' => 'unidades')); ?></li> 
					<li class="list-group-item"><?php echo $this->CustomHtml->linkAdd(__('Unidade'), array('controller' => 'unidades')); ?></li> 
					<li class="list-group-item"><?php echo $this->CustomHtml->linkIndex(__('Chamados'), array('controller' => 'chamados')); ?></li> 
					<li class="list-group-item"><?php echo $this->CustomHtml->linkAdd(__('Chamado'), array('controller' => 'chamados')); ?></li> 
				</ul>
			</div>
		</h3>
	</div>
	<div class="panel-body">      
		<?php echo $this->element('filtros'); ?>
		<div class="table-responsive">         
			<table class="table table-bordered table-hover table-condensed">
				<thead>
					<tr>
						<th><?php echo $this->Paginator->sort('id'); ?></th>
						<th><?php echo $this->Paginator->sort('fantasia'); ?></th>
						<th><?php echo $this->Paginator->sort('razaosocial'); ?></th>
						<!-- <th><?php echo $this->Paginator->sort('cidade_id'); ?></th>
						<th><?php echo $this->Paginator->sort('endereco'); ?></th>
						<th><?php echo $this->Paginator->sort('numero'); ?></th>
						<th><?php echo $this->Paginator->sort('bairro'); ?></th>
						<th><?php echo $this->Paginator->sort('complemento'); ?></th>
						<th><?php echo $this->Paginator->sort('cep'); ?></th> -->
						<th><?php echo $this->Paginator->sort('contato'); ?></th>
						<th><?php echo $this->Paginator->sort('telefone'); ?></th>
						<th><?php echo $this->Paginator->sort('telefone2'); ?></th>
						<th><?php echo $this->Paginator->sort('celular'); ?></th>
						<th><?php echo $this->Paginator->sort('email'); ?></th>
						<!-- <th><?php echo $this->Paginator->sort('obs'); ?></th> -->
						<th class="actions"><?php echo __('Actions'); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($prospectos as $prospecto): ?>
						<tr>
							<td><?php echo h($prospecto['Prospecto']['id']); ?>&nbsp;</td>
							<td><?php echo h($prospecto['Prospecto']['fantasia']); ?>&nbsp;</td>
							<td><?php echo h($prospecto['Prospecto']['razaosocial']); ?>&nbsp;</td>
							<!-- <td>
								<?php echo $this->Html->link($prospecto['Cidade']['nome'], array('controller' => 'cidades', 'action' => 'view', $prospecto['Cidade']['id'])); ?>
							</td>
							<td><?php echo h($prospecto['Prospecto']['endereco']); ?>&nbsp;</td>
							<td><?php echo h($prospecto['Prospecto']['numero']); ?>&nbsp;</td>
							<td><?php echo h($prospecto['Prospecto']['bairro']); ?>&nbsp;</td>
							<td><?php echo h($prospecto['Prospecto']['complemento']); ?>&nbsp;</td>
							<td><?php echo h($prospecto['Prospecto']['cep']); ?>&nbsp;</td> -->
							<td><?php echo h($prospecto['Prospecto']['contato']); ?>&nbsp;</td>
							<td nowrap><?php echo h($prospecto['Prospecto']['telefone']); ?>&nbsp;</td>
							<td nowrap><?php echo h($prospecto['Prospecto']['telefone2']); ?>&nbsp;</td>
							<td nowrap><?php echo h($prospecto['Prospecto']['celular']); ?>&nbsp;</td>
							<td><?php echo h($prospecto['Prospecto']['email']); ?>&nbsp;</td>
							<!-- <td><?php echo h($prospecto['Prospecto']['obs']); ?>&nbsp;</td> -->							
							<td class="actions">
								<?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('action' => 'view', $prospecto['Prospecto']['id']), array('class' => 'btn btn-default btn-xs', 'title'=>__('View'), 'escape'=>false)); ?>
								<?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('action' => 'edit', $prospecto['Prospecto']['id']), array('class' => 'btn btn-default btn-xs', 'title'=>__('Edit'), 'escape'=>false)); ?>
								<?php echo $this->Form->postLink('<i class="fa fa-times"></i>', array('action' => 'delete', $prospecto['Prospecto']['id']), array('class' => 'btn btn-default btn-xs', 'title'=>__('Delete'), 'escape'=>false), __('Are you sure you want to delete # %s?', $prospecto['Prospecto']['id'])); ?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div><!-- /.table-responsive -->

	</div>
	<?php echo $this->element('Paginator'); ?>	
</div>