<div class="panel panel-default">
	<div class="panel-heading">
		<h3>
			<span class="fa fa-share-alt"></span> <?php echo __('View').' '.__('SocialMedia'); ?>               
			<div class="btn-group pull-right">
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
					<?php echo __('Actions');?><span class="caret"></span>
				</button>
				<ul class="dropdown-menu" role="menu">				
					<li class="list-group-item"><?php echo $this->CustomHtml->linkEdit(__('SocialMedia'), array($socialMedia['SocialMedia']['id'])); ?></li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkDelete(__('SocialMedia'), array($socialMedia['SocialMedia']['id'])); ?></li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkIndex(__('SocialMedias')); ?></li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkAdd(__('SocialMedia')); ?></li>			
				</ul>
			</div>
		</h3>
	</div>
	<div class="panel-body"> 
		<table class="table table-striped table-bordered">
			<tbody>
				<tr>		
					<td><strong><?php echo __('Id'); ?></strong></td>
					<td><?php echo h($socialMedia['SocialMedia']['id']); ?></td>
				</tr>
				
				<tr>
					<td><strong><?php echo __('customer_id'); ?></strong></td>
					<td>
						<?php echo $this->Html->link($socialMedia['Cliente']['fantasiarazaosocial'], array('controller' => 'clientes', 'action' => 'view', $socialMedia['Cliente']['id'], 'web'=>false)); ?>
					</td>
				</tr>
				<tr>
					<td><strong><?php echo __('type_id'); ?></strong></td>
					<td>
						<?php echo h($socialMedia['SocialMedia']['type_id']); ?>
					</td>
				</tr>
				<tr>
					<td><strong><?php echo __('Url'); ?></strong></td>
					<td><?php echo h($socialMedia['SocialMedia']['url']); ?></td>
				</tr>
				<tr>
					<td><strong><?php echo __('Description'); ?></strong></td>
					<td><?php echo h($socialMedia['SocialMedia']['description']); ?></td>
				</tr>
				<tr>
					<td><strong><?php echo __('E-mail'); ?></strong></td>
					<td><?php echo h($socialMedia['SocialMedia']['email']); ?></td>
				</tr>
				<tr>
					<td><strong><?php echo __('Login2'); ?></strong></td>
					<td><?php echo h($socialMedia['SocialMedia']['login']); ?></td>
				</tr>
				<tr>
					<td><strong><?php echo __('Password'); ?></strong></td>
					<td><?php echo h($socialMedia['SocialMedia']['password']); ?></td>
				</tr>				
				<tr>
					<td><strong><?php echo __('PostFrequency'); ?></strong></td>
					<td>
						<?php echo $this->Html->link($socialMedia['PostFrequency']['name'], array('controller' => 'postfrequencies', 'action' => 'view', $socialMedia['PostFrequency']['id'])); ?>
					</td>
				</tr>
				<tr>
					<td><strong><?php echo __('PayPlan'); ?></strong></td>
					<td>
						<?php echo $this->Html->link($socialMedia['PayPlan']['name'], array('controller' => 'payplans', 'action' => 'view', $socialMedia['PayPlan']['id'])); ?>
					</td>
				</tr>
				<tr>		
					<td><strong><?php echo __('Is Active'); ?></strong></td>
					<td><i class="<?php echo ($socialMedia['SocialMedia']['is_active'] == true ? 'fa fa-check-square-o' : 'fa fa-square-o'); ?>"></i></td>
				</tr>  
			</tbody>
		</table>
	</div>   
</div>