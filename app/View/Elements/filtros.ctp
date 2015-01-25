<!-- https://github.com/pedroelsner/filter_results -->
	<?php echo $this->Search->create(null, array('role' => 'search'));?>
        <div class="form-group">
            <?php echo $this->Search->input('filter1', array('class'=>'form-control', 'placeholder'=>'Search', 'style'=>'width:80%;display: inline !important;')); ?>          
            <?php echo $this->Search->submit(__('Filtrar'),array('class'=>'btn btn-default','style'=>'display:normal ;')); 
            echo $this->Search->end();?>
        </div>
        
<style type="text/css"> 
.submit{
    margin: 0 0 0 1%;
    display: inline;
}
</style>