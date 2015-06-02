<style>
   @import url(http://fonts.googleapis.com/css?family=Lancelot);

   body {
      padding-top: 40px;
      padding-bottom: 40px;
      background-color: #eee;
   }

   .form-signin {
      max-width: 330px;
      padding: 15px;
      margin: 0 auto;
   }
   .form-signin .form-signin-heading{
      font-family: 'Lancelot';
      font-size: 72px;
      text-align: center;
   }
   .form-signin .form-signin-heading,
   .form-signin .checkbox {
      margin-bottom: 10px;
   }
   .form-signin .checkbox {
      font-weight: normal;
   }
   .form-signin .form-control {
      position: relative;
      height: auto;
      -webkit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      box-sizing: border-box;
      padding: 10px;
      font-size: 16px;
   }
   .form-signin .form-control:focus {
      z-index: 2;
   }
   .form-signin input[type="email"] {

      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
   }
   .form-signin input[type="password"] {

      border-top-left-radius: 0;
      border-top-right-radius: 0;
   }
   .non-rounded{
      border-radius: 0 !important;
   }
</style>
<style>
   .modal-header{
      background-color: #0B6E01 !important;
   }
</style>
<div id="restrict-area-login">

   <?php echo $this->Form->create('User', array('class'=>'form-signin', 'role' => 'form'));?>

   <?php echo $this->Session->flash(); ?>        
   <?php echo $this->Html->image('logo-300x195.png', array('class' =>'logo'));?><br>
   <br>
   <br>
   <div class="input-group input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <?php echo $this->Form->input('username', array('class' => 'form-control non-rounded', 'placeholder'=>"Usuário", "label"=>false));?>            
   </div>

   <br>
   <div class="input-group input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
      <?php echo $this->Form->input('password', array('class' => 'form-control non-rounded', 'placeholder'=>"Senha", "label"=>false));?>
   </div>
   <br>
   <?php echo $this->Form->submit(__('Login'), array('class' => 'btn btn-lg btn-default btn-block non-rounded'));?>    
   <?php echo $this->Form->end(); ?>


</div>
