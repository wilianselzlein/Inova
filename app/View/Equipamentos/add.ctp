
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
		
			<ul class="list-group">
				<li class="list-group-item"><?php echo $this->Html->link(__('List').' '.__('Equipamentos'), array('action' => 'index')); ?></li>
				<li class="list-group-item"><?php echo $this->Html->link(__('List').' '.__('Acaos'), array('controller' => 'acaos', 'action' => 'index')); ?> </li>
				<li class="list-group-item"><?php echo $this->Html->link(__('New').' '.__('Acao'), array('controller' => 'acaos', 'action' => 'add')); ?> </li>
			</ul><!-- /.list-group -->
		
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .col-sm-3 -->
	
	<div id="page-content" class="col-sm-9">

		<h2><?php echo __('Add').' '.__('Equipamento'); ?></h2>

		<div class="equipamentos form">
		
			<?php echo $this->Form->create('Equipamento', array('role' => 'form')); ?>

				<fieldset>
					<div class="form-group">
						<?php echo $this->Form->input('nome', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('acao_id', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('cliente_id', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('contato', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
	                <div class="form-group">
	                    <?php echo $this->Form->input('telefone', array('class' => 'form-control mask-ddd-fone')); ?>
	                </div><!-- .form-group -->
	                <div class="form-group">
                  		  <?php echo $this->Form->input('data', array('type' => 'text', 'class' => 'form-control datepickerStart', 'default' => Date('d/m/Y'))); ?>
            		</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('user_id', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('fornecedor', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('observacao', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
	                <div class="form-group">
                  		  <?php echo $this->Form->input('retorno', array('type' => 'text', 'class' => 'form-control datepickerStart', 'default' => Date('d/m/Y'))); ?>
            		</div><!-- .form-group -->

					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-large btn-primary')); ?>

				</fieldset>

			<?php echo $this->Form->end(); ?>

		</div><!-- /.form -->
			
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->

<?php
$this->Js->get('#EquipamentoClienteId')->event('change', 
	$this->Js->request(array(
		'controller'=>'equipamentos',
		'action'=>'getComboUsers'
		), array(
		'update'=>'#EquipamentoUserId',
		'async' => true,
		'method' => 'post',
		'dataExpression'=>true,
		'data'=> $this->Js->serializeForm(array(
			'isForm' => true,
			'inline' => true
			))
		))
	);
?>