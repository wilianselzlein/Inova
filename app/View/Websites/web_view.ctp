<div class="panel panel-default">
	<div class="panel-heading">
		<h3>
			<span class="fa fa-wordpress"></span> <?php echo __('View').' '.__('Website'); ?>               
			<div class="btn-group pull-right">
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
					<?php echo __('Actions');?><span class="caret"></span>
				</button>
				<ul class="dropdown-menu" role="menu">				
					<li class="list-group-item"><?php echo $this->CustomHtml->linkEdit(__('Website'), array($website['Website']['id'])); ?></li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkDelete(__('Website'), array($website['Website']['id'])); ?></li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkIndex(__('Websites')); ?></li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkAdd(__('Website')); ?></li>				
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
				<td><?php echo h($website['Website']['id']); ?></td>
			</tr>
			<tr>
				<td><strong><?php echo __('Hosting'); ?></strong></td>
				<td>
					<?php echo $this->Html->link($website['Hosting']['ftp_user'], array('controller' => 'hostings', 'action' => 'view', $website['Hosting']['id'])); ?>
				</td>
			</tr>
			<tr>
				<td><strong><?php echo __('Theme'); ?></strong></td>
				<td>
					<?php echo $this->Html->link($website['Theme']['name'], array('controller' => 'themes', 'action' => 'view', $website['Theme']['id'])); ?>
				</td>
			</tr>
			<tr>
				<td><strong><?php echo __('Url'); ?></strong></td>
				<td><?php echo h($website['Website']['url']); ?></td>
			</tr>  
			<tr>
				<td><strong><?php echo __('Color1'); ?></strong></td>
				<td><?php echo h($website['Website']['color1']); ?></td>
			</tr>  
			<tr>
				<td><strong><?php echo __('Color2'); ?></strong></td>
				<td><?php echo h($website['Website']['color2']); ?></td>
			</tr>   
			<tr>
				<td><strong><?php echo __('Color3'); ?></strong></td>
				<td><?php echo h($website['Website']['color3']); ?></td>
			</tr>   
			<tr>
				<td><strong><?php echo __('Color4'); ?></strong></td>
				<td><?php echo h($website['Website']['color4']); ?></td>
			</tr>    
			<tr>
				<td><strong><?php echo __('Wordpress User'); ?></strong></td>
				<td><?php echo h($website['Website']['wordpress_user']); ?></td>
			</tr>  
			<tr>
				<td><strong><?php echo __('Wordpress Password'); ?></strong></td>
				<td><?php echo h($website['Website']['wordpress_password']); ?></td>
			</tr>  
			<tr>
				<td><strong><?php echo __('Wordpress Email'); ?></strong></td>
				<td><?php echo h($website['Website']['wordpress_email']); ?></td>
			</tr>  
			<tr>
				<td><strong><?php echo __('Wordpress Version'); ?></strong></td>
				<td><?php echo h($website['Website']['wordpress_version']); ?></td>
			</tr>   
		</tbody>
	</table>
</div>   
</div>