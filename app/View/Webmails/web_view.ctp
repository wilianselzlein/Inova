<div class="panel panel-default">
	<div class="panel-heading">
		<h3>
			<span class="fa fa-envelope"></span> <?php echo __('View').' '.__('Webmail'); ?>               
			<div class="btn-group pull-right">
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
					<?php echo __('Actions');?><span class="caret"></span>
				</button>
				<ul class="dropdown-menu" role="menu">				
					<li class="list-group-item"><?php echo $this->CustomHtml->linkEdit(__('Webmail'), array($webmail['Webmail']['id'])); ?></li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkDelete(__('Webmail'), array($webmail['Webmail']['id'])); ?></li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkIndex(__('Webmails')); ?></li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkAdd(__('Webmail')); ?></li>					
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
				<td><?php echo h($webmail['Webmail']['id']); ?></td>
			</tr>
			<tr>
				<td><strong><?php echo __('Hosting'); ?></strong></td>
				<td><?php echo h($webmail['Hosting']['ftp_user']); ?></td>
			</tr>
			<tr>
				<td><strong><?php echo __('Username'); ?></strong></td>
				<td><?php echo h($webmail['Webmail']['username']); ?></td>
			</tr>
			<tr>
				<td><strong><?php echo __('Password'); ?></strong></td>
				<td><?php echo h($webmail['Webmail']['password']); ?></td>
			</tr>   
			<tr>
				<td><strong><?php echo __('Size').' (MB)'; ?></strong></td>
				<td><?php echo h($webmail['Webmail']['size']); ?></td>
			</tr>   
		</tbody>
	</table>
</div>   
</div>