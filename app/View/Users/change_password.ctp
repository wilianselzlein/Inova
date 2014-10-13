<div id="page-container" class="row">
    <div id="page-content" class="col-sm-9">
        <h2><?php echo __('Alterar Senha'); ?></h2>
        <div class="users form">
            <fieldset>
            <?php echo $this->Form->create(); ?>
                <div class="form-group">
                    <?php echo $this->Form->input('id', Array('value' => 2));?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('current_password',array('label'=>'Senha Atual', 'type'=>'password', 'class' => 'form-control')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('password',array('label'=>'Nova Senha','value'=>'', 'class' => 'form-control')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('password_confirmation',array('label'=>'Confirme sua Senha','type'=>'password', 'value'=>'', 'class' => 'form-control')); ?>
                </div>
            <?php echo $this->Form->end('Alterar'); ?>
            </fieldset>
        </div>
    </div>
</div>