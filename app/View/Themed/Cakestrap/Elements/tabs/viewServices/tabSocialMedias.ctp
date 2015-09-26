  <?php if (!empty($socialMedias)): ?>
  	<div class="table-responsive">         
  		<table class="table table-bordered table-hover table-condensed">
  			<thead>
  				<tr>
  					<th><?php echo __('id'); ?></th>
  					<th><?php echo __('type_id'); ?></th>
  					<th><?php echo __('email'); ?></th>
  					<th><?php echo __('login'); ?></th>
  					<th><?php echo __('password'); ?></th>
  					<th><?php echo __('post_frequency_id'); ?></th>
  					<th><?php echo __('pay_plan_id'); ?></th>
  					<th><?php echo __('is_active'); ?></th>
  					<th class="actions"><?php echo __('Actions'); ?></th>
  				</tr>
  			</thead>
  			<tbody>
  				<?php foreach ($socialMedias as $socialMedia): ?>
  					<tr>
  						<td><?php echo h($socialMedia['SocialMedia']['id']); ?></td>
  						<td><?php echo h($socialMedia['SocialMedia']['type_id']); ?></td>
  						<td><?php echo h($socialMedia['SocialMedia']['email']); ?></td>
  						<td><?php echo h($socialMedia['SocialMedia']['login']); ?></td>
  						<td><?php echo h($socialMedia['SocialMedia']['password']); ?></td>
  						<td><?php echo h($socialMedia['SocialMedia']['post_frequency_id']); ?></td>
  						<td><?php echo $this->Html->link($socialMedia['PayPlan']['name'], array('controller' => 'payplans', 'action' => 'view', $socialMedia['PayPlan']['id'])); ?></td>
  						<td><i class="<?php echo ($socialMedia['SocialMedia']['is_active'] == true ? 'fa fa-check-square-o' : 'fa fa-square-o'); ?>"></i></td>
  						<td class="actions">
  							<?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('controller' => 'socialmedias','action' => 'view', $socialMedia['SocialMedia']['id'], 'web' => true), array('class' => 'btn btn-default btn-xs', 'title'=>__('View'), 'escape'=>false)); ?>
  							<?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('controller' => 'socialmedias','action' => 'edit', $socialMedia['SocialMedia']['id'], 'web' => true), array('class' => 'btn btn-default btn-xs', 'title'=>__('Edit'), 'escape'=>false)); ?>
  							<?php echo $this->Form->postLink('<i class="fa fa-times"></i>', array('controller' => 'socialmedias','action' => 'delete', $socialMedia['SocialMedia']['id'], 'web' => true), array('class' => 'btn btn-default btn-xs', 'title'=>__('Delete'), 'escape'=>false), __('Are you sure you want to delete # %s?', $socialMedia['SocialMedia']['id'])); ?>
  						</td>
  					</tr>
  				<?php endforeach; ?>
  			</tbody>
  		</table>
  	</div><!-- /.table-responsive -->
  <?php endif; ?>