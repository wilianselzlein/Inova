
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
			
			<ul class="list-group">			
						<li class="list-group-item"><?php echo $this->Html->link(__('Edit').' '.__('Acao'), array('action' => 'edit', $acao['Acao']['id']), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Form->postLink(__('Delete').' '.__('Acao'), array('action' => 'delete', $acao['Acao']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $acao['Acao']['id'])); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List').' '.__('Acaos'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New').' '.__('Acao'), array('action' => 'add'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List').' '.__('Subacaos'), array('controller' => 'subacaos', 'action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New').' '.__('Subacao'), array('controller' => 'subacaos', 'action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- /.list-group -->
			
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .span3 -->
	
	<div id="page-content" class="col-sm-9">
		
		<div class="acaos view">

			<h2><?php  echo __('Acao'); ?></h2>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($acao['Acao']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Nome'); ?></strong></td>
		<td>
			<?php echo h($acao['Acao']['nome']); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

					
			<div class="related">

				<h3><?php echo __('Equipamentos'); ?></h3>
				
				<?php if (!empty($acao['Equipamento'])): ?>
					
					<div class="table-responsive">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
											<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Cliente'); ?></th>
		<th><?php echo __('Contato'); ?></th>
		<th><?php echo __('Telefone'); ?></th>
		<th><?php echo __('Data'); ?></th>
		<th><?php echo __('Técnico'); ?></th>
		<th><?php echo __('Fornecedor'); ?></th>
		<th><?php echo __('Observacao'); ?></th>
		<th><?php echo __('Retorno'); ?></th>
									<th class="actions"><?php echo __('Actions'); ?></th>
								</tr>
							</thead>
							<tbody>
									<?php foreach ($acao['Equipamento'] as $equipamento): ?>
		<tr>
			<td><?php echo $equipamento['id']; ?></td>
			<td><?php echo $this->Html->link($equipamento['Cliente']['razaosocial'], array('controller' => 'clientes', 'action' => 'view', $equipamento['cliente_id']), array('class' => '')); ?></td>
			<td><?php echo $equipamento['contato']; ?></td>
			<td><?php echo $equipamento['telefone']; ?></td>
            <td><?php echo date("d/m/y", strtotime($equipamento['data'])); ?>&nbsp;</td>
            <td><?php echo $this->Html->link($equipamento['User']['username'], array('controller' => 'users', 'action' => 'view', $equipamento['user_id']), array('class' => '')); ?></td>
			<td><?php echo $equipamento['fornecedor']; ?></td>
			<td><?php echo $equipamento['observacao']; ?></td>
			<td><?php echo date("d/m/y", strtotime($equipamento['retorno'])); ?>&nbsp;</td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'equipamentos', 'action' => 'view', $equipamento['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'equipamentos', 'action' => 'edit', $equipamento['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'equipamentos', 'action' => 'delete', $equipamento['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $equipamento['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
							</tbody>
						</table><!-- /.table table-striped table-bordered -->
					</div><!-- /.table-responsive -->
					
				<?php endif; ?>

				
				<div class="actions">
					<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('New').' '.__('Equipamento'), array('controller' => 'equipamentos', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- /.actions -->
				
			</div><!-- /.related -->

			
	</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
