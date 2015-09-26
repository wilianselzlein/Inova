<div class="panel panel-default">
	<div class="panel-heading">
		<h3>
			<span class="fa fa-file-text"></span> <?php echo __('Webpages'); ?>                
			<div class="btn-group pull-right">
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
					<?php echo __('Actions');?><span class="caret"></span>
				</button>
				<ul class="dropdown-menu" role="menu">
					<li class="list-group-item"><?php echo $this->CustomHtml->linkAdd(__('Webpage')); ?></li>
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
						<th><?php echo $this->Paginator->sort('website_id'); ?></th>
						<th><?php echo $this->Paginator->sort('name'); ?></th>
						<th><?php echo $this->Paginator->sort('title'); ?></th>
						<th><?php echo $this->Paginator->sort('features'); ?></th>
						<th class="actions"><?php echo __('Actions'); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($webpages as $webpage): ?>
						<tr>
							<td><?php echo h($webpage['Webpage']['id']); ?></td>
							<td><?php echo h($webpage['Webpage']['website_id']); ?></td>
							<td><?php echo h($webpage['Webpage']['name']); ?></td>
							<td><?php echo h($webpage['Webpage']['title']); ?></td>
							<td><?php echo h($webpage['Webpage']['features']); ?></td>
							<td class="actions">
								<?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('action' => 'view', $webpage['Webpage']['id']), array('class' => 'btn btn-default btn-xs', 'title'=>__('View'), 'escape'=>false)); ?>
								<?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('action' => 'edit', $webpage['Webpage']['id']), array('class' => 'btn btn-default btn-xs', 'title'=>__('Edit'), 'escape'=>false)); ?>
								<?php echo $this->Form->postLink('<i class="fa fa-times"></i>', array('action' => 'delete', $webpage['Webpage']['id']), array('class' => 'btn btn-default btn-xs', 'title'=>__('Delete'), 'escape'=>false), __('Are you sure you want to delete # %s?', $webpage['Webpage']['id'])); ?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div><!-- /.table-responsive -->

	</div>
	<?php echo $this->element('Paginator'); ?>	
</div>