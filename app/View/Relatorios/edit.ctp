
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
		
			<ul class="list-group">
				<li class="list-group-item"><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Relatorio.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Relatorio.id'))); ?></li>
				<li class="list-group-item"><?php echo $this->Html->link(__('List').' '.__('Relatorios'), array('action' => 'configurar')); ?></li>
			</ul><!-- /.list-group -->
		
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .col-sm-3 -->
	
	<div id="page-content" class="col-sm-9">

		<h2><?php echo __('Edit').' '.__('Relatorio'); ?></h2>

		<div class="relatorios form">
		
			<?php echo $this->Form->create('Relatorio', array('role' => 'form')); ?>

				<fieldset>

					<div class="form-group">
						<?php echo $this->Form->input('id', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('nome', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
                                        <div class="form-group">
						<?php echo $this->Form->input('tipo', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('arquivo', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-large btn-primary')); ?>

				</fieldset>

			<?php echo $this->Form->end(); ?>

		</div><!-- /.form -->
			
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->