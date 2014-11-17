
<div id="page-container" class="row">

    <div id="sidebar" class="col-sm-3">

        <div class="actions">

            <ul class="list-group">
                <li class="list-group-item"><?php echo $this->Html->link(__('New') . ' ' . __('Arquivo'), array('action' => 'add'), array('class' => '')); ?></li>
                <li class="list-group-item"><?php echo $this->Html->link(__('List') . ' ' . __('Users'), array('controller' => 'users', 'action' => 'index'), array('class' => '')); ?></li> 
                <li class="list-group-item"><?php echo $this->Html->link(__('New') . ' ' . __('User'), array('controller' => 'users', 'action' => 'add'), array('class' => '')); ?></li> 
            </ul><!-- /.list-group -->

        </div><!-- /.actions -->

    </div><!-- /#sidebar .col-sm-3 -->

    <div id="page-content" class="col-sm-9">

        <div class="arquivos index">

            <h2><?php echo __('Arquivos'); ?></h2>
            <?php echo $this->element('filtros'); ?>
            <div class="table-responsive">
                <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th><?php echo $this->Paginator->sort('id'); ?></th>
                            <th><?php echo $this->Paginator->sort('datahora'); ?></th>
                            <th><?php echo $this->Paginator->sort('cliente_id'); ?></th>
                            <th><?php echo $this->Paginator->sort('user_id'); ?></th>
                            <th><?php echo $this->Paginator->sort('caminho'); ?></th>
                            <th><?php echo $this->Paginator->sort('descricao'); ?></th>
                            <th class="actions"><?php echo __('Actions'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($arquivos as $arquivo): ?>
                            <tr>
                                <td><?php echo h($arquivo['Arquivo']['id']); ?>&nbsp;</td>
                                <td>
                                    <?php echo $this->Time->i18nFormat($arquivo['Arquivo']['datahora'], $this->Html->__getDateTimeFormatView()); ?>&nbsp;
                                </td>
                                <td>
                                    <?php echo $this->Html->link($arquivo['Cliente']['fantasia'], array('controller' => 'clientes', 'action' => 'view', $arquivo['Cliente']['id'])); ?>
                                </td>
                                <td>
                                    <?php echo $this->Html->link($arquivo['User']['username'], array('controller' => 'users', 'action' => 'view', $arquivo['User']['id'])); ?>
                                </td>
                                <td><?php echo h($arquivo['Arquivo']['caminho']); ?>&nbsp;</td>
                                <td><?php echo h($arquivo['Arquivo']['descricao']); ?>&nbsp;</td>
                                
                                <td class="actions">
                                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $arquivo['Arquivo']['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $arquivo['Arquivo']['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $arquivo['Arquivo']['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $arquivo['Arquivo']['id'])); ?>
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