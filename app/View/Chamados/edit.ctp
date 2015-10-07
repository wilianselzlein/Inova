<div class="panel panel-default">
   <div class="panel-heading">
      <h3>
         <span class="fa fa-ambulance"></span> <?php echo __('Edit').' '.__('Chamado'); ?>               
         <div class="btn-group pull-right">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
               <?php echo __('Actions');?><span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
               <li class="list-group-item"><?php echo $this->CustomHtml->linkIndex(__('Chamados')); ?></li>
               <li class="divider"></li>
               <li class="list-group-item"><?php echo $this->CustomHtml->linkIndex( __('Tipos'),      array('controller' => 'tipos')); ?> </li>
               <li class="list-group-item"><?php echo $this->CustomHtml->linkAdd(__('Tipo'),          array('controller' => 'tipos')); ?> </li>
               <li class="divider"></li>
               <li class="list-group-item"><?php echo $this->CustomHtml->linkIndex(__('Clientes'),    array('controller' => 'clientes')); ?> </li>
               <li class="list-group-item"><?php echo $this->CustomHtml->linkAdd(__('Cliente'),       array('controller' => 'clientes')); ?> </li>
               <li class="divider"></li>
               <li class="list-group-item"><?php echo $this->CustomHtml->linkIndex(__('Problemas'),   array('controller' => 'problemas')); ?> </li>
               <li class="list-group-item"><?php echo $this->CustomHtml->linkAdd(__('Problema'),      array('controller' => 'problemas')); ?> </li>
               <li class="divider"></li>
               <li class="list-group-item"><?php echo $this->CustomHtml->linkIndex(__('Situacaos'),   array('controller' => 'situacaos')); ?> </li>
               <li class="list-group-item"><?php echo $this->CustomHtml->linkAdd(__('Situacao'),      array('controller' => 'situacaos')); ?> </li>
               <li class="divider"></li>
               <li class="list-group-item"><?php echo $this->CustomHtml->linkIndex(__('Historicos'),  array('controller' => 'historicos')); ?> </li>
               <li class="list-group-item"><?php echo $this->CustomHtml->linkAdd(__('Historico'),     array('controller' => 'historicos')); ?> </li>
               <li class="divider"></li>
               <li class="list-group-item"><?php echo $this->CustomHtml->linkAdd(__('Cadastro').' '.__('Rápido'), array('controller' => 'clientes','S', 'chamados')); ?></li>
            </ul><!-- /.list-group -->
         </div>
      </h3>
   </div>
   <div class="panel-body">
      <?php echo $this->Form->create('Chamado', array('role' => 'form', 'class' => 'form-horizontal')); ?>

      <fieldset>
         <div class="form-group">
            <?php 
            if(isset($selected))
            {
               echo $this->Form->input('cliente_id', array('class' => 'form-control combobox', 'div'=> array('class'=>'col-sm-8'), 'selected'=> $selected)); 
            }else
            {
               echo $this->Form->input('cliente_id', array('class' => 'form-control combobox', 'div'=> array('class'=>'col-sm-8'),'empty'=>true)); 
            }                    
            ?>         
            <?php echo $this->Form->input('tipo_id', array('class' => 'form-control combobox', 'div'=> array('class'=>'col-sm-4'),'empty'=>true)); ?>
         </div><!-- .form-group -->
         <div class="form-group">
            <?php echo $this->Form->input('descricao', array('class' => 'form-control' , 'div'=> array('class'=>'col-sm-12'))); ?>
         </div><!-- .form-group -->
         <div class="form-group">
            <?php echo $this->Form->input('contato', array('class' => 'form-control', 'div'=> array('class'=>'col-sm-3'))); ?>
            <?php echo $this->Form->input('prioridade', array('class' => 'form-control combobox', 'div'=> array('class'=>'col-sm-3'),'empty'=>true)); ?>
            <?php echo $this->Form->input('problema_id', array('class' => 'form-control combobox', 'div'=> array('class'=>'col-sm-6'),'empty'=>true)); ?>
         </div><!-- .form-group -->
         <div class="form-group">
            <?php echo $this->Form->input('situacao_id', array('class' => 'form-control combobox', 'div'=> array('class'=>'col-sm-3'),'empty'=>true)); ?>
            <?php echo $this->Form->input('user_id', array('class' => 'form-control', 'div'=> array('class'=>'col-sm-3'),'empty'=>true));?>
            <?php echo $this->Form->input('previsaoexecucao', array('type' => 'text', 'class' => 'form-control datetimepickerStart', 'div'=> array('class'=>'col-sm-6'))); ?>
         </div><!-- .form-group -->
         <?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-large btn-primary')); ?>

      </fieldset>

      <?php echo $this->Form->end(); ?>

   </div>
</div>










<script type="text/javascript">
   $( document ).ready(function() {
      var clienteInput = $('#ChamadoClienteId').parent().find("input[type='hidden'].combobox");
      //alert($(clienteInput).attr('name'));
      $('#ChamadoClienteId').on("change", function () {
          //alert($(this).val());
          formData = $("#ChamadoAddForm").serialize();
          $.ajax({
            type: 'POST',
            url: './getClienteUser',
            data: formData,
            cache: false,
            //dataType: 'HTML',
            //beforeSend: function(){
            //                $('#na').html('Checking...');
            //            },
            //success: function (html){
           //    $('#ChamadoUserId').val(data);
           // }
           success: function(data,textStatus,xhr)
           {
            $("#ChamadoUserId").val(parseInt(data) );
         },
      });


       });
      $(clienteInput).on("change", function () {
       alert('hidden');
    });

   });
   
   
   
</script>