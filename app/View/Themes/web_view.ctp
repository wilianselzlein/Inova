<div class="panel panel-default">
	<div class="panel-heading">
		<h3>
			<span class="fa fa-optin-monster"></span> <?php echo __('View').' '.__('Theme'); ?>               
			<div class="btn-group pull-right">
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
					<?php echo __('Actions');?><span class="caret"></span>
				</button>
				<ul class="dropdown-menu" role="menu">				
					<li class="list-group-item"><?php echo $this->CustomHtml->linkEdit(__('Theme'), array($theme['Theme']['id'])); ?></li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkDelete(__('Theme'), array($theme['Theme']['id'])); ?></li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkIndex(__('Themes')); ?></li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkAdd(__('Theme')); ?></li>
				</ul>
			</ul>
		</div>
	</h3>
</div>

<div class="panel-body"> 
	<table class="table table-striped table-bordered">
		<tbody>
			<tr>		
				<td><strong><?php echo __('Id'); ?></strong></td>
				<td><?php echo h($theme['Theme']['id']); ?></td>
			</tr>

			<tr>
				<td><strong><?php echo __('Name'); ?></strong></td>
				<td>
					<?php echo $theme['Theme']['name'];  ?>                  
				</td>
			</tr>
			<tr>
				<td><strong><?php echo __('Features'); ?></strong></td>
				<td><?php echo h($theme['Theme']['features']); ?></td>
			</tr>   
			<tr>
				<td><strong><?php echo __('Price'); ?></strong></td>
				<td><?php echo h($theme['Theme']['price']); ?></td>
			</tr>   
			<tr>		
				<td><strong><?php echo __('Is Active'); ?></strong></td>
				<td><i class="<?php echo ($theme['Theme']['is_active'] == true ? 'fa fa-check-square-o' : 'fa fa-square-o'); ?>"></i></td>
			</tr>  
		</tbody>
	</table>
</div>   
</div>