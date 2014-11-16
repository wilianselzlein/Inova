<?php 
echo $this->Javascript->link('ui.core.js');
echo $this->Javascript->link('ui.resizable.js');
echo $this->Javascript->link('fullcalendar.min.js');
echo $this->Javascript->link('ui.draggable.js');

echo $this->Javascript->link('moment.min.js');
echo $this->Javascript->link('jquery.min.js');
echo $this->Javascript->link('jquery-ui.custom.min.js');
echo $this->Javascript->link('fullcalendar.min.js');

echo $this->html->css('fullcalendar');
?>
<script type='text/javascript'>// <![CDATA[
 
    $(document).ready(function() {
        $('#calendar').fullCalendar({
            events: "/sistema/visitas/feed",
            //theme: true,
            header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
            },
            //defaultDate: '2014-06-12',
            editable: true,
            eventDrop: function(event, dayDelta, minuteDelta, allDay, revertFunc) {
                if (dayDelta>=0) {
                    dayDelta = "+"+dayDelta;
                }
                $.post("/sistema/visitas/move/"+event.id+"/"+dayDelta+"/");
            },
            dayClick: function(date, jsEvent, view) {     
                var st = date.format();
                st = st.replace('T', '/');
                st = st.replace('-', '/');
                st = st.replace('-', '/');
                st = st.replace(':', '/');
                st = st.replace(':', '/');
                //alert('Clicked on: ' + st);
                $("#eventdata").show();
                //$("#eventdata").load("/Inova/visitas/add2/"+ date.format());
                $("#eventdata").load("/sistema/visitas/add2/"+ st + "/",
                function(response, status, xhr){
                    $("#eventdata").html(response);
                });
                //alert('Clicked on: ' + date.format());
                //alert('Clicked on: ' +$.fullCalendar.formatDate( date, "dd/MM/yyyy/HH/mm"));
                //window.location="/Inova/visitas/add/"+date.format();
                $(this).css('background-color', 'red');
                document.getElementById('detalhes').focus();
            }
        });
        $('#calendarchamado').fullCalendar({
            events: "/Inova/chamados/feed",
            //events: "/sistema/chamados/feed",
            header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
            },
            //defaultDate: '2014-06-12',
            /*editable: true,
            eventDrop: function(event, dayDelta, minuteDelta, allDay, revertFunc) {
                if (dayDelta>=0) {
                    dayDelta = "+"+dayDelta;
                }
                $.post("/Inova/chamados/move/"+event.id+"/"+dayDelta+"/");
                //$.post("/sistema/chamados/move/"+event.id+"/"+dayDelta+"/");
            },
            dayClick: function(date, jsEvent, view) {     
                var st = date.format();
                st = st.replace('T', '/');
                st = st.replace('-', '/');
                st = st.replace('-', '/');
                st = st.replace(':', '/');
                st = st.replace(':', '/');
                //alert('Clicked on: ' + date.format());
                $("#eventdatacalend").show();
                $("#eventdatacalend").load("/Inova/chamados/add2/"+ st + "/",
                //$("#eventdata").load("/sistema/chamados/add2/"+ st + "/",
                function(response, status, xhr){
                    $("#eventdatacalend").html(response);
                });
                $(this).css('background-color', 'red');
                document.getElementById('detalhes').focus();
            }*/
        });
    });
 
// ]]></script>
<!-- hide the eventdata div when the page   loads -->
<script type="text/javascript">
$(document).ready(function(){
    $("#eventdata").hide();
    //$("#eventdatacalend").hide();
});
</script>

<?php 
  echo $this->html->script("libs/jquery-latest", array('inline'=>false)); 
  echo $this->Javascript->link('jquery.jeditable.mini'); 
  echo $this->Html->script('libs/jquery.bpopup.min');  
  echo $this->Html->script('wrapped-text-popup-1.0'); 
?>

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

