<?php
$components = array('Paginator', 'Session');
$usuario_logado = $this->Session->read('Auth.User');
//Retorna o array com o id, nome do usu�rio e password. 

if(strtolower($usuario_logado['role'])=='admin'){
    
    $conditions = null;
}else{
    $conditions = array('conditions' => array('Mural.user_id = ' => $usuario_logado['id']));
}
$recado_mural = ClassRegistry::init('Mural')->find('all', array('limit' => 5, $conditions, 'order' => 'Mural.data desc'));
$titulo = __('Recado(s)');
?>







<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <?php
        echo __('Welcome') . ' ' . $usuario_logado['username'] . '! ' . __("You're logged in.");
        echo '<br><br>';
    ?>
</div>
   
<?php   echo '<div class="recados">';
        echo '<h4>'.$titulo.'</h4>';
        echo '</div>';
        echo '<div class="recados-lista">';
        $this->Mural->desenha($recado_mural);
        echo '</div>';
?>
        





