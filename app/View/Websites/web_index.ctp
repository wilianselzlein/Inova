<div class="panel panel-default">
	<div class="panel-heading">
		<h3>
			<span class="fa fa-wordpress"></span> <?php echo __('Websites'); ?>                
			<div class="btn-group pull-right">
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
					<?php echo __('Actions');?><span class="caret"></span>
				</button>
				<ul class="dropdown-menu" role="menu">
					<li class="list-group-item"><?php echo $this->CustomHtml->linkAdd(__('Website')); ?></li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkIndex(__('Hostings'), array('controller' => 'hostings')); ?></li> 
					<li class="list-group-item"><?php echo $this->CustomHtml->linkAdd(__('Hosting'), array('controller' => 'hostings')); ?></li> 
					<li class="list-group-item"><?php echo $this->CustomHtml->linkIndex(__('Themes'), array('controller' => 'themes')); ?></li> 
					<li class="list-group-item"><?php echo $this->CustomHtml->linkAdd(__('Theme'), array('controller' => 'themes')); ?></li> 
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
						<th><?php echo $this->Paginator->sort('theme_id'); ?></th>
						<th><?php echo $this->Paginator->sort('url'); ?></th>
						<th><?php echo $this->Paginator->sort('color1'); ?></th>
						<th><?php echo $this->Paginator->sort('color2'); ?></th>
						<th><?php echo $this->Paginator->sort('color3'); ?></th>
						<th><?php echo $this->Paginator->sort('color4'); ?></th>
						<th><?php echo $this->Paginator->sort('wordpress_user'); ?></th>
						<th><?php echo $this->Paginator->sort('wordpress_password'); ?></th>
						<th><?php echo $this->Paginator->sort('wordpress_email'); ?></th>
						<th><?php echo $this->Paginator->sort('wordpress_version'); ?></th>
						<th class="actions"><?php echo __('Actions'); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($websites as $website): ?>
						<tr>
							<td><?php echo h($website['Website']['id']); ?></td>
							<td>
								<?php echo $this->Html->link($website['Hosting']['ftp_user'], array('controller' => 'hostings', 'action' => 'view', $website['Hosting']['id'])); ?>
							</td>
							<td>
								<?php echo $this->Html->link($website['Theme']['name'], array('controller' => 'themes', 'action' => 'view', $website['Theme']['id'])); ?>
							</td>
							<td><?php echo h($website['Website']['url']); ?></td>
							<td><?php echo h($website['Website']['color1']); ?></td>
							<td><?php echo h($website['Website']['color2']); ?></td>
							<td><?php echo h($website['Website']['color3']); ?></td>
							<td><?php echo h($website['Website']['color4']); ?></td>
							<td><?php echo h($website['Website']['wordpress_user']); ?></td>
							<td><?php echo h($website['Website']['wordpress_password']); ?></td>
							<td><?php echo h($website['Website']['wordpress_email']); ?></td>
							<td><?php echo h($website['Website']['wordpress_version']); ?></td>
							<td class="actions">
								<?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('action' => 'view', $website['Website']['id']), array('class' => 'btn btn-default btn-xs', 'title'=>__('View'), 'escape'=>false)); ?>
								<?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('action' => 'edit', $website['Website']['id']), array('class' => 'btn btn-default btn-xs', 'title'=>__('Edit'), 'escape'=>false)); ?>
								<?php echo $this->Form->postLink('<i class="fa fa-times"></i>', array('action' => 'delete', $website['Website']['id']), array('class' => 'btn btn-default btn-xs', 'title'=>__('Delete'), 'escape'=>false), __('Are you sure you want to delete # %s?', $website['Website']['id'])); ?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div><!-- /.table-responsive -->

	</div>
	<?php echo $this->element('Paginator'); ?>	
</div>