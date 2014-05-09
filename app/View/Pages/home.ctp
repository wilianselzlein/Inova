
<?php 
$components = array('Paginator', 'Session');
$valor = $this->Session->read('Auth.User');  //Retorna o array com o id, nome do usuário e password. ?>







<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<?php echo __('Welcome').' '.$valor['username'].'! '.__("You're logged in.")?>
</div>




