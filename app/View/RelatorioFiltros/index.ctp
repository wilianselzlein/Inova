
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
		
			<ul class="list-group">
				<li class="list-group-item"><?php echo $this->Html->link(__('New').' '.__('RelatorioFiltro'), array('action' => 'add'), array('class' => '')); ?></li>
			</ul><!-- /.list-group -->
			
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .col-sm-3 -->
	
	<div id="page-content" class="col-sm-9">

		<div class="filtros index">
		
			<h2><?php echo __('RelatorioFiltros'); ?></h2>
			
			<div class="table-responsive">
				<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th><?php echo $this->Paginator->sort('id'); ?></th>
							<th><?php echo $this->Paginator->sort('relatorio_dataset_id'); ?></th>
                                                        <th><?php echo $this->Paginator->sort('campo'); ?></th>
                                                        <th><?php echo $this->Paginator->sort('campo_alias'); ?></th>
                                                        <th><?php echo $this->Paginator->sort('tipo_filtro'); ?></th>
							<th class="actions"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
<?php foreach ($relatoriofiltros as $filtro): ?>
	<tr>
		<td><?php echo h($filtro['RelatorioFiltro']['id']); ?>&nbsp;</td>
		<td><?php echo h($filtro['RelatorioFiltro']['relatorio_dataset_id']); ?>&nbsp;</td>
                <td><?php echo h($filtro['RelatorioFiltro']['campo']); ?>&nbsp;</td>
                <td><?php echo h($filtro['RelatorioFiltro']['campo_alias']); ?>&nbsp;</td>
                <td><?php echo h($filtro['RelatorioFiltro']['tipo_filtro']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $filtro['RelatorioFiltro']['id']), array('class' => 'btn btn-default btn-xs')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $filtro['RelatorioFiltro']['id']), array('class' => 'btn btn-default btn-xs')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $filtro['RelatorioFiltro']['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $filtro['RelatorioFiltro']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
					</tbody>
				</table>
			</div><!-- /.table-responsive -->
			
			<p><small>
				<?php
					echo $this->Paginator->counter(array(
					'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
					));
				?>
			</small></p>

			<ul class="pagination">
				<?php
					echo $this->Paginator->prev('< ' . __('Previous'), array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
					echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'tag' => 'li', 'currentClass' => 'disabled'));
					echo $this->Paginator->next(__('Next') . ' >', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
				?>
			</ul><!-- /.pagination -->
			
		</div><!-- /.index -->
	
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->