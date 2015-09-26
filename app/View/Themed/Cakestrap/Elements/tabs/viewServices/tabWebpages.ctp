  <?php if (!empty($webpages)): ?>
    <div class="table-responsive">         
      <table class="table table-bordered table-hover table-condensed">
        <thead>
          <tr>
            <th><?php echo __('id'); ?></th>
            <th><?php echo __('website_id'); ?></th>
            <th><?php echo __('name'); ?></th>
            <th><?php echo __('title'); ?></th>
            <th><?php echo __('features'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($webpages as $webpage): ?>
           <tr>
            <td><?php echo h($webpage['Webpage']['id']); ?></td>
            <td><?php echo h($webpage['Webpage']['website_id']); ?></td>
            <td><?php echo h($webpage['Webpage']['name']); ?></td>
            <td><?php echo h($webpage['Webpage']['title']); ?></td>
            <td><?php echo h($webpage['Webpage']['features']); ?></td>
            <td class="actions">
             <?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('controller' => 'webpages','action' => 'view', $webpage['Webpage']['id'], 'web' => true), array('class' => 'btn btn-default btn-xs', 'title'=>__('View'), 'escape'=>false)); ?>
             <?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('controller' => 'webpages','action' => 'edit', $webpage['Webpage']['id'], 'web' => true), array('class' => 'btn btn-default btn-xs', 'title'=>__('Edit'), 'escape'=>false)); ?>
             <?php echo $this->Form->postLink('<i class="fa fa-times"></i>', array('controller' => 'webpages','action' => 'delete', $webpage['Webpage']['id'], 'web' => true), array('class' => 'btn btn-default btn-xs', 'title'=>__('Delete'), 'escape'=>false), __('Are you sure you want to delete # %s?', $webpage['Webpage']['id'])); ?>
           </td>
         </tr>
       <?php endforeach; ?>
     </tbody>
   </table>
 </div><!-- /.table-responsive -->
<?php endif; ?>