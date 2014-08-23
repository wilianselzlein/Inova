
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
			
			<ul class="list-group">			
						<li class="list-group-item"><?php echo $this->Html->link(__('Edit').' '.__('Aro'), array('action' => 'edit', $Aro['Aro']['id']), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Form->postLink(__('Delete').' '.__('Aro'), array('action' => 'delete', $Aro['Aro']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $Aro['Aro']['id'])); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List').' '.__('Aros'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New').' '.__('Aro'), array('action' => 'add'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List').' '.__('Users'), array('controller' => 'users', 'action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New').' '.__('User'), array('controller' => 'users', 'action' => 'add'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List').' '.__('Aros'), array('controller' => 'aros', 'action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New').' '.__('Aros'), array('controller' => 'aros', 'action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- /.list-group -->
			
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .span3 -->
	
	<div id="page-content" class="col-sm-9">
		
		<div class="Aros view">

			<h2><?php  echo __('Aro'); ?></h2>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($Aro['Aro']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Parent_id'); ?></strong></td>
		<td>
			<?php //echo h($Aro['Aro']['parent_id']); ?>
                        <?php echo $this->Html->link(h($Aro['Aro']['parent_id']), array('action' => 'view', $Aro['Aro']['parent_id'])); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Model'); ?></strong></td>
		<td>
			<?php echo h($Aro['Aro']['model']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Foreign_key'); ?></strong></td>
		<td>
			<?php echo h($Aro['Aro']['foreign_key']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Alias'); ?></strong></td>
		<td>
			<?php echo h($Aro['Aro']['alias']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Left'); ?></strong></td>
		<td>
			<?php echo h($Aro['Aro']['lft']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Right'); ?></strong></td>
		<td>
			<?php echo h($Aro['Aro']['rght']); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

					
<div class="related">

    <h3><?php echo __('Acos'); ?></h3>

    <?php if (!empty($Aro['Acos'])): ?>

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th><?php echo __('Id'); ?></th>
                        <th><?php echo __('aro'); ?></th>
                        <th><?php echo __('create'); ?></th>
                        <th><?php echo __('read'); ?></th>
                        <th><?php echo __('update'); ?></th>
                        <th><?php echo __('delete'); ?></th>
                        <th class="actions"><?php echo __('Actions'); ?></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $i = 0;
                    foreach ($Aro['Acos'] as $aco): ?>
                        <tr>
                            <td><?php echo $aco['id']; ?></td>
                            <td><?php echo $aco['aro_id']; ?></td>
                            <td><span class="<?php echo ($aco['_create'] == true ? 'glyphicon glyphicon-check' : 'glyphicon glyphicon-unchecked'); ?>"></span> &nbsp;</td> 
                            <td><span class="<?php echo ($aco['_read']   == true ? 'glyphicon glyphicon-check' : 'glyphicon glyphicon-unchecked'); ?>"></span> &nbsp;</td> 
                            <td><span class="<?php echo ($aco['_update'] == true ? 'glyphicon glyphicon-check' : 'glyphicon glyphicon-unchecked'); ?>"></span> &nbsp;</td> 
                            <td><span class="<?php echo ($aco['_delete'] == true ? 'glyphicon glyphicon-check' : 'glyphicon glyphicon-unchecked'); ?>"></span> &nbsp;</td> 
                            <td class="actions">
                                <?php echo $this->Html->link(__('View'), array('controller' => 'aros', 'action' => 'view', $aco['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                <?php echo $this->Html->link(__('Edit'), array('controller' => 'aros', 'action' => 'edit', $aco['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'aros', 'action' => 'delete', $aco['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $aro['id'])); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table><!-- /.table table-striped table-bordered -->
        </div><!-- /.table-responsive -->
				
    <?php endif; ?>

    <div class="actions">
        <?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('New').' '.__('Aco'), array('controller' => 'acos', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				
    </div><!-- /.actions -->

    <h3><?php echo __('Sons'); ?></h3>

    <?php if (!empty($Sons)): ?>

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th><?php echo __('Id'); ?></th>
                        <th><?php echo __('Parent_id'); ?></th>
                        <th><?php echo __('Model'); ?></th>
                        <th><?php echo __('Foreign_key'); ?></th>
                        <th><?php echo __('Alias'); ?></th>
                        <th><?php echo __('Lft'); ?></th>
                        <th><?php echo __('Rght'); ?></th>
                        <th class="actions"><?php echo __('Actions'); ?></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $i = 0;
                    foreach ($Sons as $son): ?>
                        <tr>
                            <td><?php echo $this->Html->link(h($son['Aro']['id']), array('action' => 'view', $son['Aro']['id'])); ?></td>
                            <td><?php echo $son['Aro']['parent_id']; ?></td>
                            <td><?php echo $son['Aro']['model']; ?></td>
                            <td><?php echo $son['Aro']['foreign_key']; ?></td>
                            <td><?php echo $son['Aro']['alias']; ?></td>
                            <td><?php echo $son['Aro']['lft']; ?></td>
                            <td><?php echo $son['Aro']['rght']; ?></td>
                            <td class="actions">
                                <?php echo $this->Html->link(__('View'), array('controller' => 'aros', 'action' => 'view', $son['Aro']['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                <?php echo $this->Html->link(__('Edit'), array('controller' => 'aros', 'action' => 'edit', $son['Aro']['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'aros', 'action' => 'delete', $son['Aro']['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $son['Aro']['id'])); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table><!-- /.table table-striped table-bordered -->
        </div><!-- /.table-responsive -->
				
    <?php endif; ?>

    <div class="actions">
        <?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('New').' '.__('Aro'), array('controller' => 'aros', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>
    </div><!-- /.actions -->

</div><!-- /.related -->
			
</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
