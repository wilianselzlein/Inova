
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
		
			<ul class="list-group">
				<li class="list-group-item"><?php echo $this->Html->link(__('New').' '.__('Aco'), array('action' => 'add'), array('class' => '')); ?></li>
				<li class="list-group-item"><?php echo $this->Html->link(__('List').' '.__('Users'), array('controller' => 'users', 'action' => 'index'), array('class' => '')); ?></li> 
				<li class="list-group-item"><?php echo $this->Html->link(__('New').' '.__('User'), array('controller' => 'users', 'action' => 'add'), array('class' => '')); ?></li> 
			</ul><!-- /.list-group -->
			
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .col-sm-3 -->
	
	<div id="page-content" class="col-sm-9">

		<div class="Acos index">
		
			<h2><?php echo __('Acos'); ?></h2>
			
			<div class="table-responsive">
				<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th><?php echo $this->Paginator->sort('id'); ?></th>
							<th><?php echo $this->Paginator->sort('parent_id'); ?></th>
							<th><?php echo $this->Paginator->sort('model'); ?></th>
                                                        <th><?php echo $this->Paginator->sort('Foreign_key', 'Relacionamento'); ?></th>
                                                        <th><?php echo $this->Paginator->sort('alias'); ?></th>
                                                        <th><?php echo $this->Paginator->sort('lft', 'Esquerda'); ?></th>
                                                        <th><?php echo $this->Paginator->sort('right', 'Direita'); ?></th>
							<th class="actions"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
<?php foreach ($acos as $Aco): ?>
	<tr>
		<td><?php echo h($Aco['Aco']['id']); ?>&nbsp;</td>
                <td><?php echo $this->Html->link(h($Aco['Aco']['parent_id']), array('action' => 'view', $Aco['Aco']['parent_id'])); ?></td>
                <td><?php echo h($Aco['Aco']['model']); ?>&nbsp;</td>
                <td><?php echo h($Aco['Aco']['foreign_key']); ?>&nbsp;</td>
                <td><?php echo h($Aco['Aco']['alias']); ?>&nbsp;</td>
                <td><?php echo h($Aco['Aco']['lft']); ?>&nbsp;</td>
                <td><?php echo h($Aco['Aco']['rght']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $Aco['Aco']['id']), array('class' => 'btn btn-default btn-xs')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $Aco['Aco']['id']), array('class' => 'btn btn-default btn-xs')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $Aco['Aco']['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $Aco['Aco']['id'])); ?>
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