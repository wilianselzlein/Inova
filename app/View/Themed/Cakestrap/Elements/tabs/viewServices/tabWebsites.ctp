  <?php if (!empty($websites)): ?>
  	<div class="table-responsive">         
  		<table class="table table-bordered table-hover table-condensed">
  			<thead>
  				<tr>
  					<th><?php echo __('id'); ?></th>
  					<th><?php echo __('hosting_id'); ?></th>
  					<th><?php echo __('url'); ?></th>
            <th><?php echo __('theme_id'); ?></th>
            <th><?php echo __('color1'); ?></th>
            <th><?php echo __('color2'); ?></th>
            <th><?php echo __('color3'); ?></th>
            <th><?php echo __('color4'); ?></th>
            <th><?php echo __('wordpress_user'); ?></th>
            <th><?php echo __('wordpress_password'); ?></th>
            <th><?php echo __('wordpress_email'); ?></th>
            <th><?php echo __('wordpress_version'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($websites as $website): ?>
           <tr>
            <td><?php echo h($website['Website']['id']); ?></td>
            <td><?php echo h($website['Website']['hosting_id']); ?></td>
            <td><?php echo h($website['Website']['url']); ?></td>
            <td><?php echo h($website['Website']['theme_id']); ?></td>
            <td><?php echo h($website['Website']['color1']); ?></td>
            <td><?php echo h($website['Website']['color2']); ?></td>
            <td><?php echo h($website['Website']['color3']); ?></td>
            <td><?php echo h($website['Website']['color4']); ?></td>
            <td><?php echo h($website['Website']['wordpress_user']); ?></td>
            <td><?php echo h($website['Website']['wordpress_password']); ?></td>
            <td><?php echo h($website['Website']['wordpress_email']); ?></td>
            <td><?php echo h($website['Website']['wordpress_version']); ?></td>  						
            <td class="actions">
             <?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('controller' => 'websites','action' => 'view', $website['Website']['id'], 'web' => true), array('class' => 'btn btn-default btn-xs', 'title'=>__('View'), 'escape'=>false)); ?>
             <?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('controller' => 'websites','action' => 'edit', $website['Website']['id'], 'web' => true), array('class' => 'btn btn-default btn-xs', 'title'=>__('Edit'), 'escape'=>false)); ?>
             <?php echo $this->Form->postLink('<i class="fa fa-times"></i>', array('controller' => 'websites','action' => 'delete', $website['Website']['id'], 'web' => true), array('class' => 'btn btn-default btn-xs', 'title'=>__('Delete'), 'escape'=>false), __('Are you sure you want to delete # %s?', $website['Website']['id'])); ?>
           </td>
         </tr>
       <?php endforeach; ?>
     </tbody>
   </table>
 </div><!-- /.table-responsive -->
<?php endif; ?>