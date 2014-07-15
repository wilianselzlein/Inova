<style>
    .dashboard-icon
    {
        float:left;
        margin:15px;
        width:10%;
        border:0px solid red;
        -moz-transition:-moz-transform 0.2s ease-in; 
        -webkit-transition:-webkit-transform 0.2s ease-in; 
        -o-transition:-o-transform 0.2s ease-in;           
    }                
    .dashboard-icon img, .dashboard-icon span
    {
        width:100%;
        text-align: center;
        display: block;
    }        
    .dashboard-icon:hover
    {
        -moz-transform:scale(2); 
        -webkit-transform:scale(2);
        -o-transform:scale(2);
    }                 
</style>
<div id="page-content" class="col-sm-9">

    <h2><?php echo __('Opções de filtro'); ?></h2>

    <div class="Visitas form">

            <?php echo $this->Form->create('Visita', array('role' => 'form')); ?>

        <fieldset>
            <legend>Período</legend>
                <div class="form-group">
                    <?php echo $this->Form->input('data_inicial', array('type' => 'text', 'class' => 'form-control datepickerStart')); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('data_final', array('type' => 'text', 'class' => 'form-control datepickerStart')); ?>
                </div><!-- .form-group -->            
                <?php echo $this->Form->submit(__('Abrir'), array('class' => 'btn btn-large btn-primary')); ?>
                <br>
                <br>
        </fieldset>

            <?php echo $this->Form->end(); ?>

    </div><!-- /.form -->

</div><!-- /#page-content .col-sm-9 -->
