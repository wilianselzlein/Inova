<div class="panel panel-default">
	<div class="panel-heading">
		<h3>
			<span class="fa fa-file-text"></span> <?php echo __('View').' '.__('Webpage'); ?>               
			<div class="btn-group pull-right">
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
					<?php echo __('Actions');?><span class="caret"></span>
				</button>
				<ul class="dropdown-menu" role="menu">				
					<li class="list-group-item"><?php echo $this->CustomHtml->linkEdit(__('Webpage'), array($webpage['Webpage']['id'])); ?></li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkDelete(__('Webpage'), array($webpage['Webpage']['id'])); ?></li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkIndex(__('Webpages')); ?></li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkAdd(__('Webpage')); ?></li>
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
				<td><?php echo h($webpage['Webpage']['id']); ?></td>
			</tr>
			<tr>
				<td><strong><?php echo __('Website'); ?></strong></td>
				<td><?php echo h($webpage['Website']['url']); ?></td>
			</tr>
			<tr>
				<td><strong><?php echo __('Name'); ?></strong></td>
				<td><?php echo h($webpage['Webpage']['name']); ?></td>
			</tr>
			<tr>
				<td><strong><?php echo __('Title'); ?></strong></td>
				<td><?php echo h($webpage['Webpage']['title']); ?></td>
			</tr>   
			<tr>
				<td><strong><?php echo __('Features'); ?></strong></td>
				<td><?php echo h($webpage['Webpage']['features']); ?></td>
			</tr>   
		</tbody>
	</table>
</div>   
</div>