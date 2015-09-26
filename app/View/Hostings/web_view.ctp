<div class="panel panel-default">
	<div class="panel-heading">
		<h3>
			<span class="fa fa-cloud"></span> <?php echo __('View').' '.__('Hosting'); ?>               
			<div class="btn-group pull-right">
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
					<?php echo __('Actions');?><span class="caret"></span>
				</button>
				<ul class="dropdown-menu" role="menu">				
					<li class="list-group-item"><?php echo $this->CustomHtml->linkEdit(__('Hosting'), array($hosting['Hosting']['id'])); ?></li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkDelete(__('Hosting'), array($hosting['Hosting']['id'])); ?></li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkIndex(__('Hostings')); ?></li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkAdd(__('Hosting')); ?></li>					
				</ul>
			</div>
		</h3>
	</div>
	<div class="panel-body"> 
		<table class="table table-striped table-bordered">
			<tbody>
				<tr>		
					<td><strong><?php echo __('Id'); ?></strong></td>
					<td><?php echo h($hosting['Hosting']['id']); ?></td>
				</tr>				
				<tr>
					<td><strong><?php echo __('Domain'); ?></strong></td>
					<td>
						<?php echo $this->Html->link($hosting['Domain']['name'], array('controller' => 'domains', 'action' => 'view', $hosting['Domain']['id'])); ?>
					</td>
				</tr>
				<tr>
					<td><strong><?php echo __('ftp_user'); ?></strong></td>
					<td><?php echo h($hosting['Hosting']['ftp_user']); ?></td>
				</tr>   
				<tr>
					<td><strong><?php echo __('ftp_url'); ?></strong></td>
					<td><?php echo h($hosting['Hosting']['ftp_url']); ?></td>
				</tr>   
				<tr>
					<td><strong><?php echo __('emails_protocol'); ?></strong></td>
					<td><?php echo h($hosting['Hosting']['emails_protocol'] == 'I' ? 'IMAP' : 'POP'); ?></td>
				</tr>   
				<tr>
					<td><strong><?php echo __('emails_size'); ?></strong></td>
					<td><?php echo h($hosting['Hosting']['emails_size']); ?></td>
				</tr>   
				<tr>
					<td><strong><?php echo __('PayPlan'); ?></strong></td>
					<td>
						<?php echo $this->Html->link($hosting['PayPlan']['name'], array('controller' => 'payplans', 'action' => 'view', $hosting['PayPlan']['id'])); ?>
					</td>
				</tr>   				
				<tr>		
					<td><strong><?php echo __('Is Active'); ?></strong></td>
					<td><i class="<?php echo ($hosting['Hosting']['is_active'] == true ? 'fa fa-check-square-o' : 'fa fa-square-o'); ?>"></i></td>
				</tr>  
			</tbody>
		</table>
	</div>   
</div>