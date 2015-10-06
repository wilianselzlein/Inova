<div class="panel panel-default">
    <div class="panel-heading">
        <h3>
            <span class="fa fa-odnoklassniki"></span> <?php echo __('Edit').' '.__('Prospecto'); ?>               
            <div class="btn-group pull-right">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <?php echo __('Actions');?><span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li class="list-group-item"><?php echo $this->CustomHtml->linkIndex(__('Prospectos')); ?></li>
                    <li class="divider"></li>
                    <li class="list-group-item"><?php echo $this->CustomHtml->linkIndex(__('Cidades'),      array('controller' => 'cidades')); ?> </li>
                    <li class="list-group-item"><?php echo $this->CustomHtml->linkAdd(__('Cidade'),         array('controller' => 'cidades')); ?> </li>
                    <li class="divider"></li>
                    <li class="list-group-item"><?php echo $this->CustomHtml->linkIndex(__('Subgrupos'),    array('controller' => 'subgrupos')); ?> </li>
                    <li class="list-group-item"><?php echo $this->CustomHtml->linkAdd(__('Subgrupo'),       array('controller' => 'subgrupos')); ?> </li>
                    <li class="divider"></li>
                    <li class="list-group-item"><?php echo $this->CustomHtml->linkIndex(__('Users'),        array('controller' => 'users')); ?> </li>
                    <li class="list-group-item"><?php echo $this->CustomHtml->linkAdd(__('User'),           array('controller' => 'users')); ?> </li>
                    <li class="divider"></li>
                    <li class="list-group-item"><?php echo $this->CustomHtml->linkIndex(__('Unidades'),     array('controller' => 'unidades')); ?> </li>
                    <li class="list-group-item"><?php echo $this->CustomHtml->linkAdd(__('Unidade'),        array('controller' => 'unidades')); ?> </li>
                    <li class="divider"></li>
                    <li class="list-group-item"><?php echo $this->CustomHtml->linkIndex(__('Chamados'),     array('controller' => 'chamados')); ?> </li>
                    <li class="list-group-item"><?php echo $this->CustomHtml->linkAdd(__('Chamado'),        array('controller' => 'chamados')); ?> </li>
                </ul>
            </div>
        </h3>
    </div>
    <div class="panel-body">
        <?php echo $this->Form->create('Prospecto', array('role' => 'form', 'class'=>'form-horizontal')); ?>
        <fieldset>
            <div class="form-group">
                <?php echo $this->Form->input('fantasia', array('class' => 'form-control', 'div'=> array('class'=>'col-sm-6'))); ?>
                <?php echo $this->Form->input('cidade_id', array('class' => 'form-control combobox', 'div'=> array('class'=>'col-sm-6'))); ?>
            </div><!-- .form-group -->
            <div class="form-group">
                <?php echo $this->Form->input('endereco', array('class' => 'form-control', 'div'=> array('class'=>'col-sm-4'))); ?>

                <?php echo $this->Form->input('numero', array('class' => 'form-control', 'div'=> array('class'=>'col-sm-1'))); ?>
                <?php echo $this->Form->input('complemento', array('class' => 'form-control', 'div'=> array('class'=>'col-sm-2'))); ?>
                <?php echo $this->Form->input('bairro', array('class' => 'form-control', 'div'=> array('class'=>'col-sm-3'))); ?>
                <?php echo $this->Form->input('cep', array('class' => 'form-control mask-cep', 'div'=> array('class'=>'col-sm-2'))); ?>                
            </div><!-- .form-group -->
            <div class="form-group">
                <?php echo $this->Form->input('telefone', array('class' => 'form-control mask-ddd-fone', 'div'=> array('class'=>'col-sm-4'))); ?>
                <?php echo $this->Form->input('telefone2', array('class' => 'form-control mask-ddd-fone', 'div'=> array('class'=>'col-sm-4'))); ?>
                <?php echo $this->Form->input('celular', array('class' => 'form-control mask-ddd-celular', 'div'=> array('class'=>'col-sm-4'))); ?>
            </div><!-- .form-group -->
            <div class="form-group">
                <?php echo $this->Form->input('contato', array('class' => 'form-control', 'div'=> array('class'=>'col-sm-4'))); ?>
                <?php echo $this->Form->input('email', array('class' => 'form-control', 'div'=> array('class'=>'col-sm-8'))); ?>
            </div><!-- .form-group -->
            <div class="form-group">
            <?php echo $this->Form->input('obs', array('class' => 'form-control', 'div'=> array('class'=>'col-sm-12'))); ?>
            </div><!-- .form-group -->
            <div class="form-group">
                <?php echo $this->Form->hidden('prospect', array('class' => 'form-control', 'options' => array('S' => 'S', 'N' => 'N'), 'default' => 'S')); ?>
            </div><!-- .form-group -->
            <?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-large btn-primary')); ?>
        </fieldset>
        <?php echo $this->Form->end(); ?>
    </div>          
</div>