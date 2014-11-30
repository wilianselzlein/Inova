
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
			
			<ul class="list-group">			
						<li class="list-group-item"><?php echo $this->Html->link(__('Edit').' '.__('RelatorioFiltro'), array('action' => 'edit', $relatoriofiltro['RelatorioFiltro']['id']), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Form->postLink(__('Delete').' '.__('RelatorioFiltro'), array('action' => 'delete', $relatoriofiltro['RelatorioFiltro']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $relatoriofiltro['RelatorioFiltro']['id'])); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List').' '.__('RelatorioFiltros'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New').' '.__('RelatorioFiltro'), array('action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- /.list-group -->
			
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .span3 -->
	
	<div id="page-content" class="col-sm-9">
		
		<div class="relatoriofiltros view">

			<h2><?php  echo __('RelatorioFiltro'); ?></h2>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($relatoriofiltro['RelatorioFiltro']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('relatorio_dataset_id'); ?></strong></td>
		<td>
			<?php echo h($relatoriofiltro['RelatorioFiltro']['relatorio_dataset_id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('campo'); ?></strong></td>
		<td>
			<?php echo h($relatoriofiltro['RelatorioFiltro']['campo']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('campo_alias'); ?></strong></td>
		<td>
			<?php echo h($relatoriofiltro['RelatorioFiltro']['campo_alias']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('tipo_filtro'); ?></strong></td>
		<td>
			<?php echo h($relatoriofiltro['RelatorioFiltro']['tipo_filtro']); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->
			
	</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
