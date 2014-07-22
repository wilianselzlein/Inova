<?php echo $this->html->script("libs/jquery-latest", array('inline'=>false)); ?>
<?php echo $this->Javascript->link('jquery.jeditable.mini'); ?>
<?php
$LIMITE_CARACTERES_DESCRICAO = 50;
$components = array('Paginator', 'Session');
$usuario_logado = $this->Session->read('Auth.User');

$titulo = __('Recado(s)');
?>

<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <?php
    echo '<span class="glyphicon glyphicon-user"></span> &nbsp;';
    echo __('Welcome') . ' ' . $usuario_logado['username'] . '! ' . __("You're logged in.");
    echo '<br>';
    ?>
</div>
<?php

$found_situacoes = ClassRegistry::init('Situacao');

$model_tabs = 'Situacao';
$model_tabs_content = 'Chamado';

$model = ClassRegistry::init('Situacao');

if ((strtolower($usuario_logado['role']) == 'admin') || (strtolower($usuario_logado['role']) == 'root')) {
    $conditions = null;
} else {
    $conditions = array('conditions' => array('Chamado.user_id' => $usuario_logado['id']));
}

$tab_list = ClassRegistry::init($model_tabs)->find('all');
$tab_content = ClassRegistry::init($model_tabs_content)->find('all', $conditions);
?>


