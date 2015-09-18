<?php debug($pay_plans);?>
<div class="panel panel-default">
   <div class="panel-heading">
      <h3>
         <span class="fa fa-github-alt"></span> <?php echo __('Add').' '.__('Domain'); ?>               
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
      <?php echo $this->Form->create('Domain', array('role' => 'form', 'class'=>'form-horizontal')); ?>
      <fieldset>
         <div class="form-group">
            <?php echo $this->Form->input('customer_id', array('class' => 'form-control combobox','empty'=>true, 'div'=> array('class'=>'col-sm-10'))); ?>
         </div><!-- .form-group -->
         <div class="form-group">            
            <?php echo $this->Form->input('name', array('type' => 'text', 'class' => 'form-control', 'div'=> array('class'=>'col-sm-10'))); ?>
         </div><!-- .form-group -->       
         <div class="form-group">
            <?php echo $this->Form->input('dns1', array('class' => 'form-control', 'div'=> array('class'=>'col-sm-4'))); ?>         
            <?php echo $this->Form->input('dns2', array('class' => 'form-control', 'div'=> array('class'=>'col-sm-4'))); ?>
         </div><!-- .form-group -->
         <div class="form-group">
            <?php echo $this->Form->input('dns3', array('class' => 'form-control', 'div'=> array('class'=>'col-sm-4'))); ?>         
            <?php echo $this->Form->input('dns4', array('class' => 'form-control', 'div'=> array('class'=>'col-sm-4'))); ?>
         </div><!-- .form-group -->
         <div class="form-group">
            <?php echo $this->Form->input('pay_plan_id', array('class' => 'form-control combobox','empty'=>true, 'div'=> array('class'=>'col-sm-4'))); ?>        
            <?php echo $this->Form->input('is_active', array('class' => 'form-control checkbox2', 'div'=> array('class'=>'col-sm-4'), 'before'=>'<label>Ativo</label>', 'label'=>false, 'checked'=>true)); ?>
         </div><!-- .form-group -->
         <?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-large btn-primary')); ?>
      </fieldset>
      <?php echo $this->Form->end(); ?>
   </div>			
</div>