
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
			
			<ul class="list-group">			
                <li class="list-group-item"><?php echo $this->Html->link(__('Edit').' '.__('Prospecto'), array('action' => 'edit', $prospecto['Prospecto']['id']), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Form->postLink(__('Delete').' '.__('Prospecto'), array('action' => 'delete', $prospecto['Prospecto']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $prospecto['Prospecto']['id'])); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List').' '.__('Prospectos'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New').' '.__('Prospecto'), array('action' => 'add'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List').' '.__('Cidades'), array('controller' => 'cidades', 'action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New').' '.__('Cidade'), array('controller' => 'cidades', 'action' => 'add'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List').' '.__('Users'), array('controller' => 'users', 'action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New').' '.__('User'), array('controller' => 'users', 'action' => 'add'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List').' '.__('Unidades'), array('controller' => 'unidades', 'action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New').' '.__('Unidade'), array('controller' => 'unidades', 'action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- /.list-group -->
			
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .span3 -->
	
	<div id="page-content" class="col-sm-9">
		
		<div class="prospectos view">

			<h2><?php  echo __('Prospecto'); ?></h2>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($prospecto['Prospecto']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Fantasia'); ?></strong></td>
		<td>
			<?php echo h($prospecto['Prospecto']['fantasia']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Razaosocial'); ?></strong></td>
		<td>
			<?php echo h($prospecto['Prospecto']['razaosocial']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Cpfcnpj'); ?></strong></td>
		<td>
			<?php echo h($prospecto['Prospecto']['cpfcnpj']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Cidade'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($prospecto['Cidade']['nome'], array('controller' => 'cidades', 'action' => 'view', $prospecto['Cidade']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Endereco'); ?></strong></td>
		<td>
			<?php echo h($prospecto['Prospecto']['endereco']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Numero'); ?></strong></td>
		<td>
			<?php echo h($prospecto['Prospecto']['numero']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Bairro'); ?></strong></td>
		<td>
			<?php echo h($prospecto['Prospecto']['bairro']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Complemento'); ?></strong></td>
		<td>
			<?php echo h($prospecto['Prospecto']['complemento']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Contato'); ?></strong></td>
		<td>
			<?php echo h($prospecto['Prospecto']['contato']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Obs'); ?></strong></td>
		<td>
			<?php echo h($prospecto['Prospecto']['obs']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('User'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($prospecto['User']['username'], array('controller' => 'users', 'action' => 'view', $prospecto['User']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Telefone'); ?></strong></td>
		<td>
			<?php echo h($prospecto['Prospecto']['telefone']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Celular'); ?></strong></td>
		<td>
			<?php echo h($prospecto['Prospecto']['celular']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Email'); ?></strong></td>
		<td>
			<?php echo h($prospecto['Prospecto']['email']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Cep'); ?></strong></td>
		<td>
			<?php echo h($prospecto['Prospecto']['cep']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Unidade'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($prospecto['Unidade']['nome'], array('controller' => 'unidades', 'action' => 'view', $prospecto['Unidade']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Criado'); ?></strong></td>
		<td>
                        <?php echo $this->Time->i18nFormat($prospecto['Prospecto']['created'], $this->Html->__getDateTimeFormatView()); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Modificado'); ?></strong></td>
		<td>
                    <?php echo $this->Time->i18nFormat($prospecto['Prospecto']['modified'], $this->Html->__getDateTimeFormatView()); ?>
			&nbsp;
		</td>
</tr>					</tbody>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->
                <div class="related">
                    <?php if (!empty($prospecto['Visita'])): ?>
                        <h3><?php echo __('Visitas'); ?></h3>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th><?php echo __('Id'); ?></th>
                                        <th><?php echo __('Data'); ?></th>
                                        <th><?php echo __('Nova'); ?></th>
                                        <th><?php echo __('Descricao'); ?></th>
                                        <th class="actions"><?php echo __('Actions'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i = 0;
                                        foreach ($prospecto['Visita'] as $visita): ?>
                                        <tr>
                                            <td><?php echo $visita['id']; ?></td>
                                            <td><?php echo $this->Time->i18nFormat($visita['data'], $this->Html->__getDateTimeFormatView()); ?></td>
                                            <td><?php echo $this->Time->i18nFormat($visita['nova'], $this->Html->__getDateTimeFormatView()); ?></td>
                                            <td><?php echo $visita['detalhes']; ?></td>
                                            <td class="actions">
                                                <?php echo $this->Html->link(__('View'), array('controller' => 'visitas', 'action' => 'view', $visita['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                                <?php echo $this->Html->link(__('Edit'), array('controller' => 'visitas', 'action' => 'edit', $visita['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                                <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'visitas', 'action' => 'delete', $visita['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $visita['id'])); ?>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                </tbody>
                            </table><!-- /.table table-striped table-bordered -->
                        </div><!-- /.table-responsive -->
                        <div class="actions">
                            <?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('New').' '.__('Visita'), array('controller' => 'visitas', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>
                        </div><!-- /.actions -->
                    <?php endif; ?>
                </div><!-- /.related -->

	</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->