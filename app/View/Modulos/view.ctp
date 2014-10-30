
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
			
			<ul class="list-group">			
						<li class="list-group-item"><?php echo $this->Html->link(__('Edit').' '.__('Modulo'), array('action' => 'edit', $modulo['Modulo']['id']), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Form->postLink(__('Delete').' '.__('Modulo'), array('action' => 'delete', $modulo['Modulo']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $modulo['Modulo']['id'])); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List').' '.__('Modulos'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New').' '.__('Modulo'), array('action' => 'add'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List').' '.__('Clientes'), array('controller' => 'clientes', 'action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New').' '.__('Cliente'), array('controller' => 'clientes', 'action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- /.list-group -->
			
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .span3 -->
	
	<div id="page-content" class="col-sm-9">
		
		<div class="modulos view">

			<h2><?php  echo __('Modulo'); ?></h2>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($modulo['Modulo']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Nome'); ?></strong></td>
		<td>
			<?php echo h($modulo['Modulo']['nome']); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

			<div class="related">

				<h3><?php echo __('Clientes'); ?></h3>
				
				<?php if (!empty($modulo['Cliente'])): ?>
					
					<div class="table-responsive">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
									<th><?php echo __('Id'); ?></th>
									<th><?php echo __('Fantasia'); ?></th>
									<th><?php echo __('Cidade'); ?></th>
									<th><?php echo __('Sistema'); ?></th>
									<th><?php echo __('Build'); ?></th>
									<th><?php echo __('Prioridade'); ?></th>
									<th><?php echo __('Telefone'); ?></th>
									<th class="actions"><?php echo __('Actions'); ?></th>
								</tr>
							</thead>
							<tbody>
								<?php
									$i = 0;
									foreach ($modulo['Cliente'] as $cliente): ?>
										<tr>
											<td><?php echo $cliente['id']; ?></td>
											<td><?php echo $cliente['fantasia']; ?></td>
											<td><?php echo DisplayField('Cidade', $cliente['cidade_id']); ?></td>
											<td><?php echo DisplayField('Sistema', $cliente['sistema_id']); ?></td>
											<td><?php echo $cliente['build']; ?></td>
											<td><?php echo DisplayField('Subgrupo', $cliente['subgrupo_id']); ?></td>
											<td><?php echo $cliente['telefone']; ?></td>
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
					<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('New').' '.__('Cliente'), array('controller' => 'clientes', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>
				</div><!-- /.actions -->
				
			</div><!-- /.related -->
			
	</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
