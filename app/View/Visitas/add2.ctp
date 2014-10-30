<script type="text/javascript">
    $(document).ready(function(){
        $("#header").hide();
    });
</script>
<div class="visitas form">
    <fieldset>                
        <?php
            echo $this->form->create('Visita', array('target' => '_parent'));
            echo $this->Form->input('cliente_id', array('label' => 'Prospecto', 'class' => 'form-control' )); 
            echo '<br>';
            echo $this->Form->input('detalhes', array('class' => 'form-control')); 
            //echo $data . $hora;
            echo $this->Form->input('data', array('type' => 'hidden', 'value' => $data . ' ' . $hora));
            $usuario_logado = $this->Session->read('Auth.User');
            echo $this->Form->input('user_id', array('type' => 'hidden', 'value' => $usuario_logado['id'])); 
            /*echo '<br/>At: ' . $displayTime;
            echo $form->input('start', array('type'=>'hidden','value'=>$event['Event']['start']));
            echo $form->input('end', array('type'=>'hidden','value'=>$event['Event']['end']));
            echo $form->input('allday', array('type'=>'hidden','value'=>$event['Event']['allday']));
            echo $form->end(array('label'=>'Save' ,'name' => 'save')); */
            echo '<br>';
            echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-large btn-primary '));
            echo '<br>';
            echo $this->Form->end();
            echo '<br>';
        ?>
    </fieldset>
</div>
