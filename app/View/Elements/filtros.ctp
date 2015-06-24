<!-- https://github.com/pedroelsner/filter_results -->
<?php echo $this->Search->create(null, array('role' => 'search'));?>
<div class="form-group">
   <?php echo $this->Search->input('filter1', array('class'=>'form-control', 'placeholder'=>'Search', 'style'=>'width:94%;display: inline !important;')); ?>          
   <?php echo $this->Search->button('<i class="fa fa-filter"></i>',array('class'=>'form-control btn btn-primary submit pull-right', 'title'=>__('Filtrar'),'style'=>'display:normal ;','escape'=>false)); 
echo $this->Search->end();?>
</div>

<style type="text/css"> 
   .submit{
      width:5%;
      display: inline;
   }
</style>