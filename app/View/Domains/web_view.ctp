<div class="panel panel-default">
	<div class="panel-heading">
		<h3>
			<span class="fa fa-registered"></span> <?php echo __('View').' '.__('Domain'); ?>               
			<div class="btn-group pull-right">
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
					<?php echo __('Actions');?><span class="caret"></span>
				</button>
				<ul class="dropdown-menu" role="menu">
					<li class="list-group-item"><?php echo $this->CustomHtml->linkEdit(__('Domain'), array($domain['Domain']['id'])); ?></li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkDelete(__('Domain'), array($domain['Domain']['id'])); ?></li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkIndex(__('Domains')); ?></li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkAdd(__('Domain')); ?></li>
				</ul>
			</div>
		</h3>
	</div>

	<div class="panel-body"> 
		<table class="table table-striped table-bordered">
			<tbody>
				<tr>		
					<td><strong><?php echo __('Id'); ?></strong></td>
					<td><?php echo h($domain['Domain']['id']); ?></td>
				</tr>
				<tr>
					<td><strong><?php echo __('Cliente'); ?></strong></td>
					<td>
						<?php echo $this->Html->link($domain['Cliente']['fantasiarazaosocial'], array('controller' => 'clientes', 'action' => 'view', $domain['Cliente']['id']), array('class' => '')); ?>      
					</td>
				</tr>
				<tr>
					<td><strong><?php echo __('Name'); ?></strong></td>
					<td>
						<?php echo $domain['Domain']['name'];  ?>                  
					</td>
				</tr>
				<tr>
					<td><strong><?php echo __('Dns1'); ?></strong></td>
					<td><?php echo h($domain['Domain']['dns1']); ?></td>
				</tr>
				<tr>
					<td><strong><?php echo __('Dns2'); ?></strong></td>
					<td><?php echo h($domain['Domain']['dns2']); ?></td>
				</tr>
				<tr>
					<td><strong><?php echo __('Dns3'); ?></strong></td>
					<td><?php echo h($domain['Domain']['dns3']); ?></td>
				</tr>
				<tr>
					<td><strong><?php echo __('Dns4'); ?></strong></td>
					<td><?php echo h($domain['Domain']['dns4']); ?></td>
				</tr>				
				<tr>		
					<td><strong><?php echo __('PayPlan'); ?></strong></td>
					<td>
						<?php echo $this->Html->link($domain['PayPlan']['name'], array('controller' => 'payplans', 'action' => 'view', $domain['PayPlan']['id']), array('class' => '')); ?>                  
					</td>
				</tr>    
				<tr>		
					<td><strong><?php echo __('Is Active'); ?></strong></td>
					<td><i class="<?php echo ($domain['Domain']['is_active'] == true ? 'fa fa-check-square-o' : 'fa fa-square-o'); ?>"></i></td>
				</tr>  
			</tbody>
		</table>
	</div>   
</div>