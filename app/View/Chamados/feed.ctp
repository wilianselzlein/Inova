<?php
//3. Create the json array

//debug($events);

$rows = array();
for ($a=0; count($events)> $a; $a++) {
 
    //Is it an all day event?
    //$all = ($events[$a]['Visita']['allday'] == 1);

    //Create an event entry
    $rows[] = array('id' => $events[$a]['Chamados']['id'],
        'title' => $events[$a]['Clientes']['fantasia'],
        'start' => date('Y-m-d H:i', strtotime($events[$a]['Historicos']['datainicial'])),
        'end' => date('Y-m-d H:i',strtotime($events[$a][0]['datafinal'])),
        'url' => 'chamados/view/' . $events[$a]['Chamados']['id'],
        //'allDay' => $all,
    );
}
 
//4. Return as a json array
Configure::write('debug', 0);
$this->autoRender = false;
$this->autoLayout = false;
$this->response->header('Content-Type: application/json');
echo json_encode($rows);

?>