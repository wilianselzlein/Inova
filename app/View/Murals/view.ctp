
<div id="page-container" class="row">

    <div id="sidebar" class="col-sm-3">

        <div class="actions">

            <ul class="list-group">			
                <li class="list-group-item"><?php echo $this->Html->link(__('Edit') . ' ' . __('Mural'), array('action' => 'edit', $mural['Mural']['id']), array('class' => '')); ?> </li>
                <li class="list-group-item"><?php echo $this->Form->postLink(__('Delete') . ' ' . __('Mural'), array('action' => 'delete', $mural['Mural']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $mural['Mural']['id'])); ?> </li>
                <li class="list-group-item"><?php echo $this->Html->link(__('List') . ' ' . __('Murals'), array('action' => 'index'), array('class' => '')); ?> </li>
                <li class="list-group-item"><?php echo $this->Html->link(__('New') . ' ' . __('Mural'), array('action' => 'add'), array('class' => '')); ?> </li>
                <li class="list-group-item"><?php echo $this->Html->link(__('List') . ' ' . __('Users'), array('controller' => 'users', 'action' => 'index'), array('class' => '')); ?> </li>
                <li class="list-group-item"><?php echo $this->Html->link(__('New') . ' ' . __('User'), array('controller' => 'users', 'action' => 'add'), array('class' => '')); ?> </li>

            </ul><!-- /.list-group -->

        </div><!-- /.actions -->

    </div><!-- /#sidebar .span3 -->

    <div id="page-content" class="col-sm-9">

        <div class="murals view">

            <h2><?php echo __('Mural'); ?></h2>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>		<td><strong><?php echo __('Id'); ?></strong></td>
                            <td>
                                <?php echo h($mural['Mural']['id']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Data'); ?></strong></td>
                            <td>
                                <?php echo $this->Time->i18nFormat($mural['Mural']['data'], $this->Html->__getDateTimeFormatView()); ?>&nbsp;
                            </td>
                        </tr>
                        <tr>		
                            <td><strong><?php echo __('MessageFrom'); ?></strong></td>
                            <td>
                                <?php echo $this->Html->link($this->Mural->check_friendly_username_message($mural['UserFrom']['username']), array('controller' => 'users', 'action' => 'view', $mural['User']['id']), array('class' => '')); ?>                                &nbsp;
                            </td>
                        </tr>
                        <tr>		
                            <td><strong><?php echo __('MessageTo'); ?></strong></td>
                            <td>
                                <?php echo $this->Html->link($this->Mural->check_friendly_username_message($mural['User']['username']), array('controller' => 'users', 'action' => 'view', $mural['User']['id']), array('class' => '')); ?>                                &nbsp;
                            </td>
                        </tr>
                        <tr>		<td><strong><?php echo __('Recado'); ?></strong></td>
                            <td>
                                <?php echo h($mural['Mural']['recado']); ?>
                                &nbsp;
                            </td>
                        </tr>					</tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

        </div><!-- /.view -->


    </div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
