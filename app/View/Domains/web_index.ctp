<div class="panel panel-default">
	<div class="panel-heading">
		<h3>
			<span class="fa fa-registered"></span> <?php echo __('Domains'); ?>                
			<div class="btn-group pull-right">
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
					<?php echo __('Actions');?><span class="caret"></span>
				</button>
				<ul class="dropdown-menu" role="menu">
					<li class="list-group-item"><?php echo $this->CustomHtml->linkAdd(__('Domain')); ?></li>
					<li class="divider"></li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkIndex(__('Clientes'), array('controller' => 'clientes','web' => false)); ?></li> 
					<li class="list-group-item"><?php echo $this->CustomHtml->linkAdd(__('Cliente'), array('controller' => 'clientes', 'web' => false)); ?></li> 
					<li class="divider"></li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkIndex(__('PayPlans'), array('controller' => 'payplans')); ?></li> 
					<li class="list-group-item"><?php echo $this->CustomHtml->linkAdd(__('PayPlan'), array('controller' => 'payplans')); ?></li> 
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
						<th><?php echo $this->Paginator->sort('customer_id'); ?></th>
						<th><?php echo $this->Paginator->sort('name'); ?></th>
						<th><?php echo $this->Paginator->sort('dns1'); ?></th>
						<th><?php echo $this->Paginator->sort('dns2'); ?></th>
						<th><?php echo $this->Paginator->sort('dns3'); ?></th>
						<th><?php echo $this->Paginator->sort('dns4'); ?></th>
						<th><?php echo $this->Paginator->sort('pay_plan_id'); ?></th>
						<th><?php echo $this->Paginator->sort('is_active'); ?></th>
						<th class="actions"><?php echo __('Actions'); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($domains as $domain): ?>
						<tr>
							<td><?php echo h($domain['Domain']['id']); ?></td>
							<td>
								<?php echo $this->Html->link($domain['Cliente']['fantasiarazaosocial'], array('controller' => 'domains', 'action' => 'view', $domain['Cliente']['id'])); ?>
							</td>
							<td><?php echo $domain['Domain']['name']; ?></td>
							<td><?php echo h($domain['Domain']['dns1']); ?></td>
							<td><?php echo h($domain['Domain']['dns2']); ?></td>
							<td><?php echo h($domain['Domain']['dns3']); ?></td>
							<td><?php echo h($domain['Domain']['dns4']); ?></td>
							<td><?php echo $this->Html->link($domain['PayPlan']['name'], array('controller' => 'payplans', 'action' => 'view', $domain['PayPlan']['id'])); ?></td>
							<td><i class="<?php echo ($domain['Domain']['is_active'] == true ? 'fa fa-check-square-o' : 'fa fa-square-o'); ?>"></i></td>
							<td class="actions">
								<?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('action' => 'view', $domain['Domain']['id']), array('class' => 'btn btn-default btn-xs', 'title'=>__('View'), 'escape'=>false)); ?>
								<?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('action' => 'edit', $domain['Domain']['id']), array('class' => 'btn btn-default btn-xs', 'title'=>__('Edit'), 'escape'=>false)); ?>
								<?php echo $this->Form->postLink('<i class="fa fa-times"></i>', array('action' => 'delete', $domain['Domain']['id']), array('class' => 'btn btn-default btn-xs', 'title'=>__('Delete'), 'escape'=>false), __('Are you sure you want to delete # %s?', $domain['Domain']['id'])); ?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div><!-- /.table-responsive -->

	</div>
	<?php echo $this->element('Paginator'); ?>	
</div>