$situacoes_data = ClassRegistry::init($model_tabs)->find('all', array('recursive' => 0));
for ($i = 0; $i < count($situacoes_data); $i++){
    $situacoes[$situacoes_data[$i]['Situacao']['id']] = $situacoes_data[$i]['Situacao']['nome']; 
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
                    <a href="<?php echo '#tab' . $tab[$model_tabs]['id'] ?>"  data-toggle="tab"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;<?php echo ucwords(utf8_encode(strtolower(utf8_decode($tab[$model_tabs]['nome'])))) ?></a>
                </li>
            <?php endforeach; ?>
                <li>
                    <a href="#tabPrev" data-toggle="tab"><span class="glyphicon glyphicon-time"></span>&nbsp;<?php echo __('Previsão de Execução'); ?></a>
                </li>
                <li>
                    <a href="#tabCalend" data-toggle="tab"><span class="glyphicon glyphicon-calendar"></span>&nbsp;<?php echo __('Agenda de Chamados'); ?></a>
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
                                        <?php echo $this->Html->link($task['Cliente']['fantasia'], array('controller' => 'clientes', 'action' => 'view', $task['Cliente']['id'])) ?>
                                    </td>
                                    <td>
                                        <?php echo  $task['Chamado']['contato'] ?>
                                    </td>
                                    <td>
                                        <?php echo $this->Html->wrapText($task['Chamado']['id'], $task['Chamado']['descricao']); ?>&nbsp;
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
                                    <td align="right">
                                        <?php echo $this->Html->link(__('Histórico'), array('controller' => 'historicos', 'action' => 'add', $task['Chamado']['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                        
                                        <a class="btn btn-default btn-xs">
                                            <div class="edit" id="situacao<?php echo $task['Chamado']['id']; ?>">
                                                <?php echo $task['Situacao']['nome']; ?>
                                            </div>
                                        </a>
                                        
                                        <?php 
                                        echo $this->Ajax->editor(
                                            'situacao' . $task['Chamado']['id'], 
                                            array( 
                                                'controller' => 'Chamados', 
                                                'action' => 'situacao',
                                            ), 
                                            array(
                                                'indicator' => '<img src="/sistema/img/load.gif">',
                                                'submit' => '<img src="/sistema/img/bullet_disk.png">',
                                                'type' => 'select',
                                                'style' => 'inherit',
                                                'submitdata' => array('id'=> h($task['Chamado']['id'])),
                                                'data' => $situacoes,
                                                'tooltip'   => 'Clique para alterar a situação'
                                                )
                                        ); 
                                        ?>
                                        <a class="btn btn-default btn-xs" id="adicionar<?php echo $task['Chamado']['id']; ?>">Adicionar</a>
                                        <script type="text/javascript">
                                                $(document).ready(function(){

                                                $('#historico<?php echo $task['Chamado']['id']; ?>').hide();

                                                $('#adicionar<?php echo $task['Chamado']['id']; ?>').click(function(){
                                                    $('#segundo<?php echo $task['Chamado']['id']; ?>').html(''); 
                                                    $('#historico<?php echo $task['Chamado']['id']; ?>').show('slow');

                                                });

                                                $('#fechar<?php echo $task['Chamado']['id']; ?>').click(function(){

                                                    $('#historico<?php echo $task['Chamado']['id']; ?>').hide('slow');
                                                    
                                                })

                                                });
                                        </script>
                                    </td>
                                </tr>
                                <tr id="historico<?php echo $task['Chamado']['id']; ?>" style="padding: 0">
                                    <td style="padding: 0; border-top: 0px">
                                        <img id="loading<?php echo $task['Chamado']['id']; ?>" src="/sistema/img/load.gif" style="display: none"/>
                                    </td>
                                    <td style="padding: 0; border-top: 0px">
                                        <div id="primeiro<?php echo $task['Chamado']['id']; ?>"></div>
                                    </td>
                                    <td style="padding: 0; border-top: 0px">
                                        <p id="segundo<?php echo $task['Chamado']['id']; ?>"></p>
                                    </td>
                                    <td align="right" style="padding: 0; border-top: 0px">
                                        <?php echo __('Historico'); ?>: &nbsp;
                                    </td>
                                    <td colspan="3" align="right" style="padding: 0">
                                        <?php
                                            echo $this->Form->create('Historico');
                                            echo $this->Form->input('descricao', array('label' => '', 'type' => 'text', 'style' => 'width: 100%'));
                                            echo $this->Form->input('chamado_id', array('label' => '', 'type' => 'hidden', 'value' => $task['Chamado']['id']));
                                            echo $this->Ajax->submit('Incluir', array(
                                                'url'=> array('controller'=>'historicos', 'action'=>'rapido'), 
                                                'update' => array('primeiro' . $task['Chamado']['id'], 'segundo' . $task['Chamado']['id']),
                                                //'condition' => '$("#texto").val() == $("#texto2").val()',
                                                'confirm' => 'Confirma inclusao desse historico?',
                                                'indicator' => 'loading' . $task['Chamado']['id'],
                                                'before' => '$("#segundo' . $task['Chamado']['id'] . '").html("Aguarde...")',
                                                'after' => 
                                                   '$("#historico' . $task['Chamado']['id'] . '").hide("slow");' .
                                                   '$("#loading' . $task['Chamado']['id'] . '").hide("slow");',
                                                'class' => 'btn btn-default btn-xs' 
                                                ));
                                            echo $this->Form->end();
                                        ?>
                                    </td>
                                    <td align="right" style="padding-top: 0px; padding-right: 8px; border-top: 0px">
                                        <a class="btn btn-default btn-xs" id="fechar<?php echo $task['Chamado']['id']; ?>">Fechar</a>
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
                                            //'Chamado.user_id' => $usuario_logado['id'],
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
                                        <?php echo $this->Html->link($task['Cliente']['fantasia'], array('controller' => 'clientes', 'action' => 'view', $task['Cliente']['id'])) ?>
                                    </td>
                                    <td>
                                        <?php echo  $task['Chamado']['contato'] ?>
                                    </td>
                                    <td>
                                        <?php echo $this->Html->wrapText($task['Chamado']['id'], $task['Chamado']['descricao']); ?>&nbsp;
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
                                            //'Chamado.user_id' => $usuario_logado['id'],
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
                                        <?php echo $this->Html->link($task['Cliente']['fantasia'], array('controller' => 'clientes', 'action' => 'view', $task['Cliente']['id'])) ?>
                                    </td>
                                    <td>
                                        <?php echo  $task['Chamado']['contato'] ?>
                                    </td>
                                    <td>
                                        <?php echo $this->Html->wrapText($task['Chamado']['id'], $task['Chamado']['descricao']); ?>&nbsp;
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
            
                <div class="tab-pane" id="tabCalend">            
                    <div id="calendarchamado"></div>
                    <br>
                    <div id="eventdatacalend"></div>
                    <br>                    
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
if ((strtolower($usuario_logado['role']) == 'admin') || 
    (strtolower($usuario_logado['role']) == 'root') || 
    (strtolower($usuario_logado['role']) == 'vendas')) {
    //$conditions = array('conditions' => array('Visita.user_id = ' => $usuario_logado['id']));
    $visita_conditions = array('conditions' => array('Visita.data >= ' => date('y.m.d')));
    $visita_mural = ClassRegistry::init('Visita')->find('all', array('limit' => 5, $visita_conditions, 'order' => 'Visita.data desc'));

    echo '<div class="recados">';
    echo '<h4><span class="glyphicon glyphicon-road"></span>&nbsp;Visitas</h4>';
    echo '</div>';
    echo '<div class="recados-lista">';
    ?>
            <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                    <li class="active">
                        <a href="#tab_1" data-toggle="tab"><span class="glyphicon glyphicon-calendar"></span> Calend&aacute;rio</a>
                    </li>
                    <li>
                        <a href="#tab_2" data-toggle="tab"><span class="glyphicon glyphicon-list"></span> Lista</a>
                    </li>
            </ul>
            <br>
            <div id="tab_" class="tab-content">
                <div class="tab-pane active" id="tab_1"> 
                    <div id="calendar"></div>
                    <br>
                    <div id="eventdata"></div>
                </div>
                <div class="tab-pane" id="tab_2">
                    <?php 
                        $this->Visita->desenha($visita_mural);
                        echo '</div>';
                    ?>
                </div>
            </div> <?php
}

if ((strtolower($usuario_logado['role']) == 'admin') || 
    (strtolower($usuario_logado['role']) == 'root')) { ?>
    <div class="recados">
        <h4><span class="glyphicon glyphicon-stats"></span>&nbsp;Gráficos</h4>
    </div>
    <div class="recados-lista">
        <table style="width:100%" border=0>
          <tr>
            <td><img src="/sistema/img/1.png" alt="" width="200" height="200"></td>
            <td><img src="/sistema/img/2.png" alt="" width="200" height="200"></td>		
            <td><img src="/sistema/img/3.png" alt="" width="200" height="200"></td>
          </tr>
          <tr>
            <td colspan="3" align="center"><img src="/sistema/img/4.png" alt="" width="700" height="200"></td>
          </tr>
        </table>
    </div>
    <?php
    }
?>
