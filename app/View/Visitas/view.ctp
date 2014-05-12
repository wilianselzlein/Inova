
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
			
			<ul class="list-group">			
						<li class="list-group-item"><?php echo $this->Html->link(__('Edit').' '.__('Visita'), array('action' => 'edit', $Visita['Visita']['id']), array('class' => '')); ?> </li>
		<!--<li class="list-group-item"><?php echo $this->Form->postLink(__('Delete').' '.__('Visita'), array('action' => 'delete', $Visita['Visita']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $Visita['Visita']['id'])); ?> </li>-->
		<li class="list-group-item"><?php echo $this->Html->link(__('List').' '.__('Visitas'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New').' '.__('Visita'), array('action' => 'add'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List').' '.__('Clientes'), array('controller' => 'clientes', 'action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New').' '.__('Cliente'), array('controller' => 'clientes', 'action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- /.list-group -->
			
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .span3 -->
	
	<div id="page-content" class="col-sm-9">
		
		<div class="Visitas view">

			<h2><?php  echo __('Visita'); ?></h2>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($Visita['Visita']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Cliente'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($Visita['Cliente']['razaosocial'], array('controller' => 'clientes', 'action' => 'view', $Visita['Cliente']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Data'); ?></strong></td>
		<td>
			<?php echo h($Visita['Visita']['data']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Nova'); ?></strong></td>
		<td>
			<?php echo h($Visita['Visita']['nova']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Detalhes'); ?></strong></td>
		<td>
			<?php echo h($Visita['Visita']['detalhes']); ?>
			&nbsp;
		</td>
</tr>
	</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

					
			
	</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
