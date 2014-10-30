
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
		
			<ul class="list-group">
				<li class="list-group-item"><?php echo $this->Html->link(__('List').' '.__('Roles'), array('action' => 'index')); ?></li>
				<li class="list-group-item"><?php echo $this->Html->link(__('List').' '.__('Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
				<li class="list-group-item"><?php echo $this->Html->link(__('New').' '.__('User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
			</ul><!-- /.list-group -->
		
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .col-sm-3 -->
	
	<div id="page-content" class="col-sm-9">

		<h2><?php echo __('Add').' '.__('Role'); ?></h2>

		<div class="Roles form">
		
			<?php echo $this->Form->create('Role', array('role' => 'form')); ?>

				<fieldset>

					<div class="form-group">
						<?php echo $this->Form->input('role', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('alias', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
					
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-large btn-primary')); ?>

				</fieldset>

			<?php echo $this->Form->end(); ?>
                    
		</div><!-- /.form -->
			
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->
<!--
<h3>Parte da <span class="label label-default">Cozinha</span></h3>

<div class="panel panel-default">
  <div class="panel-heading">Cadastro da Cozinha</div>
  <div class="panel-body">
      <label>Nome:</label><input type="text" class="form-control">
      <label>Cnpj:</label><input type="text" class="form-control">
      <label>Fantasia:</label><input type="text" class="form-control">
      <label>Telefone:</label><input type="text" class="form-control">
  </div>
</div>
<div class="panel panel-default">
  <div class="panel-heading">Cadastro de Pratos</div>
  <div class="panel-body">
      <label>Nome:</label><input type="text" class="form-control">
      <label>Valor:</label><input type="text" class="form-control">
      <label>Composição:</label><br>
      <input type="checkbox" class=""> <label>Arroz</label>
      <input type="checkbox" class=""> <label>Feijão</label>
      <input type="checkbox" class=""> <label>Ovo Frito</label>
  </div>
</div>
<div class="panel panel-default">
  <div class="panel-heading">Área de Entrega</div>
  <div class="panel-body">
      <input type="checkbox" class=""> <label>João Paulo</label>
      <input type="checkbox" class=""> <label>Centro</label>
      <input type="checkbox" class=""> <label>Canasvieiras</label>
  </div>
</div>
<div class="panel panel-default">
  <div class="panel-heading">Novo Pedido Recebido <span class="label label-success">Success</span></div>
  <div class="panel-body">
    <ol class="breadcrumb">
    <li><a href="#">Construtora X</a></li>
    <li><a href="#">11:55</a></li>
    <li class="active">048 9999 9999</li>
  </ol>
    <ul class="list-group">
      <li class="list-group-item">
        <span class="badge">2</span>
        Arroz/Feijão/Ovo Frito
      </li>
      <li class="list-group-item">
        <span class="badge">1</span>
        Bebida Y 2 litros
      </li>
    </ul>
  </div>
</div>

<br><br>
<h3>Parte do <span class="label label-default">Trabalhador</span></h3>
<div class="panel panel-default">
  <div class="panel-heading">Selecione a Cozinha</div>
    <div class="input-group input-group-lg">
      <span class="input-group-addon">1</span>
      <input type="text" class="form-control" placeholder="Username" value="Cozinha X"><br>
    </div>
    <div class="input-group input-group-lg">
      <span class="input-group-addon">2</span>
      <input type="text" class="form-control" placeholder="Username" value="Cozinha Y"><br>
    </div>
    <div class="input-group input-group-lg">
      <span class="input-group-addon">3</span>
      <input type="text" class="form-control" placeholder="Username" value="Cozinha Z"><br>
    </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">Pratos da Cozinha</div>
    <div class="input-group input-group-lg">
      <span class="input-group-addon">
        <input type="radio">
      </span>
      <input type="text" class="form-control" value="Arroz/Feijao/Ovo Frito"><br>
    <span class="input-group-addon">R$ 10,00</span>
    </div>
    <div class="input-group input-group-lg">
      <span class="input-group-addon">
        <input type="radio">
      </span>
      <input type="text" class="form-control" value="Arroz/Feijao/Bife"><br>
    <span class="input-group-addon">R$ 12,00</span>
    </div>
    <div class="input-group input-group-lg">
      <span class="input-group-addon">
        <input type="radio">
      </span>
        <input type="text" class="form-control" value="Macarrão a bolonhesa"><br>
    <span class="input-group-addon">R$ 12,00</span>
    </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">Forma de Pagamento</div>
    <div class="input-group input-group-lg">
      <span class="input-group-addon">
        <input type="radio">
      </span>
      <input type="text" class="form-control" value="Dinheiro"><br>
    </div>
    <div class="input-group input-group-lg">
      <span class="input-group-addon">
        <input type="radio">
      </span>
      <input type="text" class="form-control" value="Cartão Débito"><br>
    </div>
    <div class="input-group input-group-lg">
      <span class="input-group-addon">
        <input type="radio">
      </span>
      <input type="text" class="form-control" value="Cartão Crédito"><br>
    </div>
    <div class="input-group input-group-lg">
      <span class="input-group-addon">
        <input type="radio">
      </span>
      <input type="text" class="form-control" value="Vale Refeição"><br>
    </div>
</div>
<div class="panel panel-default">
  <div class="panel-heading">Pedido Registrado</div>
  Concluído:
<div class="progress">
  <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
    <span class="sr-only">40% Complete (success)</span>
  </div>
</div>
<div class="alert alert-success" role="alert">
  <a href="#" class="alert-link">Em preparo</a>
</div>
</div>-->