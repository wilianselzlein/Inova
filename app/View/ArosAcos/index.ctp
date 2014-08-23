
<div id="page-container" class="row">
    <div id="sidebar" class="col-sm-3">
        <div class="actions">
                <ul class="list-group">
                        <li class="list-group-item"><?php echo $this->Html->link(__('New') . ' ' . __('ArosAcos'), array('action' => 'add')); ?></li>
                        <li class="list-group-item"><?php echo $this->Html->link(__('List') . ' ' .  __('Aros'), array('controller' => 'aros', 'action' => 'index')); ?> </li>
                        <li class="list-group-item"><?php echo $this->Html->link(__('New') . ' ' . __('Aro'), array('controller' => 'aros', 'action' => 'add')); ?> </li>
                        <li class="list-group-item"><?php echo $this->Html->link(__('List') . ' ' . __('Acos'), array('controller' => 'acos', 'action' => 'index')); ?> </li>
                        <li class="list-group-item"><?php echo $this->Html->link(__('New') . ' ' . __('Aco'), array('controller' => 'acos', 'action' => 'add')); ?> </li>
                </ul>
        </div>
    </div><!-- /#sidebar .col-sm-3 -->
    <div id="page-content" class="col-sm-9">
        <div class="ArosAco index">    
            <h2><?php echo __('Permissões'); ?></h2>
            <div class="table-responsive">
                <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
                <tr>
                                <th><?php echo $this->Paginator->sort('id'); ?></th>
                                <th><?php echo $this->Paginator->sort('aro_id'); ?></th>
                                <th><?php echo $this->Paginator->sort('aco_id'); ?></th>
                                <th><?php echo $this->Paginator->sort('_create', 'Adicionar'); ?></th>
                                <th><?php echo $this->Paginator->sort('_read', 'Visualizar'); ?></th>
                                <th><?php echo $this->Paginator->sort('_update', 'Editar'); ?></th>
                                <th><?php echo $this->Paginator->sort('_delete', 'Deletar'); ?></th>
                                <th class="actions"><?php echo __('Actions'); ?></th>
                </tr>
                <?php foreach ($arosAcos as $arosAco): ?>
                <tr>
                        <td><?php echo h($arosAco['ArosAco']['id']); ?>&nbsp;</td>
                        <td>
                                <?php echo $this->Html->link($arosAco['Aro']['alias'], array('controller' => 'aros', 'action' => 'view', $arosAco['Aro']['id'])); ?>
                        </td>
                        <td>
                                <?php echo $this->Html->link($arosAco['Aco']['alias'], array('controller' => 'acos', 'action' => 'view', $arosAco['Aco']['id'])); ?>
                        </td>
                        <td><span class="<?php echo ($arosAco['ArosAco']['_create'] == true ? 'glyphicon glyphicon-check' : 'glyphicon glyphicon-unchecked'); ?>"></span> &nbsp;</td> 
                        <td><span class="<?php echo ($arosAco['ArosAco']['_read'] == true ? 'glyphicon glyphicon-check' : 'glyphicon glyphicon-unchecked'); ?>"></span> &nbsp;</td> 
                        <td><span class="<?php echo ($arosAco['ArosAco']['_update'] == true ? 'glyphicon glyphicon-check' : 'glyphicon glyphicon-unchecked'); ?>"></span> &nbsp;</td> 
                        <td><span class="<?php echo ($arosAco['ArosAco']['_delete'] == true ? 'glyphicon glyphicon-check' : 'glyphicon glyphicon-unchecked'); ?>"></span> &nbsp;</td> 
                        <td class="actions">
                                <?php echo $this->Html->link(__('View'), array('action' => 'view', $arosAco['ArosAco']['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $arosAco['ArosAco']['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $arosAco['Aro']['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $arosAco['Aro']['id'])); ?>
                        </td>
                </tr>
                <?php endforeach; ?>
                </table>
            </div>
            <p><small>
				<?php
					echo $this->Paginator->counter(array(
					'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
					));
				?>
			</small></p>

			<ul class="pagination">
				<?php
					echo $this->Paginator->prev('< ' . __('Previous'), array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
					echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'tag' => 'li', 'currentClass' => 'disabled'));
					echo $this->Paginator->next(__('Next') . ' >', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
				?>
			</ul><!-- /.pagination -->
			

        </div>
    </div>
</div>
    