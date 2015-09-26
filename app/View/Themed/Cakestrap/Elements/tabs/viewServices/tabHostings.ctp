  <?php if (!empty($hostings)): ?>
  	<div class="table-responsive">         
  		<table class="table table-bordered table-hover table-condensed">
  			<thead>
  				<tr>
  					<th><?php echo __('id'); ?></th>
  					<th><?php echo __('domain_id'); ?></th>
  					<th><?php echo __('ftp_user'); ?></th>
  					<th><?php echo __('ftp_password'); ?></th>
  					<th><?php echo __('ftp_url'); ?></th>
  					<th><?php echo __('emails_protocol'); ?></th>
            <th><?php echo __('emails_size'); ?></th>
            <th><?php echo __('pay_plan_id'); ?></th>
            <th><?php echo __('is_active'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($hostings as $hosting): ?>
           <tr>
            <td><?php echo h($hosting['Hosting']['id']); ?></td>
            <td><?php echo h($hosting['Hosting']['domain_id']); ?></td>
            <td><?php echo h($hosting['Hosting']['ftp_user']); ?></td>
            <td><?php echo h($hosting['Hosting']['ftp_password']); ?></td>
            <td><?php echo h($hosting['Hosting']['ftp_url']); ?></td>
            <td><?php echo h($hosting['Hosting']['emails_protocol']); ?></td>
            <td><?php echo h($hosting['Hosting']['emails_size']); ?></td>
            <td><?php echo $this->Html->link($hosting['PayPlan']['name'], array('controller' => 'payplans', 'action' => 'view', $hosting['PayPlan']['id'])); ?></td>
            <td><i class="<?php echo ($hosting['Hosting']['is_active'] == true ? 'fa fa-check-square-o' : 'fa fa-square-o'); ?>"></i></td>
            <td class="actions">
             <?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('controller' => 'hostings','action' => 'view', $hosting['Hosting']['id'], 'web' => true), array('class' => 'btn btn-default btn-xs', 'title'=>__('View'), 'escape'=>false)); ?>
             <?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('controller' => 'hostings','action' => 'edit', $hosting['Hosting']['id'], 'web' => true), array('class' => 'btn btn-default btn-xs', 'title'=>__('Edit'), 'escape'=>false)); ?>
             <?php echo $this->Form->postLink('<i class="fa fa-times"></i>', array('controller' => 'hostings','action' => 'delete', $hosting['Hosting']['id'], 'web' => true), array('class' => 'btn btn-default btn-xs', 'title'=>__('Delete'), 'escape'=>false), __('Are you sure you want to delete # %s?', $hosting['Hosting']['id'])); ?>
           </td>
         </tr>
       <?php endforeach; ?>
     </tbody>
   </table>
 </div><!-- /.table-responsive -->
<?php endif; ?>