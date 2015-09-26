  <?php if (!empty($webmails)): ?>
  	<div class="table-responsive">         
  		<table class="table table-bordered table-hover table-condensed">
  			<thead>
  				<tr>
  					<th><?php echo __('id'); ?></th>
  					<th><?php echo __('hosting_id'); ?></th>
  					<th><?php echo __('username'); ?></th>
  					<th><?php echo __('password'); ?></th>
  					<th><?php echo __('size'); ?></th>
  					<th class="actions"><?php echo __('Actions'); ?></th>
  				</tr>
  			</thead>
  			<tbody>
  				<?php foreach ($webmails as $webmail): ?>
  					<tr>
  						<td><?php echo h($webmail['Webmail']['id']); ?></td>
  						<td><?php echo h($webmail['Hosting']['ftp_url']); ?></td>
  						<td><?php echo h($webmail['Webmail']['username']).'@'.substr($webmail['Hosting']['ftp_url'], 4); ?></td>
  						<td><?php echo h($webmail['Webmail']['password']); ?></td>
  						<td><?php echo h($webmail['Webmail']['size']).' (MB)'; ?></td>
  						<td class="actions">
  							<?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('controller' => 'webmails','action' => 'view', $webmail['Webmail']['id'], 'web' => true), array('class' => 'btn btn-default btn-xs', 'title'=>__('View'), 'escape'=>false)); ?>
  							<?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('controller' => 'webmails','action' => 'edit', $webmail['Webmail']['id'], 'web' => true), array('class' => 'btn btn-default btn-xs', 'title'=>__('Edit'), 'escape'=>false)); ?>
  							<?php echo $this->Form->postLink('<i class="fa fa-times"></i>', array('controller' => 'webmails','action' => 'delete', $webmail['Webmail']['id'], 'web' => true), array('class' => 'btn btn-default btn-xs', 'title'=>__('Delete'), 'escape'=>false), __('Are you sure you want to delete # %s?', $webmail['Webmail']['id'])); ?>
  						</td>
  					</tr>
  				<?php endforeach; ?>
  			</tbody>
  		</table>
  		</div><!-- /.table-responsive -->
  <?php endif; ?>