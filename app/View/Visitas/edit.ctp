
<div id="page-container" class="row">

    <div id="sidebar" class="col-sm-3">

        <div class="actions">

            <ul class="list-group">
                    <!-- <li class="list-group-item"><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Visita.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Visita.id'))); ?></li> -->
                <li class="list-group-item"><?php echo $this->Html->link(__('List') . ' ' . __('Visitas'), array('action' => 'index')); ?></li>
                <li class="list-group-item"><?php echo $this->Html->link(__('List') . ' ' . __('Clientes'), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
                <li class="list-group-item"><?php echo $this->Html->link(__('New') . ' ' . __('Cliente'), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
            </ul><!-- /.list-group -->

        </div><!-- /.actions -->

    </div><!-- /#sidebar .col-sm-3 -->

    <div id="page-content" class="col-sm-9">

        <h2><?php echo __('Edit') . ' ' . __('Visita'); ?></h2>

        <div class="Visitas form">

            <?php echo $this->Form->create('Visita', array('role' => 'form')); ?>

            <fieldset>

                <div class="form-group">
                    <?php echo $this->Form->input('id', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->

                <div class="form-group">
                    <?php echo $this->Form->input('cliente_id', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('data', array('type' => 'text', 'class' => 'form-control datetimepickerStart')); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('nova', array('type' => 'text', 'class' => 'form-control datetimepickerStart')); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('detalhes', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->

                <?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-large btn-primary')); ?>

            </fieldset>

            <?php echo $this->Form->end(); ?>

        </div><!-- /.form -->

    </div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->