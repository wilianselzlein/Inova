<div class="panel panel-default">
	<div class="panel-heading">
		<h3>
			<span class="fa fa-cloud"></span> <?php echo __('Hostings'); ?>                
			<div class="btn-group pull-right">
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
					<?php echo __('Actions');?><span class="caret"></span>
				</button>
				<ul class="dropdown-menu" role="menu">
					<li class="list-group-item"><?php echo $this->CustomHtml->linkAdd(__('Hosting'));?></li>
					<li class="divider"></li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkIndex(__('Domains'), array('controller' => 'domains'));?></li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkAdd(__('Domain'), array('controller' => 'domains'));?></li>
					<li class="divider"></li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkIndex(__('PayPlans'), array('controller' => 'payplans'));?></li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkAdd(__('PayPlan'), array('controller' => 'payplans'));?></li>
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
						<th><?php echo $this->Paginator->sort('domain_id'); ?></th>
						<th><?php echo $this->Paginator->sort('ftp_user'); ?></th>
						<th><?php echo $this->Paginator->sort('ftp_url'); ?></th>
						<th><?php echo $this->Paginator->sort('emails_protocol'); ?></th>
						<th><?php echo $this->Paginator->sort('emails_size'); ?></th>
						<th><?php echo $this->Paginator->sort('pay_plan_id'); ?></th>
						<th><?php echo $this->Paginator->sort('is_active'); ?></th>
						<th class="actions"><?php echo __('Actions'); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($hostings as $hosting): ?>
						<tr>
							<td><?php echo h($hosting['Hosting']['id']); ?></td>
							<td>
								<?php echo $this->Html->link($hosting['Domain']['name'], array('controller' => 'domains', 'action' => 'view', $hosting['Domain']['id'])); ?>
							</td>
							<td><?php echo $hosting['Hosting']['ftp_user']; ?></td>
							<td><?php echo h($hosting['Hosting']['ftp_url']); ?></td>
							<td><?php echo h($hosting['Hosting']['emails_protocol']); ?></td>
							<td><?php echo h($hosting['Hosting']['emails_size']); ?></td>
							<td>
								<?php echo $this->Html->link($hosting['PayPlan']['name'], array('controller' => 'payplans', 'action' => 'view', $hosting['PayPlan']['id'])); ?>
							</td>
							<td><i class="<?php echo ($hosting['Hosting']['is_active'] == true ? 'fa fa-check-square-o' : 'fa fa-square-o'); ?>"></i></td>
							<td class="actions">
								<?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('action' => 'view', $hosting['Hosting']['id']), array('class' => 'btn btn-default btn-xs', 'title'=>__('View'), 'escape'=>false)); ?>
								<?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('action' => 'edit', $hosting['Hosting']['id']), array('class' => 'btn btn-default btn-xs', 'title'=>__('Edit'), 'escape'=>false)); ?>
								<?php echo $this->Form->postLink('<i class="fa fa-times"></i>', array('action' => 'delete', $hosting['Hosting']['id']), array('class' => 'btn btn-default btn-xs', 'title'=>__('Delete'), 'escape'=>false), __('Are you sure you want to delete # %s?', $hosting['Hosting']['id'])); ?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div><!-- /.table-responsive -->

	</div>
	<?php echo $this->element('Paginator'); ?>	
</div>