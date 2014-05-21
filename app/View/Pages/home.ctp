<?php
$components = array('Paginator', 'Session');
$usuario_logado = $this->Session->read('Auth.User');  //Retorna o array com o id, nome do usu�rio e password. 
$recado_mural = ClassRegistry::init('Mural')->find('all', array('limit' => 5, 'conditions' => array('Mural.user_id = ' => $usuario_logado['id']), 'order' => 'Mural.data desc'));
$titulo = __('Recado(s)');
?>







<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <?php
        echo __('Welcome') . ' ' . $usuario_logado['username'] . '! ' . __("You're logged in.");
        echo '<br><br>';
    ?>
</div>
   
<?php
    echo '<h4>'.$titulo.'</h4>';
    foreach ($recado_mural as $recado) 
    {   
        $remember       = date('d/m/y', strtotime($recado['Mural']['data']));
        $today          = date('d/m/y');    
        $date_toprint   = $this->Html->formata_data_extenso($recado['Mural']['data']);
        
        if($remember == $today)
        {
            echo '<div class="alert alert-danger">';
            echo '<i>'.$date_toprint.'</i>  ::    ';
            echo $this->Html->link($recado['Mural']['recado'], array('controller' => 'murals', 'action' => 'view', $recado['Mural']['id'])) ;
            echo '</div>';
        }else
        {
            echo '<div class="alert alert-warning">';
            echo '<i>'.$date_toprint.'</i>  ::    ';
            echo $this->Html->link($recado['Mural']['recado'], array('controller' => 'murals', 'action' => 'view', $recado['Mural']['id'])) ;
            echo '</div>';
        }
    }
?>
        





