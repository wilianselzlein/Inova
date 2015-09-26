  <?php if (!empty($incomes)): ?>
  	<div class="table-responsive">         
  		<table class="table table-bordered table-hover table-condensed">
  			<thead>
  				<tr>
  					<th><?php echo __('id'); ?></th>
  					<th><?php echo __('value'); ?></th>
  					<th><?php echo __('date'); ?></th>
  					<th><?php echo __('domain_id'); ?></th>
  					<th><?php echo __('hosting_id'); ?></th>
  					<th><?php echo __('social_media_id'); ?></th>
  					<th><?php echo __('is_paid'); ?></th>
  					<th class="actions"><?php echo __('Actions'); ?></th>
  				</tr>
  			</thead>
  			<tbody>
  				<?php foreach ($incomes as $income): ?>
  					<tr>
  						<td><?php echo h($income['Income']['id']); ?></td>
  						<td><?php echo h($income['Income']['value']); ?></td>
  						<td><?php echo h($income['Income']['date']); ?></td>
  						<td><?php echo h($income['Income']['domain_id']); ?></td>
  						<td><?php echo h($income['Income']['hosting_id']); ?></td>
  						<td><?php echo h($income['Income']['social_media_id']); ?></td>
              <td><i class="<?php echo ($income['Income']['is_paid'] == true ? 'fa fa-check-square-o' : 'fa fa-square-o'); ?>"></i></td>
              <td class="actions">
               <?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('controller' => 'incomes','action' => 'view', $income['Income']['id'], 'web' => true), array('class' => 'btn btn-default btn-xs', 'title'=>__('View'), 'escape'=>false)); ?>
               <?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('controller' => 'incomes','action' => 'edit', $income['Income']['id'], 'web' => true), array('class' => 'btn btn-default btn-xs', 'title'=>__('Edit'), 'escape'=>false)); ?>
               <?php echo $this->Form->postLink('<i class="fa fa-times"></i>', array('controller' => 'incomes','action' => 'delete', $income['Income']['id'], 'web' => true), array('class' => 'btn btn-default btn-xs', 'title'=>__('Delete'), 'escape'=>false), __('Are you sure you want to delete # %s?', $income['Income']['id'])); ?>
             </td>
           </tr>
         <?php endforeach; ?>
       </tbody>
     </table>
   </div><!-- /.table-responsive -->
 <?php endif; ?>