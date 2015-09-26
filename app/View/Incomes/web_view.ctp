<div class="panel panel-default">
	<div class="panel-heading">
		<h3>
			<span class="fa fa-money"></span> <?php echo __('View').' '.__('Income'); ?>               
			<div class="btn-group pull-right">
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
					<?php echo __('Actions');?><span class="caret"></span>
				</button>
				<ul class="dropdown-menu" role="menu">				
					<li class="list-group-item"><?php echo $this->CustomHtml->linkEdit(__('Income'), array($income['Income']['id'])); ?></li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkDelete(__('Income'), array($income['Income']['id'])); ?></li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkIndex(__('Incomes')); ?></li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkAdd(__('Income')); ?></li>					
				</ul>
			</div>
		</h3>
	</div>

	<div class="panel-body"> 
		<table class="table table-striped table-bordered">
			<tbody>
				<tr>		
					<td><strong><?php echo __('Id'); ?></strong></td>
					<td><?php echo h($income['Income']['id']); ?></td>
				</tr>
				
				<tr>
					<td><strong><?php echo __('Value'); ?></strong></td>
					<td><?php echo h($income['Income']['value']); ?></td>
				</tr>
				<tr>
					<td><strong><?php echo __('Date'); ?></strong></td>
					<td><?php echo h($income['Income']['date']); ?></td>
				</tr>   
				<tr>
					<td><strong><?php echo __('Domain'); ?></strong></td>
					<td>
						<?php echo $this->Html->link($income['Domain']['name'], array('controller' => 'domains', 'action' => 'view', $income['Domain']['id'])); ?>
					</td>
				</tr>   
				<tr>
					<td><strong><?php echo __('Hosting'); ?></strong></td>
					<td>
						<?php echo $this->Html->link($income['Hosting']['ftp_url'], array('controller' => 'hostings', 'action' => 'view', $income['Hosting']['id'])); ?>
					</td>
				</tr>   
				<tr>
					<td><strong><?php echo __('SocialMedia'); ?></strong></td>
					<td>
						<?php echo $this->Html->link($income['SocialMedia']['description'], array('controller' => 'socialmedias', 'action' => 'view', $income['SocialMedia']['id'])); ?>
					</td>
				</tr>   
				<tr>		
					<td><strong><?php echo __('Is Paid'); ?></strong></td>
					<td><i class="<?php echo ($income['Income']['is_paid'] == true ? 'fa fa-check-square-o' : 'fa fa-square-o'); ?>"></i></td>
				</tr>  
			</tbody>
		</table>
	</div>   
</div>