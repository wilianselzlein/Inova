<div id="page-container" class="row">
    <style>
        .dashboard-icon
        {
            float:left;
            margin:15px;
            width:10%;
            border:0px solid red;
            -moz-transition:-moz-transform 0.2s ease-in; 
            -webkit-transition:-webkit-transform 0.2s ease-in; 
            -o-transition:-o-transform 0.2s ease-in;           
        }                
        .dashboard-icon img, .dashboard-icon span
        {
            width:100%;
            text-align: center;
            display: block;
        }        
        .dashboard-icon:hover
        {
            -moz-transform:scale(1.3); 
            -webkit-transform:scale(1.3);
            -o-transform:scale(1.3);
        }                 
    </style>
<?php

foreach ($relatorios as $relatorio): ?>
    <div class="dashboard-icon">
    <?php echo $this->Html->link($this->html->image('icons/report.png', array('title'=>$relatorio['name'])), array('action' => 'filter', $relatorio['id']), array('class' => '', 'escape' => false, 'escape'=> false)); ?>

        <span>Relatório de Visitas</spann>
    </div>
<?php endforeach; ?>
    
</div><!-- /#page-container .row-fluid -->