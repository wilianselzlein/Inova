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

			echo $this->Html->css('bootstrap');
			echo $this->Html->css('main');
                        
                        echo $this->Html->css('inova');
                        echo $this->Html->css('cores');
                        
                        
			echo $this->fetch('css');
			
			echo $this->Html->script('libs/jquery-1.10.2.min');
			echo $this->Html->script('libs/bootstrap.min');
			
			echo $this->fetch('script');
		?>
	</head>

	<body>

		<div id="main-container">
		
			<div id="header" class="container">
                            
				<?php if($this->Session->read('Auth.User'))
                                        {
                                            echo $this->element('menu/top_menu'); 
                                        }
                                ?>
			</div><!-- /#header .container -->
			
			<div id="content" class="container">
				<?php echo $this->Session->flash(); ?>
				<?php echo $this->fetch('content'); ?>
			</div><!-- /#content .container -->
			<!-- /
			<div id="footer" class="well well-sm" >				
                            <footer>Copyright &copy; <php echo date('Y');?> <a href="http://inovatechinfo.com.br/" style="color:#777">Inova: Revenda Domper</a></footer>
			</div>#footer .container -->
			
		</div><!-- /#main-container -->
		<?php if($this->Session->read('Auth.User')):?>
                                        {
		<div class="container">
                    
			<div class="well well-sm">
                            <footer>Copyright &copy; <?php echo date('Y');?> <a href="http://inovatechinfo.com.br/sistema" style="color:#fff">Inovatech Solu&ccedil;&odblac;es Tecnol&oacute;gicas</a></footer>
			<!--/	<small>
					<php echo $this->element('sql_dump'); ?>
				</small> -->
			</div><!-- /.well well-sm -->
		</div> <!-- /.container -->
		<?php endif;?>
	</body>

</html>