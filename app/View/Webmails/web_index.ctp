<div class="panel panel-default">
	<div class="panel-heading">
		<h3>
			<span class="fa fa-envelope"></span> <?php echo __('Webmails'); ?>                
			<div class="btn-group pull-right">
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
					<?php echo __('Actions');?><span class="caret"></span>
				</button>
				<ul class="dropdown-menu" role="menu">
					<li class="list-group-item"><?php echo $this->CustomHtml->linkAdd(__('Webmail')); ?></li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkIndex(__('Websites'), array('controller' => 'websites')); ?></li> 
					<li class="list-group-item"><?php echo $this->CustomHtml->linkAdd(__('Website'), array('controller' => 'websites')); ?></li> 
				</ul>
			</div>
		</h3>
	</div>

	<div class="panel-body">      
		<div class="table-responsive">         
			<table class="table table-bordered table-hover table-condensed">
				<thead>
					<tr>
						<th><?php echo $this->Paginator->sort('id'); ?></th>
						<th><?php echo $this->Paginator->sort('hosting_id'); ?></th>
						<th><?php echo $this->Paginator->sort('username'); ?></th>
						<th><?php echo $this->Paginator->sort('password'); ?></th>
						<th><?php echo $this->Paginator->sort('size', __('Size').' (MB)'); ?></th>
						<th class="actions"><?php echo __('Actions'); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($webmails as $webmail): ?>
						<tr>
							<td><?php echo h($webmail['Webmail']['id']); ?></td>
							<td><?php echo h($webmail['Webmail']['hosting_id']); ?></td>
							<td><?php echo h($webmail['Webmail']['username']); ?></td>
							<td><?php echo h($webmail['Webmail']['password']); ?></td>
							<td><?php echo h($webmail['Webmail']['size'].' (MB)'); ?></td>
							<td class="actions">
								<?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('action' => 'view', $webmail['Webmail']['id']), array('class' => 'btn btn-default btn-xs', 'title'=>__('View'), 'escape'=>false)); ?>
								<?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('action' => 'edit', $webmail['Webmail']['id']), array('class' => 'btn btn-default btn-xs', 'title'=>__('Edit'), 'escape'=>false)); ?>
								<?php echo $this->Form->postLink('<i class="fa fa-times"></i>', array('action' => 'delete', $webmail['Webmail']['id']), array('class' => 'btn btn-default btn-xs', 'title'=>__('Delete'), 'escape'=>false), __('Are you sure you want to delete # %s?', $webmail['Webmail']['id'])); ?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div><!-- /.table-responsive -->

	</div>
	<?php echo $this->element('Paginator'); ?>	
</div>