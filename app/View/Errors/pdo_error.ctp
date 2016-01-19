<style rel="stylesheet" type="text/css">
	.menu { float: left; width: 80%; }
	.conteudo { margin-left: 90%; margin-top: 20px;}
</style>

<div  class="jumbotron">
	<div class="menu"><h2>Ooops...deu erro!</h2>
   <h4>Erro de banco de dados.</h4></div>
	<div class="conteudo"><i class="fa fa-frown-o fa-3x"></i></div>
	<br>
	<span class="label label-info">Detalhes técnicos:</span>
	<br>
	<br>
		<p class="error">
			<strong><?php echo __d('cake_dev', 'Error'); ?>: </strong>
		<?php echo $name; ?>
		</p>
		<?php if (!empty($error->queryString)) : ?>
			<p class="notice">
				<strong><?php echo __d('cake_dev', 'SQL Query'); ?>: </strong>
		<?php echo h($error->queryString); ?>
			</p>
		<?php endif; ?>
		<?php if (!empty($error->params)) : ?>
				<strong><?php echo __d('cake_dev', 'SQL Query Params'); ?>: </strong>
		<?php echo Debugger::dump($error->params); ?>
		<?php endif; ?>

</div>
