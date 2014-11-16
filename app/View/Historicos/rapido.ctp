<?php
echo $this->Form->create('Historico', array('role' => 'form'));
echo $this->form->input('descricao', array('label' => '', 'style' => 'width: 100%'));
echo $this->form->input('chamado_id', array('label' => '', 'type' => 'hidden', 'value' => '6'));

echo $this->Ajax->submit('Incluir', array(
    'url'=> array('controller'=>'historicos', 'action'=>'rapido'), 
    'update' => array('primeiro' . '1', 'segundo' . '1'),
    //'condition' => '$("#texto").val() == $("#texto2").val()',
    'confirm' => 'Confirma inclusao desse historico?',
    'indicator' => 'loading',
    'before' => '$("#segundo' . '1' . '").html("Aguarde...")',
    'after' => '$("#historico' . '1' . '").hide("slow");',
    'class' => 'btn btn-default btn-xs' 
    ));
echo $this->form->end(); 
?>