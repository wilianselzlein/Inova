<div id="page-container" class="row">
    <div id="page-content" class="col-sm-9">
        <h2><?php echo __('Alterar Senha'); ?></h2>
        <div class="users form">
            <fieldset>
            <?php echo $this->Form->create('User', array('role' => 'form')); ?>
                <div class="form-group">
                    <?php echo $this->Form->input('id', Array('value' => $this->Session->read('Auth.User.id')));?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('password_current',array('label'=>'Senha Atual', 'type'=>'password', 'class' => 'form-control')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('password_new',array('label'=>'Nova Senha','value'=>'', 'class' => 'form-control')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('password_confirmation',array('label'=>'Confirme sua Senha','type'=>'password', 'value'=>'', 'class' => 'form-control')); ?>
                </div>
            <?php echo $this->Form->end('Alterar'); ?>
            </fieldset>
        </div>
    </div>
</div>