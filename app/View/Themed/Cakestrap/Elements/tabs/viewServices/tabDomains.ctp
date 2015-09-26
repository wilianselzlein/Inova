  <?php if (!empty($domains)): ?>
  	<div class="table-responsive">         
  		<table class="table table-bordered table-hover table-condensed">
  			<thead>
  				<tr>
  					<th><?php echo __('id'); ?></th>
  					<th><?php echo __('name'); ?></th>
  					<th><?php echo __('dns1'); ?></th>
  					<th><?php echo __('dns2'); ?></th>
  					<th><?php echo __('dns3'); ?></th>
  					<th><?php echo __('dns4'); ?></th>
  					<th><?php echo __('pay_plan_id'); ?></th>
  					<th><?php echo __('is_active'); ?></th>
  					<th class="actions"><?php echo __('Actions'); ?></th>
  				</tr>
  			</thead>
  			<tbody>
  				<?php foreach ($domains as $domain): ?>
  					<tr>
  						<td><?php echo h($domain['Domain']['id']); ?></td>
  						<td><?php echo $domain['Domain']['name']; ?></td>
  						<td><?php echo h($domain['Domain']['dns1']); ?></td>
  						<td><?php echo h($domain['Domain']['dns2']); ?></td>
  						<td><?php echo h($domain['Domain']['dns3']); ?></td>
  						<td><?php echo h($domain['Domain']['dns4']); ?></td>
  						<td><?php echo $this->Html->link($domain['PayPlan']['name'], array('controller' => 'payplans', 'action' => 'view', $domain['PayPlan']['id'])); ?></td>
  						<td><i class="<?php echo ($domain['Domain']['is_active'] == true ? 'fa fa-check-square-o' : 'fa fa-square-o'); ?>"></i></td>
  						<td class="actions">
  							<?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('controller' => 'domains','action' => 'view', $domain['Domain']['id'], 'web' => true), array('class' => 'btn btn-default btn-xs', 'title'=>__('View'), 'escape'=>false)); ?>
  							<?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('controller' => 'domains','action' => 'edit', $domain['Domain']['id'], 'web' => true), array('class' => 'btn btn-default btn-xs', 'title'=>__('Edit'), 'escape'=>false)); ?>
  							<?php echo $this->Form->postLink('<i class="fa fa-times"></i>', array('controller' => 'domains','action' => 'delete', $domain['Domain']['id'], 'web' => true), array('class' => 'btn btn-default btn-xs', 'title'=>__('Delete'), 'escape'=>false), __('Are you sure you want to delete # %s?', $domain['Domain']['id'])); ?>
  						</td>
  					</tr>
  				<?php endforeach; ?>
  			</tbody>
  		</table>
    </div><!-- /.table-responsive -->
  <?php endif; ?>