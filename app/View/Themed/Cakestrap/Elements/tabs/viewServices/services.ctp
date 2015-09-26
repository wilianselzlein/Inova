<div id="content">
	<ul id="tabs" class="nav nav-tabs" data-tabs="tabs" style=" border-bottom-width: 0px;">
		<li class="active">
			<a href="#tdomains" data-toggle="tab"><i class="fa fa-registered"></i>&nbsp;<?php echo __('Domains'); ?></a>
		</li>               
		<li>
			<a href="#thostings" data-toggle="tab"><i class="fa fa-cloud"></i>&nbsp;<?php echo __('Hostings'); ?></a>
		</li>               
		<li>
			<a href="#temails" data-toggle="tab"><i class="fa fa-envelope-o"></i></span>&nbsp;<?php echo __('E-mails'); ?></a>
		</li>
		<li>
			<a href="#tsocialmedias" data-toggle="tab"><i class="fa fa-share-alt"></i></span>&nbsp;<?php echo __('Social Medias'); ?></a>
		</li>
		<li>
			<a href="#tincomes" data-toggle="tab"><i class="fa fa-money"></i></span>&nbsp;<?php echo __('Incomes'); ?></a>
		</li>
		<li>
			<a href="#twebsites" data-toggle="tab"><i class="fa fa-wordpress"></i></span>&nbsp;<?php echo __('Websites'); ?></a>
		</li>
		<li>
			<a href="#twebpages" data-toggle="tab"><i class="fa fa-file-text"></i></span>&nbsp;<?php echo __('Webpages'); ?></a>
		</li>
	</ul>
	<div class="panel panel-default">
		<div class="panel-body">
			<div id="my-tab-content" class="tab-content">
				<div class="tab-pane active" id="tdomains">
					<?php echo $this->element('tabs/viewServices/tabDomains'); ?>
				</div>
				<div class="tab-pane" id="thostings">
					<?php echo $this->element('tabs/viewServices/tabHostings'); ?>
				</div>
				<div class="tab-pane" id="temails"> 
					<?php echo $this->element('tabs/viewServices/tabWebmails'); ?>
				</div>
				<div class="tab-pane" id="tsocialmedias"> 
					<?php echo $this->element('tabs/viewServices/tabSocialMedias'); ?>
				</div>  
				<div class="tab-pane" id="tincomes"> 
					<?php echo $this->element('tabs/viewServices/tabIncomes'); ?>
				</div>  
				<div class="tab-pane" id="twebsites"> 
					<?php echo $this->element('tabs/viewServices/tabWebsites'); ?>
				</div>  
				<div class="tab-pane" id="twebpages"> 
					<?php echo $this->element('tabs/viewServices/tabWebpages'); ?>
				</div>            
			</div>
		</div>            
	</div>
</div>

<script type="text/javascript">
	jQuery(document).ready(function($) {
		$('#tabs').tab();
	});
</script> 