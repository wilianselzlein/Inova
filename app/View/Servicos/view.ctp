
<div id="page-container" class="row">

    <div id="sidebar" class="col-sm-3">

        <div class="actions">

            <ul class="list-group">			
                <li class="list-group-item"><?php echo $this->Html->link(__('Edit').' '.__('Servico'), array('action' => 'edit', $servico['Servico']['id']), array('class' => '')); ?> </li>
                <li class="list-group-item"><?php echo $this->Form->postLink(__('Delete').' '.__('Servico'), array('action' => 'delete', $servico['Servico']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $servico['Servico']['id'])); ?> </li>
                <li class="list-group-item"><?php echo $this->Html->link(__('List').' '.__('Servicos'), array('action' => 'index'), array('class' => '')); ?> </li>
                <li class="list-group-item"><?php echo $this->Html->link(__('New').' '.__('Servico'), array('action' => 'add'), array('class' => '')); ?> </li>
                <li class="list-group-item"><?php echo $this->Html->link(__('List').' '.__('Checklists'), array('controller' => 'checklists', 'action' => 'index'), array('class' => '')); ?> </li>
                <li class="list-group-item"><?php echo $this->Html->link(__('New').' '.__('Checklist'), array('controller' => 'checklists', 'action' => 'add'), array('class' => '')); ?> </li>
                <li class="list-group-item"><?php echo $this->Html->link(__('List').' '.__('Historicos'), array('controller' => 'historicos', 'action' => 'index'), array('class' => '')); ?> </li>
                <li class="list-group-item"><?php echo $this->Html->link(__('New').' '.__('Historico'), array('controller' => 'historicos', 'action' => 'add'), array('class' => '')); ?> </li>

            </ul><!-- /.list-group -->

        </div><!-- /.actions -->

    </div><!-- /#sidebar .span3 -->

    <div id="page-content" class="col-sm-9">

        <div class="servicos view">

            <h2><?php  echo __('Servico'); ?></h2>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>		<td><strong><?php echo __('Id'); ?></strong></td>
                            <td>
			<?php echo h($servico['Servico']['id']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Nome'); ?></strong></td>
                            <td>
			<?php echo h($servico['Servico']['nome']); ?>
                                &nbsp;
                            </td>
                        </tr>					</tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

        </div><!-- /.view -->


        <div class="related">

            <h3><?php echo __('Checklists'); ?></h3>

				<?php if (!empty($servico['Checklist'])): ?>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th><?php echo __('Id'); ?></th>
                            <th><?php echo __('Nome'); ?></th>
                            <th><?php echo __('Tipo'); ?></th>
                            <th class="actions"><?php echo __('Actions'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
									<?php
										$i = 0;
										foreach ($servico['Checklist'] as $checklist): ?>
                        <tr>
                            <td><?php echo $checklist['id']; ?></td>
                            <td><?php echo $checklist['nome']; ?></td>
                            <td><?php echo $checklist['tipo']; ?></td>
                            <td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'checklists', 'action' => 'view', $checklist['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'checklists', 'action' => 'edit', $checklist['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'checklists', 'action' => 'delete', $checklist['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $checklist['id'])); ?>
                            </td>
                        </tr>
	<?php endforeach; ?>
                    </tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

				<?php endif; ?>


            <div class="actions">
					<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('New').' '.__('Checklist'), array('controller' => 'checklists', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- /.actions -->

        </div><!-- /.related -->


        <div class="related">

            <h3><?php echo __('Historicos'); ?></h3>

				<?php if (!empty($servico['Historico'])): ?>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th><?php echo __('Id'); ?></th>
                            <th><?php echo __('Chamado Id'); ?></th>
                            <th><?php echo __('User Id'); ?></th>
                            <th><?php echo __('Datainicial'); ?></th>
                            <th><?php echo __('Datafinal'); ?></th>
                            <th><?php echo __('Descricao'); ?></th>
                            <th><?php echo __('Checklist Id'); ?></th>
                            <th class="actions"><?php echo __('Actions'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
									<?php
										$i = 0;
										foreach ($servico['Historico'] as $historico): ?>
                        <tr>
                            <td><?php echo $historico['id']; ?></td>
                            <td><?php echo $historico['chamado_id']; ?></td>
                            <td><?php echo $historico['user_id']; ?></td>
                            <td><?php echo $historico['datainicial']; ?></td>
                            <td><?php echo $historico['datafinal']; ?></td>
                            <td><?php echo $historico['descricao']; ?></td>
                            <td><?php echo $historico['checklist_id']; ?></td>
                            <td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'historicos', 'action' => 'view', $historico['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'historicos', 'action' => 'edit', $historico['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'historicos', 'action' => 'delete', $historico['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $historico['id'])); ?>
                            </td>
                        </tr>
	<?php endforeach; ?>
                    </tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

				<?php endif; ?>


            <div class="actions">
					<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('New').' '.__('Historico'), array('controller' => 'historicos', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- /.actions -->

        </div><!-- /.related -->


    </div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
