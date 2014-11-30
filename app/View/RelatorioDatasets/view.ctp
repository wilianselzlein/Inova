
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
			
			<ul class="list-group">			
						<li class="list-group-item"><?php echo $this->Html->link(__('Edit').' '.__('RelatorioDataset'), array('action' => 'edit', $relatoriodataset['RelatorioDataset']['id']), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Form->postLink(__('Delete').' '.__('RelatorioDataset'), array('action' => 'delete', $relatoriodataset['RelatorioDataset']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $relatoriodataset['RelatorioDataset']['id'])); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List').' '.__('RelatorioDatasets'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New').' '.__('RelatorioDataset'), array('action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- /.list-group -->
			
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .span3 -->
	
	<div id="page-content" class="col-sm-9">
		
		<div class="relatoriodatasets view">

			<h2><?php  echo __('RelatorioDataset'); ?></h2>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($relatoriodataset['RelatorioDataset']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('relatorio_id'); ?></strong></td>
		<td>
			<?php echo h($relatoriodataset['RelatorioDataset']['relatorio_id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('nome'); ?></strong></td>
		<td>
			<?php echo h($relatoriodataset['RelatorioDataset']['nome']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('sql'); ?></strong></td>
		<td>
			<?php echo h($relatoriodataset['RelatorioDataset']['sql']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('order'); ?></strong></td>
		<td>
			<?php echo h($relatoriodataset['RelatorioDataset']['order']); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->
			
	</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
