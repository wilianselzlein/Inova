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
            <div>
                <div>
<?php
    $tipo = '';
    foreach ($relatorios as $relatorio): ?>
        <?php if (! strcmp($tipo, $relatorio['Relatorio']['tipo']) == 0) { ?>
                </div>
            </div>
            <div class="panel panel-default">            
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $relatorio['Relatorio']['tipo'];?></h3>
                </div>
                <div class="panel-body">
        <?php } ?>
        <div class="dashboard-icon">
        <?php 
            echo $this->Html->link($this->html->image('icons/report.png', array('title'=>$relatorio['Relatorio']['nome'])), array('action' => 'filter', $relatorio['Relatorio']['id']), array('class' => '', 'escape' => false, 'escape'=> false)); ?>
            <span><?php echo $relatorio['Relatorio']['nome'];?></span>
        </div>           
        <?php 
        $tipo = $relatorio['Relatorio']['tipo'];
    endforeach; 
        ?>
                </div>
            </div>
</div><!-- /#page-container .row-fluid -->