<div class="panel panel-default">
	<div class="panel-heading">
		<h3>
			<span class="fa fa-cloud"></span> <?php echo __('Add').' '.__('Hosting'); ?>
			<div class="btn-group pull-right">
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
					<?php echo __('Actions');?><span class="caret"></span>
				</button>
				<ul class="dropdown-menu" role="menu">
					<li class="list-group-item"><?php echo $this->CustomHtml->linkIndex(__('Hostings'));?></li>
					<li class="divider"></li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkIndex(__('Domains'), array('controller' => 'domains'));?></li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkAdd(__('Domain'), array('controller' => 'domains'));?></li>
					<li class="divider"></li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkIndex(__('PayPlans'), array('controller' => 'payplans'));?></li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkAdd(__('PayPlan'), array('controller' => 'payplans'));?></li>
				</ul>
			</div>
		</h3>
	</div>
	<div class="panel-body">
		<?php echo $this->Form->create('Hosting', array('role' => 'form', 'class'=>'form-horizontal')); ?>
		<fieldset>
			<div class="form-group">
				<?php
				if(isset($domainDefaults)){
					echo $this->Form->input('domain_id', array('class' => 'form-control', 'disabled' => true, 'div'=> array('class'=>'col-sm-12')));
					echo $this->Form->hidden('domain_id', array('value' => $domainDefaults['id']));
				}else{
					echo $this->Form->input('domain_id', array('class' => 'form-control', 'div'=> array('class'=>'col-sm-12')));
				}
				 ?>
			</div><!-- .form-group -->
			<div class="form-group">
				<?php echo $this->Form->input('ftp_user', array('class' => 'form-control', 'value' => isset($domainDefaults) ? $domainDefaults['ftp_user'] : '','div'=> array('class'=>'col-sm-4'))); ?>
				<?php echo $this->Form->input('ftp_password', array('class' => 'form-control', 'div'=> array('class'=>'col-sm-4'))); ?>
				<?php echo $this->Form->input('ftp_url', array('class' => 'form-control', 'value' => isset($domainDefaults) ? $domainDefaults['ftp_url'] : '', 'div'=> array('class'=>'col-sm-4'))); ?>
			</div><!-- .form-group -->
			<div class="form-group">
				<?php echo $this->Form->input('emails_protocol', array('class' => 'form-control', 'options'=>array('I'=>'IMAP', 'P' => 'POP'), 'div'=> array('class'=>'col-sm-4'))); ?>
				<?php echo $this->Form->input('emails_size', array('class' => 'form-control', 'div'=> array('class'=>'col-sm-4'))); ?>
				<?php echo $this->Form->input('pay_plan_id', array('class' => 'form-control', 'div'=> array('class'=>'col-sm-4'))); ?>
			</div><!-- .form-group -->
			<div class="form-group">
				<?php echo $this->Form->input('is_active', array('class' => 'form-control checkbox2', 'div'=> array('class'=>'col-sm-12'), 'before'=>'<label>Ativo</label>', 'label'=>false, 'checked'=>true)); ?>
			</div><!-- .form-group -->
			<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-large btn-primary')); ?>
		</fieldset>
		<?php echo $this->Form->end(); ?>
	</div>
</div>
