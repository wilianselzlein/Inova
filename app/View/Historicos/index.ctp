
<div id="page-container" class="row">

    <div id="sidebar" class="col-sm-3">

        <div class="actions">

            <ul class="list-group">
                <li class="list-group-item"><?php echo $this->Html->link(__('New') . ' ' . __('Historico'), array('action' => 'add'), array('class' => '')); ?></li>
                <li class="list-group-item"><?php echo $this->Html->link(__('List') . ' ' . __('Chamados'), array('controller' => 'chamados', 'action' => 'index'), array('class' => '')); ?></li> 
                <li class="list-group-item"><?php echo $this->Html->link(__('New') . ' ' . __('Chamado'), array('controller' => 'chamados', 'action' => 'add'), array('class' => '')); ?></li> 
                <li class="list-group-item"><?php echo $this->Html->link(__('List') . ' ' . __('Users'), array('controller' => 'users', 'action' => 'index'), array('class' => '')); ?></li> 
                <li class="list-group-item"><?php echo $this->Html->link(__('New') . ' ' . __('User'), array('controller' => 'users', 'action' => 'add'), array('class' => '')); ?></li> 
                <li class="list-group-item"><?php echo $this->Html->link(__('List') . ' ' . __('Checklists'), array('controller' => 'checklists', 'action' => 'index'), array('class' => '')); ?></li> 
                <li class="list-group-item"><?php echo $this->Html->link(__('New') . ' ' . __('Checklist'), array('controller' => 'checklists', 'action' => 'add'), array('class' => '')); ?></li> 
                <li class="list-group-item"><?php echo $this->Html->link(__('List') . ' ' . __('Servicos'), array('controller' => 'servicos', 'action' => 'index'), array('class' => '')); ?></li> 
                <li class="list-group-item"><?php echo $this->Html->link(__('New') . ' ' . __('Servico'), array('controller' => 'servicos', 'action' => 'add'), array('class' => '')); ?></li> 
            </ul><!-- /.list-group -->

        </div><!-- /.actions -->

    </div><!-- /#sidebar .col-sm-3 -->

    <div id="page-content" class="col-sm-9">

        <div class="historicos index">

            <h2><?php echo __('Historicos'); ?></h2>

            <div class="table-responsive">
                <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th><?php echo $this->Paginator->sort('id'); ?></th>
                            <th><?php echo $this->Paginator->sort('chamado_id'); ?></th>
                            <th><?php echo $this->Paginator->sort('user_id'); ?></th>
                            <th><?php echo $this->Paginator->sort('datainicial'); ?></th>
                            <th><?php echo $this->Paginator->sort('datafinal'); ?></th>
                            <th><?php echo $this->Paginator->sort('descricao'); ?></th>
                            <th><?php echo $this->Paginator->sort('checklist_id'); ?></th>
                            <th class="actions"><?php echo __('Actions'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($historicos as $historico): ?>
                            <tr>
                                <td><?php echo h($historico['Historico']['id']); ?>&nbsp;</td>
                                <td>
                                    <?php echo $this->Html->link($historico['Chamado']['descricao'], array('controller' => 'chamados', 'action' => 'view', $historico['Chamado']['id'])); ?>
                                </td>
                                <td>
                                    <?php echo $this->Html->link($historico['User']['username'], array('controller' => 'users', 'action' => 'view', $historico['User']['id'])); ?>
                                </td>
                                <td><?php echo $this->Time->i18nFormat($historico['Historico']['datainicial'], $this->Html->__getDateTimeFormatView()); ?>&nbsp;</td>
                                <td><?php echo $this->Time->i18nFormat($historico['Historico']['datafinal'], $this->Html->__getDateTimeFormatView());?></td>
                                <td><?php echo h($historico['Historico']['descricao']); ?>&nbsp;</td>
                                <td>
    <?php echo $this->Html->link($historico['Checklist']['nome'], array('controller' => 'checklists', 'action' => 'view', $historico['Checklist']['id'])); ?>
                                </td>
                                <td class="actions">
                                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $historico['Historico']['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $historico['Historico']['id']), array('class' => 'btn btn-default btn-xs')); ?>
    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $historico['Historico']['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $historico['Historico']['id'])); ?>
                                </td>
                            </tr>
<?php endforeach; ?>
                    </tbody>
                </table>
            </div><!-- /.table-responsive -->

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

        </div><!-- /.index -->

    </div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->