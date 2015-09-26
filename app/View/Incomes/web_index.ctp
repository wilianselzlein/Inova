<div class="panel panel-default">
	<div class="panel-heading">
		<h3>
			<span class="fa fa-money"></span> <?php echo __('Incomes'); ?>                
			<div class="btn-group pull-right">
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
					<?php echo __('Actions');?><span class="caret"></span>
				</button>
				<ul class="dropdown-menu" role="menu">		
					<li class="list-group-item"><?php echo $this->CustomHtml->linkAdd(__('Income'));?></li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkIndex(__('Domains'), array('controller' => 'domains'));?></li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkAdd(__('Domain'), array('controller' => 'domains'));?></li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkIndex(__('Hostings'), array('controller' => 'hostings'));?></li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkAdd(__('Hosting'), array('controller' => 'hostings'));?></li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkIndex(__('SocialMedias'), array('controller' => 'socialmedias'));?></li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkAdd(__('SocialMedia'), array('controller' => 'socialmedias'));?></li>
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
						<th><?php echo $this->Paginator->sort('value'); ?></th>
						<th><?php echo $this->Paginator->sort('date'); ?></th>
						<th><?php echo $this->Paginator->sort('domain_id'); ?></th>
						<th><?php echo $this->Paginator->sort('hosting_id'); ?></th>
						<th><?php echo $this->Paginator->sort('social_media_id'); ?></th>
						<th><?php echo $this->Paginator->sort('is_paid'); ?></th>
						<th class="actions"><?php echo __('Actions'); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($incomes as $income): ?>
						<tr>
							<td><?php echo h($income['Income']['id']); ?></td>
							<td><?php echo $this->Number->currency($income['Income']['value'],'BRL'); ?></td>
							<td><?php echo h($income['Income']['date']); ?></td>
							<td><?php echo $this->Html->link($income['Domain']['name'], array('controller' => 'domains', 'action' => 'view', $income['Domain']['id'])); ?></td>
							<td><?php echo $this->Html->link($income['Hosting']['ftp_url'], array('controller' => 'hostings', 'action' => 'view', $income['Hosting']['id'])); ?></td>
							<td><?php echo $this->Html->link($income['SocialMedia']['description'], array('controller' => 'socialmedias', 'action' => 'view', $income['SocialMedia']['id'])); ?></td>
							<td><i class="<?php echo ($income['Income']['is_paid'] == true ? 'fa fa-check-square-o' : 'fa fa-square-o'); ?>"></i></td>
							<td class="actions">
								<?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('action' => 'view', $income['Income']['id']), array('class' => 'btn btn-default btn-xs', 'title'=>__('View'), 'escape'=>false)); ?>
								<?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('action' => 'edit', $income['Income']['id']), array('class' => 'btn btn-default btn-xs', 'title'=>__('Edit'), 'escape'=>false)); ?>
								<?php echo $this->Form->postLink('<i class="fa fa-times"></i>', array('action' => 'delete', $income['Income']['id']), array('class' => 'btn btn-default btn-xs', 'title'=>__('Delete'), 'escape'=>false), __('Are you sure you want to delete # %s?', $income['Income']['id'])); ?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div><!-- /.table-responsive -->

	</div>
	<?php echo $this->element('Paginator'); ?>	
</div>