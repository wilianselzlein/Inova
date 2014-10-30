<div id="page-container" class="row">

    <div id="sidebar" class="col-sm-3">

        <div class="actions">

            <ul class="list-group">
                <li class="list-group-item"><?php echo $this->Html->link(__('List') . ' ' . __('Contadores'), array('action' => 'index')); ?></li>
                <li class="list-group-item"><?php echo $this->Html->link(__('List') . ' ' . __('Cidades'), array('controller' => 'cidades', 'action' => 'index')); ?> </li>
                <li class="list-group-item"><?php echo $this->Html->link(__('New') . ' ' . __('Cidade'), array('controller' => 'cidades', 'action' => 'add')); ?> </li>
                <li class="list-group-item"><?php echo $this->Html->link(__('List') . ' ' . __('Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
                <li class="list-group-item"><?php echo $this->Html->link(__('New') . ' ' . __('User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
            </ul><!-- /.list-group -->

        </div><!-- /.actions -->

    </div><!-- /#sidebar .col-sm-3 -->

    <div id="page-content" class="col-sm-9">

        <h2><?php echo __('Add') . ' ' . __('Contador'); ?></h2>

        <div class="clientes form">

            <?php echo $this->Form->create('Contador', array('role' => 'form')); ?>

            <fieldset>
	        <div class="form-group">
                    <?php echo $this->Form->input('fantasia', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('razaosocial', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('endereco', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('numero', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('bairro', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('complemento', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('cep', array('class' => 'form-control mask-cep')); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('cidade_id', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('cpfcnpj', array('class' => 'form-control', 'label' => 'CRC')); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('contato', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('telefone', array('class' => 'form-control mask-ddd-fone')); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('celular', array('class' => 'form-control mask-ddd-celular')); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('email', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('emailalt', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('user_id', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('obs', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->hidden('prospect', array('class' => 'form-control', 'options' => array('S' => 'S', 'N' => 'N', 'C' => 'C'), 'default' => 'C')); ?>
                </div><!-- .form-group -->
                <?php  echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-large btn-primary')); ?>

            </fieldset>

            <?php echo $this->Form->end(); ?>

        </div><!-- /.form -->

    </div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->