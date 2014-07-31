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
                /*if (minuteDelta>=0) {
                    minuteDelta="+"+minuteDelta;
                }*/
                $.post("/sistema/visitas/move/"+event.id+"/"+dayDelta+"/"/*+minuteDelta+"/"*/);
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
    });
 
// ]]></script>
<!-- hide the eventdata div when the page   loads -->
<script type="text/javascript">
$(document).ready(function(){
    $("#eventdata").hide();
});
</script>
<div id="page-container" class="row">

    <div id="sidebar" class="col-sm-3">

        <div class="actions">

            <ul class="list-group">
                <li class="list-group-item"><?php echo $this->Html->link(__('New') . ' ' . __('Visita'), array('action' => 'add'), array('class' => '')); ?></li>
                <li class="list-group-item"><?php echo $this->Html->link(__('List') . ' ' . __('Clientes'), array('controller' => 'clientes', 'action' => 'index'), array('class' => '')); ?></li> 
                <li class="list-group-item"><?php echo $this->Html->link(__('New') . ' ' . __('Cliente'), array('controller' => 'clientes', 'action' => 'add'), array('class' => '')); ?></li> 
            </ul><!-- /.list-group -->

        </div><!-- /.actions -->

    </div><!-- /#sidebar .col-sm-3 -->

    <div id="page-content" class="col-sm-9">

        <div class="Visitas index">

            <h2><?php echo __('Visitas'); ?></h2>
            
            <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                    <li class="active">
                        <a href="#tab1" data-toggle="tab"><span class="glyphicon glyphicon-calendar"></span> Calend&aacute;rio</a>
                    </li>
                    <li>
                        <a href="#tab2" data-toggle="tab"><span class="glyphicon glyphicon-list"></span> Lista</a>
                    </li>
            </ul>
            <br>
            <div id="tab_" class="tab-content">
                <div class="tab-pane active" id="tab1"> 
                    <div id="calendar"></div>
                    <br>
                    <div id="eventdata"> </div>
                </div>
                <div class="tab-pane" id="tab2">
                
                    <?php echo $this->element('filtros'); ?>
                    <div class="table-responsive">
                        <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th><?php echo $this->Paginator->sort('id'); ?></th>
                                    <th><?php echo $this->Paginator->sort('cliente_id'); ?></th>
                                    <th><?php echo $this->Paginator->sort('data'); ?></th>
                                    <th><?php echo $this->Paginator->sort('nova'); ?></th>
                                    <th><?php echo $this->Paginator->sort('descricao'); ?></th>
                                    <th class="actions"><?php echo __('Actions'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($Visitas as $Visita): ?>
                                    <tr>
                                        <td><?php echo h($Visita['Visita']['id']); ?>&nbsp;</td>
                                        <td>
                                            <?php echo $this->Html->link($Visita['Cliente']['fantasia'], array('controller' => 'clientes', 'action' => 'view', $Visita['Cliente']['id'])); ?>
                                        </td>
                                        <td>
                                            <?php echo $this->Time->i18nFormat($Visita['Visita']['data'], $this->Html->__getDateTimeFormatView()); ?>&nbsp;

                                        </td>
                                        <td>
                                            <?php echo $this->Time->i18nFormat($Visita['Visita']['nova'], $this->Html->__getDateTimeFormatView()); ?>&nbsp;
                                        </td>
                                        <td><?php echo h($Visita['Visita']['detalhes']); ?>&nbsp;</td>
                                        <td class="actions">
                                            <?php echo $this->Html->link(__('View'), array('action' => 'view', $Visita['Visita']['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                            <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $Visita['Visita']['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                            <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $Visita['Visita']['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $Visita['Visita']['id'])); ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div><!-- /.table-responsive -->

                    <p><small>
                            <?php
                            echo $this->Paginator->counter(array(
                                'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
                            ));
                            ?>
                        </small></p>

                    <ul class="pagination">
                        <?php
                        echo $this->Paginator->prev('< ' . __('Previous'), array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
                        echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'tag' => 'li', 'currentClass' => 'disabled'));
                        echo $this->Paginator->next(__('Next') . ' >', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
                        ?>
                    </ul><!-- /.pagination -->
                </div>
            </div>
        </div><!-- /.index -->
    </div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->

