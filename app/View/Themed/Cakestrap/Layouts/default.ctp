<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
$cakeDescription = __d('cake_dev', 'Inovatech');
$usuario_logado = $this->Session->read('Auth.User');
?>
<?php echo $this->Html->docType('html5'); ?> 
<html>
   <head>
      <?php echo $this->Html->charset(); ?>
      <title>
         <?php echo $cakeDescription ?>:
         <?php echo $title_for_layout; ?>
      </title>
      <?php
echo $this->Html->meta('icon');

echo $this->fetch('meta');


echo $this->Html->css('bootstrap.min');       
echo $this->Html->css('sb-admin');
echo $this->Html->css('datepicker');
echo $this->Html->css('bootstrap-datetimepicker');
echo $this->Html->css('inova');
echo $this->Html->css('cores');
echo $this->Html->css('font-awesome.min');
echo $this->Html->css('bootstrap-combobox');


echo $this->fetch('css');


echo $this->Html->script('libs/jquery-2.1.3.min');
echo $this->Html->script('libs/bootstrap.min');
echo $this->Html->script('libs/data/bootstrap-datepicker');
echo $this->Html->script('libs/data/locales/bootstrap-datepicker.pt-BR');        
echo $this->Html->script('libs/bootstrap-datetimepicker');
echo $this->Html->script('libs/locales/bootstrap-datetimepicker.pt-BR');
echo $this->Html->script('libs/jquery.mask');
echo $this->Html->script('libs/jquery.bpopup.min');


echo $this->Html->script('datepicker');
echo $this->Html->script('datetimepicker');
echo $this->Html->script('mascaras');
echo $this->Html->script('wrapped-text-popup-1.0');
echo $this->Html->script('libs/bootstrap-combobox');


echo $this->fetch('script');
echo $this->Js->writeBuffer(); // note: write cached scripts 
      ?>
   </head>
   <body>
      <div id="wrapper">
         <?php echo $this->element('menu/top_menu');?>
         <div id="page-wrapper">
            <div  class="container-fluid">
               <?php echo $this->Session->flash(); ?>
               <?php echo $this->fetch('content'); ?>
            </div><!-- /#content .container -->
         </div>
         <div id="footer" class="container">
            <?php //Silence is golden ?>
         </div><!-- /#footer .container -->

      </div><!-- /#main-container -->		
      <script>
         $(document).ready(function(){ $('[data-toggle=tooltip]').tooltip()});
         $(document).ready(function(){ $('.combobox').combobox(); });
      </script>
      <?php echo $this->Html->script('cfg-currency');?>
      <?php echo $this->Html->script('cfg-fone');?>
   </body>

</html>