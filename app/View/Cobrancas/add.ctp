<div class="panel panel-default">
   <div class="panel-heading">
      <h3>
         <span class="fa fa-frown-o"></span> <?php echo __('Add').' '.__('Cobranca'); ?>               
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
      <?php echo $this->Form->create('Cobranca', array('role' => 'form')); ?>
      <fieldset>
         <div class="form-group">
            <?php echo $this->Form->input('cliente_id', array('class' => 'form-control combobox','empty'=>true)); ?>
         </div><!-- .form-group -->
         <div class="form-group">            
            <?php echo $this->Form->input('data', array('type' => 'text', 'class' => 'form-control datetimepickerStart', 'value'=>date('d/m/Y'))); ?>
         </div><!-- .form-group -->
         <div class="form-group">
            <?php echo $this->Form->input('contato', array('class' => 'form-control')); ?>
         </div><!-- .form-group -->
         <div class="form-group">
            <?php echo $this->Form->input('observacao', array('class' => 'form-control')); ?>
         </div><!-- .form-group -->
         <div class="form-group">
            <?php echo $this->Form->input('user_id', array('class' => 'form-control', 'selected'=>$this->Session->read('Auth.User.id'))); ?>
         </div><!-- .form-group -->					
         <?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-large btn-primary')); ?>
      </fieldset>
      <?php echo $this->Form->end(); ?>
   </div>			
</div>