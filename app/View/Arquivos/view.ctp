
<div id="page-container" class="row">

    <div id="sidebar" class="col-sm-3">

        <div class="actions">

            <ul class="list-group">			
                <li class="list-group-item"><?php echo $this->Html->link(__('Edit') . ' ' . __('Arquivo'), array('action' => 'edit', $arquivo['Arquivo']['id']), array('class' => '')); ?> </li>
                <li class="list-group-item"><?php echo $this->Form->postLink(__('Delete') . ' ' . __('Arquivo'), array('action' => 'delete', $arquivo['Arquivo']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $arquivo['Arquivo']['id'])); ?> </li>
                <li class="list-group-item"><?php echo $this->Html->link(__('List') . ' ' . __('Arquivos'), array('action' => 'index'), array('class' => '')); ?> </li>
                <li class="list-group-item"><?php echo $this->Html->link(__('New') . ' ' . __('Arquivo'), array('action' => 'add'), array('class' => '')); ?> </li>
                <li class="list-group-item"><?php echo $this->Html->link(__('List') . ' ' . __('Users'), array('controller' => 'users', 'action' => 'index'), array('class' => '')); ?> </li>
                <li class="list-group-item"><?php echo $this->Html->link(__('New') . ' ' . __('User'), array('controller' => 'users', 'action' => 'add'), array('class' => '')); ?> </li>

            </ul><!-- /.list-group -->

        </div><!-- /.actions -->

    </div><!-- /#sidebar .span3 -->

    <div id="page-content" class="col-sm-9">

        <div class="arquivos view">

            <h2><?php echo __('Arquivo'); ?></h2>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>		<td><strong><?php echo __('Id'); ?></strong></td>
                            <td>
                                <?php echo h($arquivo['Arquivo']['id']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		
                            <td><strong><?php echo __('Data'); ?></strong></td>
                            <td>
                                <?php echo $this->Time->i18nFormat($arquivo['Arquivo']['datahora'], $this->Html->__getDateTimeFormatView()); ?>&nbsp;
                            </td>
                        </tr>
                        <tr>		
                            <td><strong><?php echo __('Cliente'); ?></strong></td>
                            <td>
                                <?php echo $this->Html->link($arquivo['Cliente']['fantasia'], array('controller' => 'clientes', 'action' => 'view', $arquivo['Cliente']['id']), array('class' => '')); ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>		
                            <td><strong><?php echo __('Usuario'); ?></strong></td>
                            <td>
                                <?php echo $this->Html->link($arquivo['User']['username'], array('controller' => 'users', 'action' => 'view', $arquivo['User']['id']), array('class' => '')); ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>		<td><strong><?php echo __('Caminho'); ?></strong></td>
                            <td>
                                <?php echo h($arquivo['Arquivo']['caminho']); ?>
                                &nbsp;
                            </td>
                        </tr>		
                        <tr>		<td><strong><?php echo __('Descriçao'); ?></strong></td>
                            <td>
                                <?php echo h($arquivo['Arquivo']['descricao']); ?>
                                &nbsp;
                            </td>
                        </tr>
                </tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

        </div><!-- /.view -->


    </div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
