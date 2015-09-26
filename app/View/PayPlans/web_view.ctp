<div class="panel panel-default">
	<div class="panel-heading">
		<h3>
			<span class="fa fa-calendar"></span> <?php echo __('View').' '.__('PayPlan'); ?>               
			<div class="btn-group pull-right">
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
					<?php echo __('Actions');?><span class="caret"></span>
				</button>
				<ul class="dropdown-menu" role="menu">
					<li class="list-group-item"><?php echo $this->CustomHtml->linkEdit(__('PayPlan'), array($payplan['PayPlan']['id'])); ?></li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkDelete(__('PayPlan'), array($payplan['PayPlan']['id'])); ?></li> 
					<li class="list-group-item"><?php echo $this->CustomHtml->linkIndex(__('PayPlans')); ?></li> 
					<li class="list-group-item"><?php echo $this->CustomHtml->linkAdd(__('PayPlan')); ?></li> 
				</ul>
			</div>
		</h3>
	</div>

	<div class="panel-body"> 
		<table class="table table-striped table-bordered">
			<tbody>
				<tr>		
					<td><strong><?php echo __('Id'); ?></strong></td>
					<td><?php echo h($payplan['PayPlan']['id']); ?></td>
				</tr>
				
				<tr>
					<td><strong><?php echo __('Name'); ?></strong></td>
					<td>
						<?php echo $payplan['PayPlan']['name'];  ?>                  
					</td>
				</tr>
				<tr>
					<td><strong><?php echo __('Note'); ?></strong></td>
					<td><?php echo h($payplan['PayPlan']['note']); ?></td>
				</tr>   
				<tr>		
					<td><strong><?php echo __('Is Active'); ?></strong></td>
					<td><i class="<?php echo ($payplan['PayPlan']['is_active'] == true ? 'fa fa-check-square-o' : 'fa fa-square-o'); ?>"></i></td>
				</tr>  
			</tbody>
		</table>
	</div>   
</div>