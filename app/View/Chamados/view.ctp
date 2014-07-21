
<div id="page-container" class="row">

    <div id="sidebar" class="col-sm-3">

        <div class="actions">

            <ul class="list-group">			
                <?php 
				   $user = $this->Session->read('Auth.User');
				   if ((strtolower($user['role']) == 'root') || (strtolower($user['role']) == 'admin')) { ?>
                <li class="list-group-item"><?php echo $this->Html->link(__('Edit') . ' ' . __('Chamado'), array('action' => 'edit', $chamado['Chamado']['id']), array('class' => '')); ?> </li>
                <li class="list-group-item"><?php echo $this->Form->postLink(__('Delete') . ' ' . __('Chamado'), array('action' => 'delete', $chamado['Chamado']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $chamado['Chamado']['id'])); ?> </li>
                <?php } ?>
                <li class="list-group-item"><?php echo $this->Html->link(__('List') . ' ' . __('Chamados'), array('action' => 'index'), array('class' => '')); ?> </li>
                <li class="list-group-item"><?php echo $this->Html->link(__('New') . ' ' . __('Chamado'), array('action' => 'add'), array('class' => '')); ?> </li>
                <li class="list-group-item"><?php echo $this->Html->link(__('List') . ' ' . __('Tipos'), array('controller' => 'tipos', 'action' => 'index'), array('class' => '')); ?> </li>
                <li class="list-group-item"><?php echo $this->Html->link(__('New') . ' ' . __('Tipo'), array('controller' => 'tipos', 'action' => 'add'), array('class' => '')); ?> </li>
                <li class="list-group-item"><?php echo $this->Html->link(__('List') . ' ' . __('Clientes'), array('controller' => 'clientes', 'action' => 'index'), array('class' => '')); ?> </li>
                <li class="list-group-item"><?php echo $this->Html->link(__('New') . ' ' . __('Cliente'), array('controller' => 'clientes', 'action' => 'add'), array('class' => '')); ?> </li>
                <li class="list-group-item"><?php echo $this->Html->link(__('List') . ' ' . __('Problemas'), array('controller' => 'problemas', 'action' => 'index'), array('class' => '')); ?> </li>
                <li class="list-group-item"><?php echo $this->Html->link(__('New') . ' ' . __('Problema'), array('controller' => 'problemas', 'action' => 'add'), array('class' => '')); ?> </li>
                <li class="list-group-item"><?php echo $this->Html->link(__('List') . ' ' . __('Situacaos'), array('controller' => 'situacaos', 'action' => 'index'), array('class' => '')); ?> </li>
                <li class="list-group-item"><?php echo $this->Html->link(__('New') . ' ' . __('Situacao'), array('controller' => 'situacaos', 'action' => 'add'), array('class' => '')); ?> </li>
                <li class="list-group-item"><?php echo $this->Html->link(__('List') . ' ' . __('Historicos'), array('controller' => 'historicos', 'action' => 'index'), array('class' => '')); ?> </li>
                <li class="list-group-item"><?php echo $this->Html->link(__('New') . ' ' . __('Historico'), array('controller' => 'historicos', 'action' => 'add'), array('class' => '')); ?> </li>

            </ul><!-- /.list-group -->

        </div><!-- /.actions -->

    </div><!-- /#sidebar .span3 -->

    <div id="page-content" class="col-sm-9">

        <div class="chamados view">

            <h2><?php echo __('Chamado'); ?></h2>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>		<td><strong><?php echo __('Id'); ?></strong></td>
                            <td>
                                <?php echo h($chamado['Chamado']['id']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Tipo'); ?></strong></td>
                            <td>
                                <?php echo $this->Html->link($chamado['Tipo']['nome'], array('controller' => 'tipos', 'action' => 'view', $chamado['Tipo']['id']), array('class' => '')); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Descricao'); ?></strong></td>
                            <td>
                                <?php echo h($chamado['Chamado']['descricao']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Contato'); ?></strong></td>
                            <td>
                                <?php echo h($chamado['Chamado']['contato']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Cliente'); ?></strong></td>
                            <td>
                                <?php echo $this->Html->link($chamado['Cliente']['razaosocial'], array('controller' => 'clientes', 'action' => 'view', $chamado['Cliente']['id']), array('class' => '')); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Prioridade'); ?></strong></td>
                            <td>
                                <?php echo $this->Html->link($chamado['Prioridade']['nome'], array('controller' => 'subgrupos', 'action' => 'view', $chamado['Prioridade']['id']), array('class' => '')); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Problema'); ?></strong></td>
                            <td>
                                <?php echo $this->Html->link($chamado['Problema']['nome'], array('controller' => 'problemas', 'action' => 'view', $chamado['Problema']['id']), array('class' => '')); ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>		
                            <td><strong><?php echo __('Situacao'); ?></strong></td>
                            <td>
                                <?php echo $this->Html->link($chamado['Situacao']['nome'], array('controller' => 'situacaos', 'action' => 'view', $chamado['Situacao']['id']), array('class' => '')); ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>		
                            <td><strong><?php echo __('User'); ?></strong></td>
                            <td>
                                <?php echo $this->Html->link($chamado['User']['username'], array('controller' => 'users', 'action' => 'view', $chamado['User']['id']), array('class' => '')); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Previsaoexecucao'); ?></strong></td>
                            <td>
                                <?php echo $this->Time->i18nFormat($chamado['Chamado']['previsaoexecucao'], $this->Html->__getDateTimeFormatView());  ?>
                                &nbsp;
                            </td>
                        </tr>	</tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

        </div><!-- /.view -->


        <div class="related">

            <h3><?php echo __('Historicos'); ?></h3>

            <?php if (!empty($chamado['Historico'])): ?>

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
                            foreach ($chamado['Historico'] as $historico):
                                ?>
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
                                        <?php 
										   $user = $this->Session->read('Auth.User');
										   if ((strtolower($user['role']) == 'root') || (strtolower($user['role']) == 'admin')) { ?>
                                            <?php echo $this->Html->link(__('Edit'), array('controller' => 'historicos', 'action' => 'edit', $historico['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                            <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'historicos', 'action' => 'delete', $historico['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $historico['id'])); ?>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table><!-- /.table table-striped table-bordered -->
                </div><!-- /.table-responsive -->

            <?php endif; ?>


            <div class="actions">
                <?php echo $this->Html->link('<i class="icon-plus icon-white"></i> ' . __('New') . ' ' . __('Historico'), array('controller' => 'historicos', 'action' => 'add', $chamado['Chamado']['id']), array('class' => 'btn btn-primary', 'escape' => false)); ?>
            </div><!-- /.actions -->

        </div><!-- /.related -->


    </div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
