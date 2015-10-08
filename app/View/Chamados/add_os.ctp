<div class="panel panel-default">
	<div class="panel-heading">
		<h3>
			<span class="fa fa-file-text-o"></span> <?php echo __('addOs').' <i class="fa fa-angle-double-right" ></i> ' .__('Chamado') .' ['.$this->request->data['Chamado']['id'].']'; ?>               
			<div class="btn-group pull-right">
			</div>
		</h3>

	</div>
	<div class="panel-body">
		<?php echo $this->Form->create('Chamado', array('role' => 'form', 'class' => 'form-horizontal')); ?>
		<fieldset>
			<div class="form-group">				
				<?php echo $this->Form->input('os_numero', array('class' => 'form-control', 'div'=> array('class'=>'col-sm-6'))); ?>
				<?php echo $this->Form->input('os_valor', array('type' => 'text', 'class' => 'form-control currency', 'div'=> array('class'=>'col-sm-6'))); ?>
			</div>
			<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-large btn-primary')); ?>

		</fieldset>

		<?php echo $this->Form->end(); ?>
	</div>
</div>