<div class="panel panel-default">
	<div class="panel-heading">
		<h3>
			<span class="fa fa-github-alt"></span> <?php echo __('Domains'); ?>                
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
						<th><?php echo $this->Paginator->sort('custumer_id'); ?></th>
						<th><?php echo $this->Paginator->sort('name'); ?></th>
						<th><?php echo $this->Paginator->sort('dns1'); ?></th>
						<th><?php echo $this->Paginator->sort('dns2'); ?></th>
						<th><?php echo $this->Paginator->sort('dns3'); ?></th>
						<th><?php echo $this->Paginator->sort('dns4'); ?></th>
						<th><?php echo $this->Paginator->sort('payplan_id'); ?></th>
						<th><?php echo $this->Paginator->sort('is_active'); ?></th>
						<th class="actions"><?php echo __('Actions'); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($domains as $domain): ?>
						<tr>
							<td><?php echo h($domain['Domain']['id']); ?></td>
							<td>
								<?php echo $this->Html->link($domain['Customer']['razao_social_fantasia'], array('controller' => 'domains', 'action' => 'view', $domain['Customer']['id'])); ?>
							</td>
							<td><?php echo $domain['Domain']['name']; ?></td>
							<td><?php echo h($domain['Domain']['dns1']); ?></td>
							<td><?php echo h($domain['Domain']['dns2']); ?></td>
							<td><?php echo h($domain['Domain']['dns3']); ?></td>
							<td><?php echo h($domain['Domain']['dns4']); ?></td>
							<td><?php echo h($domain['Domain']['payplan_id']); ?></td>
							<td><?php echo h($domain['Domain']['is_active']); ?></td>
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