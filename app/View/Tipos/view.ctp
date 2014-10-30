
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
			
			<ul class="list-group">			
						<li class="list-group-item"><?php echo $this->Html->link(__('Edit').' '.__('Tipo'), array('action' => 'edit', $tipo['Tipo']['id']), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Form->postLink(__('Delete').' '.__('Tipo'), array('action' => 'delete', $tipo['Tipo']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $tipo['Tipo']['id'])); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List').' '.__('Tipos'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New').' '.__('Tipo'), array('action' => 'add'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List').' '.__('Chamados'), array('controller' => 'chamados', 'action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New').' '.__('Chamado'), array('controller' => 'chamados', 'action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- /.list-group -->
			
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .span3 -->
	
	<div id="page-content" class="col-sm-9">
		
		<div class="tipos view">

			<h2><?php  echo __('Tipo'); ?></h2>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($tipo['Tipo']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Nome'); ?></strong></td>
		<td>
			<?php echo h($tipo['Tipo']['nome']); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

					
			<div class="related">

				<h3><?php echo __('Chamados'); ?></h3>
				
				<?php if (!empty($tipo['Chamado'])): ?>
					
					<div class="table-responsive">
						<table class="table table-striped table-bordered">
							<thead>
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
							</thead>
							<tbody>
									<?php
										$i = 0;
										foreach ($tipo['Chamado'] as $chamado): ?>
		<tr>
			<td><?php echo $chamado['id']; ?></td>
			<td><?php echo DisplayField('Tipo', $chamado['tipo_id']); ?></td>
			<td><?php echo $this->Html->wrapText('C' . $chamado['id'], $chamado['descricao']); ?></td>
			<td><?php echo $chamado['contato']; ?></td>
			<td><?php echo DisplayField('Cliente', $chamado['cliente_id']); ?></td>
			<td><?php echo $chamado['prioridade']; ?></td>
			<td><?php echo DisplayField('problema', $chamado['problema_id']); ?></td>
			<td><?php echo DisplayField('Situacao', $chamado['situacao_id']); ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'chamados', 'action' => 'view', $chamado['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'chamados', 'action' => 'edit', $chamado['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'chamados', 'action' => 'delete', $chamado['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $chamado['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
							</tbody>
						</table><!-- /.table table-striped table-bordered -->
					</div><!-- /.table-responsive -->
					
				<?php endif; ?>

				
				<div class="actions">
					<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('New').' '.__('Chamado'), array('controller' => 'chamados', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- /.actions -->
				
			</div><!-- /.related -->

			
	</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
