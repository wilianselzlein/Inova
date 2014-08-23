<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
            <div class="actions">
			<ul class="list-group">
                            <li class="list-group-item"><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ArosAco.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ArosAco.id'))); ?></li>
                            <li class="list-group-item"><?php echo $this->Html->link(__('List') . ' ' .  __('ArosAcos'), array('action' => 'index')); ?></li>
                            <li class="list-group-item"><?php echo $this->Html->link(__('List') . ' ' .  __('Aros'), array('controller' => 'aros', 'action' => 'index')); ?> </li>
                            <li class="list-group-item"><?php echo $this->Html->link(__('New') . ' ' .  __('Aro'), array('controller' => 'aros', 'action' => 'add')); ?> </li>
                            <li class="list-group-item"><?php echo $this->Html->link(__('List') . ' ' . __('Acos'), array('controller' => 'acos', 'action' => 'index')); ?> </li>
                            <li class="list-group-item"><?php echo $this->Html->link(__('New') . ' ' . __('Aco'), array('controller' => 'acos', 'action' => 'add')); ?> </li>
                    </ul>
            </div>
		
	</div><!-- /#sidebar .col-sm-3 -->
	
	<div id="page-content" class="col-sm-9">

            <div class="arosAcos form">
            <?php echo $this->Form->create('ArosAco'); ?>
                    <fieldset>
                        <legend><?php echo __('Edit') . ' ' . __('ArosAcos'); ?></legend>

                        <div class="form-group">
                            <?php echo $this->Form->input('id', array('class' => 'form-control')); ?>
                        </div><!-- .form-group -->
                        <div class="form-group">
                            <?php echo $this->Form->input('aro_id', array('class' => 'form-control')); ?>
                        </div><!-- .form-group -->
                        <div class="form-group">
                            <?php echo $this->Form->input('aco_id', array('class' => 'form-control')); ?>
                        </div><!-- .form-group -->
                        <b>
                        <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
                            <tr>
                                <th width="25%"><?php echo __('create');?></th>
                                <th width="25%"><?php echo __('read');?></th>
                                <th width="25%"><?php echo __('update');?></th>
                                <th width="25%"><?php echo __('delete');?></th>
                            </tr>
                            <tr>
                                <td><?php echo $this->Form->input('_create',  array('type' => 'checkbox', 'label' => '')); ?></td>
                                <td><?php echo $this->Form->input('_read',  array('type' => 'checkbox', 'label' => '')); ?></td>
                                <td><?php echo $this->Form->input('_update',  array('type' => 'checkbox', 'label' => '')); ?></td>
                                <td><?php echo $this->Form->input('_delete',  array('type' => 'checkbox', 'label' => '')); ?></td>
                            </tr>
                        </table>
                        </b>
                    </fieldset>
            <?php echo $this->Form->end(__('Submit')); ?>
            </div>
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->