<div class="panel panel-default">
   <div class="panel-heading">
      <h3>
         <span class="fa fa-frown-o"></span> <?php echo __('View').' '.__('Cobranca'); ?>               
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
      <table class="table table-striped table-bordered">
         <tbody>
            <tr>		
               <td><strong><?php echo __('Id'); ?></strong></td>
               <td><?php echo h($cobranca['Cobranca']['id']); ?></td>
            </tr>
            <tr>
               <td><strong><?php echo __('Cliente'); ?></strong></td>
               <td>
                  <?php echo $this->Html->link($cobranca['Cliente']['fantasiarazaosocial'], array('controller' => 'clientes', 'action' => 'view', $cobranca['Cliente']['id']), array('class' => '')); ?>      
               </td>
            <tr>
               <td><strong><?php echo __('Data'); ?></strong></td>
               <td>
                  <?php echo $this->Time->i18nFormat($cobranca['Cobranca']['data'], $this->Html->__getDateTimeFormatView());  ?>                  
               </td>
            </tr>
            <tr>
               <td><strong><?php echo __('Contato'); ?></strong></td>
               <td><?php echo h($cobranca['Cobranca']['contato']); ?></td>
            </tr>
            <tr>		
               <td><strong><?php echo __('Id'); ?></strong></td>
               <td><?php echo h($cobranca['Cobranca']['observacao']); ?></td>
            </tr>
            <tr>		
               <td><strong><?php echo __('User'); ?></strong></td>
               <td>
                  <?php echo $this->Html->link($cobranca['User']['username'], array('controller' => 'users', 'action' => 'view', $cobranca['User']['id']), array('class' => '')); ?>                  
               </td>
            </tr>      
         </tbody>
      </table>
   </div>   
</div>