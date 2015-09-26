<div class="panel panel-default">
 <div class="panel-heading">
   <h3>
    <span class="fa fa-file-text"></span> <?php echo __('Edit').' '.__('Webpage'); ?>               
    <div class="btn-group pull-right">
     <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
      <?php echo __('Actions');?><span class="caret"></span>
    </button>
    <ul class="dropdown-menu" role="menu">
     <li class="list-group-item"><?php echo $this->CustomHtml->linkIndex(__('Webpages')); ?></li>
     <li class="list-group-item"><?php echo $this->CustomHtml->linkIndex(__('Websites'), array('controller' => 'websites')); ?></li> 
     <li class="list-group-item"><?php echo $this->CustomHtml->linkAdd(__('Website'), array('controller' => 'websites')); ?></li> 
   </ul>
 </div>
</h3>
</div>
<div class="panel-body">   
 <?php echo $this->Form->create('Webpage', array('role' => 'form', 'class'=>'form-horizontal')); ?>
 <fieldset>
  <div class="form-group">            
    <?php echo $this->Form->input('website_id', array('class' => 'form-control', 'div'=> array('class'=>'col-sm-12'))); ?>
  </div><!-- .form-group -->       
  <div class="form-group">
   <?php echo $this->Form->input('name', array('class' => 'form-control', 'div'=> array('class'=>'col-sm-6'))); ?>
   <?php echo $this->Form->input('title', array('class' => 'form-control', 'div'=> array('class'=>'col-sm-6'))); ?>
 </div><!-- .form-group -->       
 <div class="form-group">
   <?php echo $this->Form->input('features', array('class' => 'form-control', 'div'=> array('class'=>'col-sm-12'))); ?>
 </div><!-- .form-group -->
 <?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-large btn-primary')); ?>
</fieldset>
<?php echo $this->Form->end(); ?>
</div>      
</div>