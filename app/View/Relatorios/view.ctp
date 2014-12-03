
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
			
			<ul class="list-group">			
						<li class="list-group-item"><?php echo $this->Html->link(__('Edit').' '.__('Relatorio'), array('action' => 'edit', $relatorio['Relatorio']['id']), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Form->postLink(__('Delete').' '.__('Relatorio'), array('action' => 'delete', $relatorio['Relatorio']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $relatorio['Relatorio']['id'])); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List').' '.__('Relatorios'), array('action' => 'configurar'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New').' '.__('Relatorio'), array('action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- /.list-group -->
			
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .span3 -->
	
	<div id="page-content" class="col-sm-9">
		
		<div class="relatorios view">

			<h2><?php  echo __('Relatorio'); ?></h2>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($relatorio['Relatorio']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('nome'); ?></strong></td>
		<td>
			<?php echo h($relatorio['Relatorio']['nome']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('arquivo'); ?></strong></td>
		<td>
			<?php echo h($relatorio['Relatorio']['arquivo']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('tipo'); ?></strong></td>
		<td>    
			<?php echo h($relatorio['Relatorio']['tipo']); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->
			
	</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
