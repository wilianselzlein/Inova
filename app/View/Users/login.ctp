<div class="users form">
<?php echo $this->Session->flash(__('auth'), array('element' => 'flash/warning')); ?>
<?php echo $this->Form->create('User', array('role' => 'form'));?>
<div id="geral">
    <div class="login-box"> 
        <?php echo $this->Html->image('logo.png', array('class' =>'logo'));?><br>
        <br>
        <fieldset>
            <legend>
                <?php echo __('Please enter your username and password'); ?>
            </legend>
            <br>
                <?php 
                    echo $this->Form->input('username', array('class' => 'form-control'));
                    echo $this->Form->input('password', array('class' => 'form-control'));
                ?>
            <br>
        </fieldset>
            <?php echo $this->Form->submit(__('Login'), array('class' => 'btn btn-large btn-primary'));?>
            <br>
    </div>
    </div>
    <br>
</div>