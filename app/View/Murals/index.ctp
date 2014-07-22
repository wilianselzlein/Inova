
<div id="page-container" class="row">

    <div id="sidebar" class="col-sm-3">

        <div class="actions">

            <ul class="list-group">
                <li class="list-group-item"><?php echo $this->Html->link(__('New') . ' ' . __('Mural'), array('action' => 'add'), array('class' => '')); ?></li>
                <li class="list-group-item"><?php echo $this->Html->link(__('List') . ' ' . __('Users'), array('controller' => 'users', 'action' => 'index'), array('class' => '')); ?></li> 
                <li class="list-group-item"><?php echo $this->Html->link(__('New') . ' ' . __('User'), array('controller' => 'users', 'action' => 'add'), array('class' => '')); ?></li> 
            </ul><!-- /.list-group -->

        </div><!-- /.actions -->

    </div><!-- /#sidebar .col-sm-3 -->

    <div id="page-content" class="col-sm-9">

        <div class="murals index">

            <h2><?php echo __('Murals'); ?></h2>
            <?php echo $this->element('filtros'); ?>
            <div class="table-responsive">
                <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th><?php echo $this->Paginator->sort('id'); ?></th>
                            <th><?php echo $this->Paginator->sort('data'); ?></th>
                            <th><?php echo $this->Paginator->sort('cadastradopor_id', __('MessageFrom')); ?></th>
                            <th><?php echo $this->Paginator->sort('user_id', __('MessageTo')); ?></th>
                            <th><?php echo $this->Paginator->sort('recado'); ?></th>
                            <th><?php echo $this->Paginator->sort('resposta'); ?></th>
                            <th><?php echo $this->Paginator->sort('lido'); ?></th>
                            <th class="actions"><?php echo __('Actions'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($murals as $mural): ?>
                            <tr>
                                <td><?php echo h($mural['Mural']['id']); ?>&nbsp;</td>
                                <td>
                                    <?php echo $this->Time->i18nFormat($mural['Mural']['data'], $this->Html->__getDateTimeFormatView()); ?>&nbsp;                                    
                                </td>
                                <td>
                                    <?php 
                                    echo $this->Html->link($this->Mural->check_friendly_username_message($mural['UserFrom']['username']), array('controller' => 'users', 'action' => 'view', $mural['UserFrom']['id'])); ?>
                                </td>
                                <td>
                                    <?php echo $this->Html->link($this->Mural->check_friendly_username_message($mural['User']['username']), array('controller' => 'users', 'action' => 'view', $mural['User']['id'])); ?>
                                </td>
                                <td><?php echo h($mural['Mural']['recado']); ?>&nbsp;</td>
                                <td><?php echo h($mural['Mural']['resposta']); ?>&nbsp;</td>
                                <td><span class="<?php echo ($mural['Mural']['lido'] == true ? 'glyphicon glyphicon-check' : 'glyphicon glyphicon-unchecked'); ?>"></span> &nbsp;</td> 
                                
                                <td class="actions">
                                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $mural['Mural']['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $mural['Mural']['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $mural['Mural']['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $mural['Mural']['id'])); ?>
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