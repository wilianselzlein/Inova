<div class="panel panel-default">
	<div class="panel-heading">
		<h3>
			<span class="fa fa-frown-o"></span> <?php echo __('Cobrancas'); ?>                
			<div class="btn-group pull-right">
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
					<?php echo __('Actions');?><span class="caret"></span>
				</button>
				<ul class="dropdown-menu" role="menu">
					<li class="list-group-item"><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New')  .' '.__('Cobranca'), array('action' => 'add'), array('escape' => false)); ?></li>
					<li class="list-group-item"><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '   .__('List') .' '.__('Clientes'), array('controller' => 'clientes', 'action' => 'index'), array('escape' => false)); ?></li> 
					<li class="list-group-item"><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New')  .' '.__('Cliente'), array('controller' => 'clientes', 'action' => 'add'), array('escape' => false)); ?></li> 
					<li class="list-group-item"><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '   .__('List') .' '.__('Users'), array('controller' => 'users', 'action' => 'index'), array('escape' => false)); ?></li> 
					<li class="list-group-item"><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New')  .' '.__('User'), array('controller' => 'users', 'action' => 'add'), array('escape' => false)); ?></li> 
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
							<td><?php echo h($hosting['Hosting']['pay_plan_id']); ?></td>
							<td><?php echo h($hosting['Hosting']['is_active']); ?></td>
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