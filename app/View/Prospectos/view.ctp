<div class="panel panel-default">
	<div class="panel-heading">
		<h3>
			<span class="fa fa-odnoklassniki"></span> <?php echo __('View').' '.__('Prospecto'); ?>               
			<div class="btn-group pull-right">
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
					<?php echo __('Actions');?><span class="caret"></span>
				</button>
				<ul class="dropdown-menu" role="menu">				
					<li class="list-group-item"><?php echo $this->CustomHtml->linkEdit(__('Prospecto'), array($prospecto['Prospecto']['id'])); ?></li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkDelete(__('Prospecto'), array($prospecto['Prospecto']['id'])); ?></li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkIndex(__('Prospectos')); ?></li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkAdd(__('Prospecto')); ?></li>				
				</ul>
			</div>
		</h3>
	</div>

	<div class="panel-body"> 
		<table class="table table-striped table-bordered">
			<tbody>
				<tr>
					<td><strong><?php echo __('Id'); ?></strong>
					</td>
					<td>
						<?php echo h($prospecto[ 'Prospecto'][ 'id']); ?> &nbsp;
					</td>
				</tr>
				<tr>
					<td><strong><?php echo __('Fantasia'); ?></strong>
					</td>
					<td>
						<?php echo h($prospecto[ 'Prospecto'][ 'fantasia']); ?> &nbsp;
					</td>
				</tr>
				<tr>
					<td><strong><?php echo __('Razaosocial'); ?></strong>
					</td>
					<td>
						<?php echo h($prospecto[ 'Prospecto'][ 'razaosocial']); ?> &nbsp;
					</td>
				</tr>
				<tr>
					<td><strong><?php echo __('Cpfcnpj'); ?></strong>
					</td>
					<td>
						<?php echo h($prospecto[ 'Prospecto'][ 'cpfcnpj']); ?> &nbsp;
					</td>
				</tr>
				<tr>
					<td><strong><?php echo __('Cidade'); ?></strong>
					</td>
					<td>
						<?php echo $this->Html->link($prospecto['Cidade']['nome'], array('controller' => 'cidades', 'action' => 'view', $prospecto['Cidade']['id']), array('class' => '')); ?> &nbsp;
					</td>
				</tr>
				<tr>
					<td><strong><?php echo __('Endereco'); ?></strong>
					</td>
					<td>
						<?php echo h($prospecto[ 'Prospecto'][ 'endereco']); ?> &nbsp;
					</td>
				</tr>
				<tr>
					<td><strong><?php echo __('Numero'); ?></strong>
					</td>
					<td>
						<?php echo h($prospecto[ 'Prospecto'][ 'numero']); ?> &nbsp;
					</td>
				</tr>
				<tr>
					<td><strong><?php echo __('Bairro'); ?></strong>
					</td>
					<td>
						<?php echo h($prospecto[ 'Prospecto'][ 'bairro']); ?> &nbsp;
					</td>
				</tr>
				<tr>
					<td><strong><?php echo __('Complemento'); ?></strong>
					</td>
					<td>
						<?php echo h($prospecto[ 'Prospecto'][ 'complemento']); ?> &nbsp;
					</td>
				</tr>
				<tr>
					<td><strong><?php echo __('Contato'); ?></strong>
					</td>
					<td>
						<?php echo h($prospecto[ 'Prospecto'][ 'contato']); ?> &nbsp;
					</td>
				</tr>
				<tr>
					<td><strong><?php echo __('Obs'); ?></strong>
					</td>
					<td>
						<?php echo h($prospecto[ 'Prospecto'][ 'obs']); ?> &nbsp;
					</td>
				</tr>
				<tr>
					<td><strong><?php echo __('User'); ?></strong>
					</td>
					<td>
						<?php echo $this->Html->link($prospecto['User']['username'], array('controller' => 'users', 'action' => 'view', $prospecto['User']['id']), array('class' => '')); ?> &nbsp;
					</td>
				</tr>
				<tr>
					<td><strong><?php echo __('Telefone'); ?></strong>
					</td>
					<td>
						<?php echo h($prospecto[ 'Prospecto'][ 'telefone']); ?> &nbsp;
					</td>
				</tr>
				<tr>
					<td><strong><?php echo __('Telefone2'); ?></strong>
					</td>
					<td>
						<?php echo h($prospecto[ 'Prospecto'][ 'telefone2']); ?> &nbsp;
					</td>
				</tr>
				<tr>
					<td><strong><?php echo __('Celular'); ?></strong>
					</td>
					<td>
						<?php echo h($prospecto[ 'Prospecto'][ 'celular']); ?> &nbsp;
					</td>
				</tr>
				<tr>
					<td><strong><?php echo __('Email'); ?></strong>
					</td>
					<td>
						<?php echo h($prospecto[ 'Prospecto'][ 'email']); ?> &nbsp;
					</td>
				</tr>
				<tr>
					<td><strong><?php echo __('Cep'); ?></strong>
					</td>
					<td>
						<?php echo h($prospecto[ 'Prospecto'][ 'cep']); ?> &nbsp;
					</td>
				</tr>
				<tr>
					<td><strong><?php echo __('Unidade'); ?></strong>
					</td>
					<td>
						<?php echo $this->Html->link($prospecto['Unidade']['nome'], array('controller' => 'unidades', 'action' => 'view', $prospecto['Unidade']['id']), array('class' => '')); ?> &nbsp;
					</td>
				</tr>
				<tr>
					<td><strong><?php echo __('Criado'); ?></strong>
					</td>
					<td>
						<?php echo $this->Time->i18nFormat($prospecto['Prospecto']['created'], $this->Html->__getDateTimeFormatView()); ?> &nbsp;
					</td>
				</tr>
				<tr>
					<td><strong><?php echo __('Modificado'); ?></strong>
					</td>
					<td>
						<?php echo $this->Time->i18nFormat($prospecto['Prospecto']['modified'], $this->Html->__getDateTimeFormatView()); ?> &nbsp;
					</td>
				</tr>
			</tbody>	
		</table>
	</div>
	<div class="panel-footer">
		<?php if (!empty($prospecto['Visita'])): ?>
			<h3><span class="fa fa-calendar"></span> <?php echo __('Visitas'); ?>   
				<div class="btn-group pull-right">
					<?php echo $this->Html->link('<i class="fa fa-plus"></i> '.__('New').' '.__('Visita'), array('controller' => 'visitas', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>
				</div>
			</h3>
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
								<?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('controller' => 'visitas', 'action' => 'view', $visita['id']), array('class' => 'btn btn-default btn-xs', 'title'=>__('View'), 'escape'=>false)); ?>
								<?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('controller' => 'visitas', 'action' => 'edit', $visita['id']), array('class' => 'btn btn-default btn-xs', 'title'=>__('Edit'), 'escape'=>false)); ?>
								<?php echo $this->Form->postLink('<i class="fa fa-times"></i>', array('controller' => 'visitas', 'action' => 'delete', $visita['id']), array('class' => 'btn btn-default btn-xs', 'title'=>__('Delete'), 'escape'=>false), __('Are you sure you want to delete # %s?', $visita['id'])); ?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table><!-- /.table table-striped table-bordered -->
		</div><!-- /.table-responsive -->
	<?php endif; ?>
</div><!-- /.related -->   
</div>