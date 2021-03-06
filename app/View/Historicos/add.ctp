
<div id="page-container" class="row">

    <div id="sidebar" class="col-sm-3">

        <div class="actions">

            <ul class="list-group">
                <li class="list-group-item"><?php echo $this->Html->link(__('List') . ' ' . __('Historicos'), array('action' => 'index')); ?></li>
                <li class="list-group-item"><?php echo $this->Html->link(__('List') . ' ' . __('Chamados'), array('controller' => 'chamados', 'action' => 'index')); ?> </li>
                <li class="list-group-item"><?php echo $this->Html->link(__('New') . ' ' . __('Chamado'), array('controller' => 'chamados', 'action' => 'add')); ?> </li>
                <li class="list-group-item"><?php echo $this->Html->link(__('List') . ' ' . __('Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
                <li class="list-group-item"><?php echo $this->Html->link(__('New') . ' ' . __('User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
                <li class="list-group-item"><?php echo $this->Html->link(__('List') . ' ' . __('Checklists'), array('controller' => 'checklists', 'action' => 'index')); ?> </li>
                <li class="list-group-item"><?php echo $this->Html->link(__('New') . ' ' . __('Checklist'), array('controller' => 'checklists', 'action' => 'add')); ?> </li>
                <li class="list-group-item"><?php echo $this->Html->link(__('List') . ' ' . __('Servicos'), array('controller' => 'servicos', 'action' => 'index')); ?> </li>
                <li class="list-group-item"><?php echo $this->Html->link(__('New') . ' ' . __('Servico'), array('controller' => 'servicos', 'action' => 'add')); ?> </li>
            </ul><!-- /.list-group -->

        </div><!-- /.actions -->

    </div><!-- /#sidebar .col-sm-3 -->

    <div id="page-content" class="col-sm-9">

        <h2><?php echo __('Add') . ' ' . __('Historico'); ?></h2>

        <div class="historicos form">

            <?php echo $this->Form->create('Historico', array('role' => 'form')); ?>

            <fieldset>

                <div class="form-group">
                    <?php echo $this->Form->input('chamado_id', array('class' => 'form-control', 'default' => $chamado_id)); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php 
                    $usuario_logado = $this->Session->read('Auth.User');
                    echo $this->Form->input('user_id', array('class' => 'form-control', 'selected' => $usuario_logado['id'])); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('datainicial', array('type' => 'text', 'class' => 'form-control datetimepickerStart', 'default' => Date('d.m.Y H.i'))); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('datafinal', array('type' => 'text', 'class' => 'form-control datetimepickerEnd', 'default' => Date('d.m.Y H.i'))); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('descricao', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('checklist_id', array('class' => 'form-control', 'empty'=>'')); ?>
                </div><!-- .form-group -->
                
                <div class="form-group" id="HistoricoServicoId">
                    <?php echo $this->Form->input('Servico', array('type' => 'select',
          'options' => $servicos, 'multiple' => 'checkbox')); ?>
                </div><!-- .form-group -->

                <?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-large btn-primary')); ?>

            </fieldset>

            <?php echo $this->Form->end(); ?>

        </div><!-- /.form -->

    </div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->
<?php
$this->Js->get('#HistoricoChecklistId')->event('change', 
	$this->Js->request(array(
		'controller'=>'historicos',
		'action'=>'getComboServicos'
		), array(
		'update'=>'#HistoricoServicoId',
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