<div class="container">

    <!-------->
    <div id="content">
        <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
            <?php foreach ($tab_list as $tab): ?>
                <li <?php echo ($tab === reset($tab_list)) ? 'class="active"' : ""; ?>>
                    <a href="<?php echo '#tab' . $tab[$model_tabs]['id'] ?>"  data-toggle="tab"><?php echo ucwords(strtolower($tab[$model_tabs]['nome'])) ?></a>
                </li>
            <?php endforeach; ?>
                <li>
                    <a href="#tabPrev" data-toggle="tab"><?php echo __('Previsão de Execução'); ?></a>
                </li>
        </ul>
        <div id="my-tab-content" class="tab-content">
            <?php foreach ($tab_list as $tab): ?>
                <div class="tab-pane <?php echo ($tab === reset($tab_list)) ? 'active' : ''; ?>" id="<?php echo 'tab' . $tab[$model_tabs]['id'] ?>">            
                    <table class="table">  
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th><?php echo __('Lançamento'); ?></th>
                                <th>Cliente</th>
                                <th>Contato</th>
                                <th><?php echo __('Descrição'); ?></th>
                                <th>Prioridade</th>
                                <th>Problema</th>
                                <th>Usuário</th>
                                <th><?php echo __('Actions'); ?></th>
                            </tr>
                        </thead>
                        <?php foreach ($tab_content as $task): ?>                        
                            <?php if ($tab[$model_tabs]['id'] == $task[$model_tabs]['id']): ?>
                                <tr>
                                    <td>
                                        <?php echo $this->Html->link($task['Chamado']['id'], array('controller' => 'chamados', 'action' => 'view', $task['Chamado']['id'])) ?>
                                    </td>
                                     <td>
                                        <?php 
                                            $hist = ClassRegistry::init('historico')->find('first', array(
                                                'conditions' => array('Historico.chamado_id' => $task['Chamado']['id']),
                                                'fields' => array('Historico.id', 'Historico.chamado_id, Historico.datainicial'),
                                                'order' => array('Historico.datainicial' => 'asc'),
                                                'limit' => 1,
                                                'recursive' => 0,
                                             ));
                                            if (count($hist) > 0)
                                              echo $this->Html->link(
                                                      $this->Time->i18nFormat($hist['Historico']['datainicial'], $this->Html->__getDateTimeFormatView()),
                                                      array('controller' => 'historicos', 'action' => 'view', $hist['Historico']['id']));
                                        ?> &nbsp;
                                    </td>
                                    <td>
                                        <?php echo $this->Html->link($task['Cliente']['razaosocial'], array('controller' => 'clientes', 'action' => 'view', $task['Cliente']['id'])) ?>
                                    </td>
                                    <td>
                                        <?php echo  $task['Chamado']['contato'] ?>
                                    </td>
                                    <td>
                                        <?php echo $this->Html->link(substr($task['Chamado']['descricao'], 1, $LIMITE_CARACTERES_DESCRICAO). '...', array('controller' => 'chamados', 'action' => 'view', $task['Chamado']['id'])) ?>
                                    </td>
                                    <td>
                                        <?php echo $this->Html->link($task['Prioridade']['nome'], array('controller' => 'subgrupos', 'action' => 'view', $task['Prioridade']['id'])) ?>
                                    </td>
                                    <td>
                                        <?php echo $this->Html->link($task['Problema']['nome'], array('controller' => 'problemas', 'action' => 'view', $task['Problema']['id'])) ?>
                                    </td>
                                    <td>
                                        <?php echo $this->Html->link($task['User']['username'], array('controller' => 'users', 'action' => 'view', $task['User']['id'])) ?>
                                    </td>
                                    <td>
                                        <?php echo $this->Html->link(__('Histórico'), array('controller' => 'historicos', 'action' => 'add', $task['Chamado']['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </table>
                </div>
            <?php endforeach; ?>
                <div class="tab-pane" id="tabPrev">            
                    <table class="table">  
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th><?php echo __('Lançamento'); ?></th>
                                <th><?php echo __('Previsão de Execução'); ?></th>
                                <th>Cliente</th>
                                <th>Contato</th>
                                <th><?php echo __('Descrição'); ?></th>
                                <th>Prioridade</th>
                                <th>Problema</th>
                                <th>Usuário</th>
                                <th><?php echo __('Actions'); ?></th>
                            </tr>
                        </thead>
                        <?php 
                            $tab_content = ClassRegistry::init($model_tabs_content)->find('all', 
                                    array(
                                        'conditions' => array(
                                            'Chamado.user_id' => $usuario_logado['id'],
                                            'Chamado.previsaoexecucao >=' => Date('Y.m.d'), //H:i:s
                                        ),
                                        'limit' => 5,
                                        'order' => 'Chamado.previsaoexecucao asc',
                                    )
                                );
                            ?>
                            <tr>
                                    <td colspan="10">
                                        <span class="label label-success"><?php echo __('Próximos chamados:') ?></span>
                                        <span class="glyphicon glyphicon-time"></span>
                                    </td>
                            </tr>
                            <?php foreach ($tab_content as $task): ?>                        
                                <tr>
                                    <td>
                                        <?php echo $this->Html->link($task['Chamado']['id'], array('controller' => 'chamados', 'action' => 'view', $task['Chamado']['id'])) ?>
                                    </td>
                                     <td>
                                        <?php 
                                            $hist = ClassRegistry::init('historico')->find('first', array(
                                                'conditions' => array('Historico.chamado_id' => $task['Chamado']['id']),
                                                'fields' => array('Historico.id', 'Historico.chamado_id, Historico.datainicial'),
                                                'order' => array('Historico.datainicial' => 'asc'),
                                                'limit' => 1,
                                                'recursive' => 0,
                                             ));
                                            if (count($hist) > 0)
                                              echo $this->Html->link(
                                                      $this->Time->i18nFormat($hist['Historico']['datainicial'], $this->Html->__getDateTimeFormatView()),
                                                      array('controller' => 'historicos', 'action' => 'view', $hist['Historico']['id']));
                                        ?> &nbsp;
                                    </td>
                                    <td>
                                        <?php echo $this->Time->i18nFormat($task['Chamado']['previsaoexecucao'], $this->Html->__getDateTimeFormatView()); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->Html->link($task['Cliente']['razaosocial'], array('controller' => 'clientes', 'action' => 'view', $task['Cliente']['id'])) ?>
                                    </td>
                                    <td>
                                        <?php echo  $task['Chamado']['contato'] ?>
                                    </td>
                                    <td>
                                        <?php echo $this->Html->link(substr($task['Chamado']['descricao'], 1, $LIMITE_CARACTERES_DESCRICAO). '...', array('controller' => 'chamados', 'action' => 'view', $task['Chamado']['id'])) ?>
                                    </td>
                                    <td>
                                        <?php echo $this->Html->link($task['Prioridade']['nome'], array('controller' => 'subgrupos', 'action' => 'view', $task['Prioridade']['id'])) ?>
                                    </td>
                                    <td>
                                        <?php echo $this->Html->link($task['Problema']['nome'], array('controller' => 'problemas', 'action' => 'view', $task['Problema']['id'])) ?>
                                    </td>
                                    <td>
                                        <?php echo $this->Html->link($task['User']['username'], array('controller' => 'users', 'action' => 'view', $task['User']['id'])) ?>
                                    </td>
                                    <td>
                                        <?php echo $this->Html->link(__('Histórico'), array('controller' => 'historicos', 'action' => 'add', $task['Chamado']['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                    </td>
                                </tr>
                        <?php endforeach;
                            $tab_content = ClassRegistry::init($model_tabs_content)->find('all', 
                                    array(
                                        'conditions' => array(
                                            'Chamado.user_id' => $usuario_logado['id'],
                                            'Chamado.previsaoexecucao <=' => Date('Y.m.d'), //H:i:s
                                        ),
                                        'limit' => 5,
                                        'order' => 'Chamado.previsaoexecucao desc',
                                    )
                                );
                            ?>
                                <tr>
                                    <td colspan="10">
                                        <span class="label label-default"><?php echo __('Chamados anteriores:') ?></span>
                                        <span class="glyphicon glyphicon-time"></span>
                                    </td>
                                </tr>
                            <?php foreach ($tab_content as $task): ?>
                                
                                <tr>
                                    <td>
                                        <?php echo $this->Html->link($task['Chamado']['id'], array('controller' => 'chamados', 'action' => 'view', $task['Chamado']['id'])) ?>
                                    </td>
                                     <td>
                                        <?php 
                                            $hist = ClassRegistry::init('historico')->find('first', array(
                                                'conditions' => array('Historico.chamado_id' => $task['Chamado']['id']),
                                                'fields' => array('Historico.id', 'Historico.chamado_id, Historico.datainicial'),
                                                'order' => array('Historico.datainicial' => 'asc'),
                                                'limit' => 1,
                                                'recursive' => 0,
                                             ));
                                            if (count($hist) > 0)
                                              echo $this->Html->link(
                                                      $this->Time->i18nFormat($hist['Historico']['datainicial'], $this->Html->__getDateTimeFormatView()),
                                                      array('controller' => 'historicos', 'action' => 'view', $hist['Historico']['id']));
                                        ?> &nbsp;
                                    </td>
                                    <td>
                                        <?php echo $this->Time->i18nFormat($task['Chamado']['previsaoexecucao'], $this->Html->__getDateTimeFormatView()); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->Html->link($task['Cliente']['razaosocial'], array('controller' => 'clientes', 'action' => 'view', $task['Cliente']['id'])) ?>
                                    </td>
                                    <td>
                                        <?php echo  $task['Chamado']['contato'] ?>
                                    </td>
                                    <td>
                                        <?php echo $this->Html->link(substr($task['Chamado']['descricao'], 1, $LIMITE_CARACTERES_DESCRICAO). '...', array('controller' => 'chamados', 'action' => 'view', $task['Chamado']['id'])) ?>
                                    </td>
                                    <td>
                                        <?php echo $this->Html->link($task['Prioridade']['nome'], array('controller' => 'subgrupos', 'action' => 'view', $task['Prioridade']['id'])) ?>
                                    </td>
                                    <td>
                                        <?php echo $this->Html->link($task['Problema']['nome'], array('controller' => 'problemas', 'action' => 'view', $task['Problema']['id'])) ?>
                                    </td>
                                    <td>
                                        <?php echo $this->Html->link($task['User']['username'], array('controller' => 'users', 'action' => 'view', $task['User']['id'])) ?>
                                    </td>
                                    <td>
                                        <?php echo $this->Html->link(__('Histórico'), array('controller' => 'historicos', 'action' => 'add', $task['Chamado']['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                    </td>
                                </tr>

                        <?php endforeach; ?>
                    </table>
                </div>
        </div>
    </div>


    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('#tabs').tab();
        });
    </script>    
</div> <!-- container -->

<?php
$recado_mural = ClassRegistry::init('Mural')->find('all', array('limit' => 5, 'conditions' => array('Mural.user_id = ' => $usuario_logado['id'], 'Mural.Lido' => false), 'order' => 'Mural.data desc'));
if (count($recado_mural) > 0) { ?>
    <div class="recados">
    <h4><span class="glyphicon glyphicon-pencil"></span>&nbsp;<?php echo $titulo; ?></h4>
    </div>
    <div class="recados-lista">
<?php 
     foreach ($recado_mural as $recado) {
        $this->Mural->desenha($recado);
            echo $this->Ajax->editor(
                'recado' . $recado['Mural']['id'], 
                array( 
                    'controller' => 'Murals', 
                    'action' => 'Ler',
                ), 
                array(
                    'indicator' => '<img src="/sistema/img/load.gif">',
                    'submit' => '<img src="/sistema/img/bullet_disk.png">',
                    'style' => 'inherit',
                    'submitdata' => array('id'=> h($recado['Mural']['id'])),
                    'data' => '',
                    'tooltip'   => 'Clique para responder o recado'
                    )
            );
    } ?>
    </div>
<?php } ?>

<?php
if ((strtolower($usuario_logado['role']) == 'root') || (strtolower($usuario_logado['role']) == 'vendas')) {
    //$conditions = array('conditions' => array('Visita.user_id = ' => $usuario_logado['id']));
    $visita_conditions = array('conditions' => array('Visita.data >= ' => date('y.m.d')));
    $visita_mural = ClassRegistry::init('Visita')->find('all', array('limit' => 5, $visita_conditions, 'order' => 'Visita.data desc'));

    echo '<div class="recados">';
    echo '<h4><span class="glyphicon glyphicon-road"></span>&nbsp;Visitas</h4>';
    echo '</div>';
    echo '<div class="recados-lista">';
    $this->Visita->desenha($visita_mural);
    echo '</div>';
}
?>
