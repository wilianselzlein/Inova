<div class="panel panel-default">
	<div class="panel-heading">
		<h3>
			<span class="fa fa-share-alt"></span> <?php echo __('SocialMedias'); ?>                
			<div class="btn-group pull-right">
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
					<?php echo __('Actions');?><span class="caret"></span>
				</button>
				<ul class="dropdown-menu" role="menu">		
					<li class="list-group-item"><?php echo $this->CustomHtml->linkAdd(__('SocialMedia')); ?></li>
					<li class="divider"></li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkIndex(__('Clientes'), array('controller' => 'clientes', 'web' => false)); ?></li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkAdd(__('Cliente'), array('controller' => 'clientes', 'web' => false)); ?></li>
					<li class="divider"></li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkIndex(__('PostFrequencies'), array('controller' => 'postfrequencies')); ?></li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkAdd(__('PostFrequency'), array('controller' => 'postfrequencies')); ?></li>
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
						<th><?php echo $this->Paginator->sort('type_id'); ?></th>
						<th><?php echo $this->Paginator->sort('url'); ?></th>
						<!-- <th><?php echo $this->Paginator->sort('description'); ?></th> -->
						<th><?php echo $this->Paginator->sort('email'); ?></th>
						<th><?php echo $this->Paginator->sort('login'); ?></th>
						<th><?php echo $this->Paginator->sort('senha'); ?></th>
						<th><?php echo $this->Paginator->sort('post_frequency_id'); ?></th>
						<th><?php echo $this->Paginator->sort('pay_plan_id'); ?></th>
						<th><?php echo $this->Paginator->sort('is_active'); ?></th>
						<th class="actions"><?php echo __('Actions'); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($socialMedias as $socialMedia): ?>
						<tr>
							<td><?php echo h($socialMedia['SocialMedia']['id']); ?></td>
							<td>
								<?php echo $this->Html->link($socialMedia['Cliente']['fantasiarazaosocial'], array('controller' => 'clientes', 'action' => 'view', $socialMedia['Cliente']['id'], 'web'=>false)); ?>
							</td>
							<td><?php echo h($socialMedia['SocialMedia']['type_id']); ?></td>
							<td><?php echo h($socialMedia['SocialMedia']['url']); ?></td>
							<!-- <td><?php echo h($socialMedia['SocialMedia']['description']); ?></td> -->
							<td><?php echo h($socialMedia['SocialMedia']['email']); ?></td>
							<td><?php echo h($socialMedia['SocialMedia']['login']); ?></td>
							<td><?php echo h($socialMedia['SocialMedia']['password']); ?></td>
							<td>
								<?php echo $this->Html->link($socialMedia['PostFrequency']['name'], array('controller' => 'postfrequencies', 'action' => 'view', $socialMedia['PostFrequency']['id'])); ?>
							</td>
							<td>
								<?php echo $this->Html->link($socialMedia['PayPlan']['name'], array('controller' => 'payplans', 'action' => 'view', $socialMedia['PayPlan']['id'])); ?>
							</td>
							<td><i class="<?php echo ($socialMedia['SocialMedia']['is_active'] == true ? 'fa fa-check-square-o' : 'fa fa-square-o'); ?>"></i></td>
							<td class="actions">
								<?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('action' => 'view', $socialMedia['SocialMedia']['id']), array('class' => 'btn btn-default btn-xs', 'title'=>__('View'), 'escape'=>false)); ?>
								<?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('action' => 'edit', $socialMedia['SocialMedia']['id']), array('class' => 'btn btn-default btn-xs', 'title'=>__('Edit'), 'escape'=>false)); ?>
								<?php echo $this->Form->postLink('<i class="fa fa-times"></i>', array('action' => 'delete', $socialMedia['SocialMedia']['id']), array('class' => 'btn btn-default btn-xs', 'title'=>__('Delete'), 'escape'=>false), __('Are you sure you want to delete # %s?', $socialMedia['SocialMedia']['id'])); ?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div><!-- /.table-responsive -->

	</div>
	<?php echo $this->element('Paginator'); ?>	
</div>