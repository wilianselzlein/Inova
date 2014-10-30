
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
			
			<ul class="list-group">			
						<li class="list-group-item"><?php echo $this->Html->link(__('Edit').' '.__('Checklist'), array('action' => 'edit', $checklist['Checklist']['id']), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Form->postLink(__('Delete').' '.__('Checklist'), array('action' => 'delete', $checklist['Checklist']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $checklist['Checklist']['id'])); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List').' '.__('Checklists'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New').' '.__('Checklist'), array('action' => 'add'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List').' '.__('Historicos'), array('controller' => 'historicos', 'action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New').' '.__('Historico'), array('controller' => 'historicos', 'action' => 'add'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List').' '.__('Servicos'), array('controller' => 'servicos', 'action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New').' '.__('Servico'), array('controller' => 'servicos', 'action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- /.list-group -->
			
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .span3 -->
	
	<div id="page-content" class="col-sm-9">
		
		<div class="checklists view">

			<h2><?php  echo __('Checklist'); ?></h2>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($checklist['Checklist']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Nome'); ?></strong></td>
		<td>
			<?php echo h($checklist['Checklist']['nome']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Tipo'); ?></strong></td>
		<td>
			<?php echo h($checklist['Checklist']['tipo']); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

					
			<div class="related">

				<h3><?php echo __('Historicos'); ?></h3>
				
				<?php if (!empty($checklist['Historico'])): ?>
					
					<div class="table-responsive">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
											<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Chamado Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Datainicial'); ?></th>
		<th><?php echo __('Datafinal'); ?></th>
		<th><?php echo __('Descricao'); ?></th>
		<th><?php echo __('Checklist Id'); ?></th>
									<th class="actions"><?php echo __('Actions'); ?></th>
								</tr>
							</thead>
							<tbody>
									<?php
										$i = 0;
										foreach ($checklist['Historico'] as $historico): ?>
		<tr>
			<td><?php echo $historico['id']; ?></td>
                        <td><?php echo $this->Html->wrapText('C' . $historico['chamado_id'], DisplayField('Chamado', $historico['chamado_id'], false)); ?></td>
			<td><?php echo DisplayField('User', $historico['user_id']); ?></td>
                        <td><?php echo $this->Time->i18nFormat($historico['datainicial'], $this->Html->__getDateTimeFormatView()); ?></td>
			<td><?php echo $this->Time->i18nFormat($historico['datafinal'], $this->Html->__getDateTimeFormatView()); ?></td>
                        <td><?php echo $this->Html->wrapText('D' . $historico['id'], $historico['descricao']); ?>&nbsp;</td>
                        <td><?php echo DisplayField('Checklist', $historico['checklist_id']); ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'historicos', 'action' => 'view', $historico['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'historicos', 'action' => 'edit', $historico['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'historicos', 'action' => 'delete', $historico['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $historico['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
							</tbody>
						</table><!-- /.table table-striped table-bordered -->
					</div><!-- /.table-responsive -->
					
				<?php endif; ?>

				
				<div class="actions">
					<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('New').' '.__('Historico'), array('controller' => 'historicos', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- /.actions -->
				
			</div><!-- /.related -->

					
			<div class="related">

				<h3><?php echo __('Servicos'); ?></h3>
				
				<?php if (!empty($checklist['Servico'])): ?>
					
					<div class="table-responsive">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
											<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nome'); ?></th>
									<th class="actions"><?php echo __('Actions'); ?></th>
								</tr>
							</thead>
							<tbody>
									<?php
										$i = 0;
										foreach ($checklist['Servico'] as $servico): ?>
		<tr>
			<td><?php echo $servico['id']; ?></td>
			<td><?php echo $servico['nome']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'servicos', 'action' => 'view', $servico['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'servicos', 'action' => 'edit', $servico['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'servicos', 'action' => 'delete', $servico['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $servico['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
							</tbody>
						</table><!-- /.table table-striped table-bordered -->
					</div><!-- /.table-responsive -->
					
				<?php endif; ?>

				
				<div class="actions">
					<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('New').' '.__('Servico'), array('controller' => 'servicos', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- /.actions -->
				
			</div><!-- /.related -->

			
	</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
