
<div id="page-container" class="row">

   <div id="sidebar" class="col-sm-3">

      <div class="actions">

         <ul class="list-group">
            <li class="list-group-item"><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Cliente.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Cliente.id'))); ?></li>
            <li class="list-group-item"><?php echo $this->Html->link(__('List') . ' ' . __('Clientes'), array('action' => 'index')); ?></li>
            <li class="list-group-item"><?php echo $this->Html->link(__('List') . ' ' . __('Cidades'), array('controller' => 'cidades', 'action' => 'index')); ?> </li>
            <li class="list-group-item"><?php echo $this->Html->link(__('New') . ' ' . __('Cidade'), array('controller' => 'cidades', 'action' => 'add')); ?> </li>
            <li class="list-group-item"><?php echo $this->Html->link(__('List') . ' ' . __('Subgrupos'), array('controller' => 'subgrupos', 'action' => 'index')); ?> </li>
            <li class="list-group-item"><?php echo $this->Html->link(__('New') . ' ' . __('Subgrupo'), array('controller' => 'subgrupos', 'action' => 'add')); ?> </li>
            <li class="list-group-item"><?php echo $this->Html->link(__('List') . ' ' . __('Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
            <li class="list-group-item"><?php echo $this->Html->link(__('New') . ' ' . __('User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
            <li class="list-group-item"><?php echo $this->Html->link(__('List') . ' ' . __('Unidades'), array('controller' => 'unidades', 'action' => 'index')); ?> </li>
            <li class="list-group-item"><?php echo $this->Html->link(__('New') . ' ' . __('Unidade'), array('controller' => 'unidades', 'action' => 'add')); ?> </li>
            <li class="list-group-item"><?php echo $this->Html->link(__('List') . ' ' . __('Chamados'), array('controller' => 'chamados', 'action' => 'index')); ?> </li>
            <li class="list-group-item"><?php echo $this->Html->link(__('New') . ' ' . __('Chamado'), array('controller' => 'chamados', 'action' => 'add')); ?> </li>
         </ul><!-- /.list-group -->

      </div><!-- /.actions -->

   </div><!-- /#sidebar .col-sm-3 -->

   <div id="page-content" class="col-sm-9">

      <h2><?php echo __('Edit') . ' ' . __('Cliente'); ?></h2>

      <div class="clientes form">

         <?php echo $this->Form->create('Cliente', array('role' => 'form')); ?>

         <fieldset>
            <div class="form-group">
               <?php echo $this->Form->input('is_ativo', array('type' => 'checkbox', 'class' => 'form-control checkbox2','before'=>'<div class="input"><label>Ativo</label>','after'=>'</div>', 'div'=>false, 'label'=>false)); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('fantasia', array('class' => 'form-control')); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('razaosocial', array('class' => 'form-control')); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php
$options = array(1 => 'CPF', 2 => 'CNPJ');                    
//echo $this->Form->input('_', array('options' => $options, 'default'=>1, 'class' =>'form-control select-documento', 'label'=>false, 'div'=>array('class'=>'label-inline')));
echo $this->Form->input('cpfcnpj', array('class' => 'form-control')); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('cidade_id', array('class' => 'form-control')); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('sistema_id', array('class' => 'form-control')); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('build', array('class' => 'form-control')); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('subgrupo_id', array('class' => 'form-control')); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('dtvenda', array('type' => 'text', 'class' => 'form-control datepickerStart')); ?>
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
               <?php echo $this->Form->input('ie', array('class' => 'form-control')); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('senha', array('class' => 'form-control')); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('dtinstalacao', array('type' => 'text', 'class' => 'form-control datepickerStart')); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('contato', array('class' => 'form-control')); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('caixas', array('class' => 'form-control')); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('retaguardas', array('class' => 'form-control')); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('prioridade', array('class' => 'form-control')); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('mensalidade', array('class' => 'form-control monetario', 'type'=>'text')); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('valorvenda', array('class' => 'form-control monetario', 'type'=>'text')); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('estrutura', array('class' => 'form-control')); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('obs', array('class' => 'form-control')); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('user_id', array('class' => 'form-control')); ?>
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
               <?php echo $this->Form->input('cep', array('class' => 'form-control mask-cep')); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('unidade_id', array('class' => 'form-control')); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('contador_id', array('class' => 'form-control', 'empty' => true)); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('Modulo', array('type' => 'select', 'label' => __('Modulos'), 'options' => $modulos, 'multiple' => 'checkbox')); ?>
            </div><!-- .form-group -->
            <?php /*?>

                <div class="form-group">
                    <?php echo $this->Form->input('prospect', array('class' => 'form-control', 'options' => array('S' => 'S', 'N' => 'N'))); ?>
                </div><!-- .form-group -->

                <?php*/ echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-large btn-primary')); ?>

         </fieldset>          

         <?php echo $this->Form->end(); ?>

      </div><!-- /.form -->

   </div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->