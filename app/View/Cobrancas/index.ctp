<div class="panel panel-default">
   <div class="panel-heading">
      <h3>
         <span class="fa fa-frown-o"></span> <?php echo __('Cobrancas'); ?>                
         <div class="btn-group pull-right">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
               <?php echo __('Actions');?><span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
               <li class="list-group-item"><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New')  .' '.__('Cobranca'), array('action' => 'add'), array('escape' => false)); ?></li>
               <li class="list-group-item"><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '   .__('List') .' '.__('Clientes'), array('controller' => 'clientes', 'action' => 'index'), array('escape' => false)); ?></li> 
               <li class="list-group-item"><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New')  .' '.__('Cliente'), array('controller' => 'clientes', 'action' => 'add'), array('escape' => false)); ?></li> 
               <li class="list-group-item"><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '   .__('List') .' '.__('Users'), array('controller' => 'users', 'action' => 'index'), array('escape' => false)); ?></li> 
               <li class="list-group-item"><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New')  .' '.__('User'), array('controller' => 'users', 'action' => 'add'), array('escape' => false)); ?></li> 
            </ul>
         </div>
      </h3>
   </div>

   <div class="panel-body">      
      <div class="table-responsive">         
         <table class="table table-bordered table-hover table-condensed">
            <thead>
               <tr>
                  <th><?php echo $this->Paginator->sort('id'); ?></th>
                  <th><?php echo $this->Paginator->sort('cliente_id'); ?></th>
                  <th><?php echo $this->Paginator->sort('data'); ?></th>
                  <th><?php echo $this->Paginator->sort('contato'); ?></th>
                  <th><?php echo $this->Paginator->sort('observacao'); ?></th>
                  <th><?php echo $this->Paginator->sort('user_id'); ?></th>
                  <th class="actions"><?php echo __('Actions'); ?></th>
               </tr>
            </thead>
            <tbody>
               <?php foreach ($cobrancas as $cobranca): ?>
               <tr>
                  <td><?php echo h($cobranca['Cobranca']['id']); ?>&nbsp;</td>
                  <td>
                     <?php echo $this->Html->link($cobranca['Cliente']['fantasia'], array('controller' => 'clientes', 'action' => 'view', $cobranca['Cliente']['id'])); ?>
                  </td>
                  <td>
                     <?php if (isset($cobranca['Cobranca']['data'])) { echo $this->Time->i18nFormat($cobranca['Cobranca']['data'], $this->Html->__getDateTimeFormatView());} ?>
                  </td>
                  <td><?php echo h($cobranca['Cobranca']['contato']); ?>&nbsp;</td>
                  <td><?php echo h($cobranca['Cobranca']['observacao']); ?>&nbsp;</td>
                  <td>
                     <?php echo $this->Html->link($cobranca['User']['nickname'], array('controller' => 'users', 'action' => 'view', $cobranca['User']['id'])); ?>
                  </td>
                  <td class="actions">
                     <?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('action' => 'view', $cobranca['Cobranca']['id']), array('class' => 'btn btn-default btn-xs', 'title'=>__('View'), 'escape'=>false)); ?>
                     <?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('action' => 'edit', $cobranca['Cobranca']['id']), array('class' => 'btn btn-default btn-xs', 'title'=>__('Edit'), 'escape'=>false)); ?>
                     <?php echo $this->Form->postLink('<i class="fa fa-times"></i>', array('action' => 'delete', $cobranca['Cobranca']['id']), array('class' => 'btn btn-default btn-xs', 'title'=>__('Delete'), 'escape'=>false), __('Are you sure you want to delete # %s?', $cobranca['Cobranca']['id'])); ?>
                  </td>
               </tr>
               <?php endforeach; ?>
            </tbody>
         </table>
      </div><!-- /.table-responsive -->

   </div>
   <?php echo $this->element('Paginator'); ?>	
</div>