<div class="panel panel-default">
	<div class="panel-heading">
		<h3>
			<span class="fa fa-ambulance"></span> 

			<?php echo (!empty($chamado['Chamado']['os_numero'])) ? __('View').' '.__('Chamado') ." <i class='fa fa-angle-double-right' ></i> ".__('OS').' ['.$chamado['Chamado']['os_numero'].']' : __('View').' '.__('Chamado') ; ?>               
			<div class="btn-group pull-right">
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
					<?php echo __('Actions');?><span class="caret"></span>
				</button>
				<ul class="dropdown-menu" role="menu">
					<?php 
					$user = $this->Session->read('Auth.User');
					if ((strtolower($user['role']) == 'root') || (strtolower($user['role']) == 'admin')) { ?>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkEdit(__('Chamado'), array($chamado['Chamado']['id'])); ?> </li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkDelete(__('Chamado'), array($chamado['Chamado']['id'])); ?> </li>
					<?php } ?>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkIndex(__('Chamados')); ?> </li>
					<li class="list-group-item"><?php echo $this->CustomHtml->linkAdd(__('Chamado')); ?> </li>
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
						<?php echo h($chamado[ 'Chamado'][ 'id']); ?> &nbsp;
					</td>
				</tr>
				<tr>
					<td><strong><?php echo __('Tipo'); ?></strong>
					</td>
					<td>
						<?php echo $this->Html->link($chamado['Tipo']['nome'], array('controller' => 'tipos', 'action' => 'view', $chamado['Tipo']['id']), array('class' => '')); ?> &nbsp;
					</td>
				</tr>
				<tr>
					<td><strong><?php echo __('Descricao'); ?></strong>
					</td>
					<td>
						<?php echo h($chamado[ 'Chamado'][ 'descricao']); ?> &nbsp;
					</td>
				</tr>
				<tr>
					<td><strong><?php echo __('Contato'); ?></strong>
					</td>
					<td>
						<?php echo h($chamado[ 'Chamado'][ 'contato']); ?> &nbsp;
					</td>
				</tr>
				<tr>
					<td><strong><?php echo __('Cliente'); ?></strong>
					</td>
					<td>
						<?php echo $this->Html->link($chamado['Cliente']['fantasia'], array('controller' => 'clientes', 'action' => 'view', $chamado['Cliente']['id']), array('class' => '')); ?> &nbsp;
					</td>
				</tr>
				<tr>
					<td><strong><?php echo __('Prioridade'); ?></strong>
					</td>
					<td>
						<?php echo $this->Html->link($chamado['Prioridade']['nome'], array('controller' => 'subgrupos', 'action' => 'view', $chamado['Prioridade']['id']), array('class' => '')); ?> &nbsp;
					</td>
				</tr>
				<tr>
					<td><strong><?php echo __('Problema'); ?></strong>
					</td>
					<td>
						<?php echo $this->Html->link($chamado['Problema']['nome'], array('controller' => 'problemas', 'action' => 'view', $chamado['Problema']['id']), array('class' => '')); ?> &nbsp;
					</td>
				</tr>
				<tr>
					<td><strong><?php echo __('Situacao'); ?></strong>
					</td>
					<td>
						<?php echo $this->Html->link($chamado['Situacao']['nome'], array('controller' => 'situacaos', 'action' => 'view', $chamado['Situacao']['id']), array('class' => '')); ?> &nbsp;
					</td>
				</tr>
				<tr>
					<td><strong><?php echo __('User'); ?></strong>
					</td>
					<td>
						<?php echo $this->Html->link($chamado['User']['nickname'], array('controller' => 'users', 'action' => 'view', $chamado['User']['id']), array('class' => '')); ?> &nbsp;
					</td>
				</tr>
				<tr>
					<td><strong><?php echo __('Previsaoexecucao'); ?></strong>
					</td>
					<td>
						<?php echo $this->Time->i18nFormat($chamado['Chamado']['previsaoexecucao'], $this->Html->__getDateTimeFormatView()); ?> &nbsp;
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="panel-footer">

		<h3>
			<span class="fa fa-history"></span> <?php echo __('Historicos'); ?>               
			<div class="btn-group pull-right">
				<?php echo $this->CustomHtml->linkAdd(__('Historico'), array('controller' => 'historicos', $chamado['Chamado']['id']), array('class' => 'btn btn-primary')); ?>
			</div>
		</h3>

		<?php if (!empty($chamado['Historico'])): ?>

			
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
						<td><?php echo $this->Html->link($historico['User']['nickname'], array('controller' => 'users', 'action' => 'view', $historico['user_id']), array('class' => '')); ?></td>
						<td><?php echo $this->Time->i18nFormat($historico['datainicial'], $this->Html->__getDateTimeFormatView()); ?>&nbsp;</td>
						<td><?php echo $this->Time->i18nFormat($historico['datafinal'], $this->Html->__getDateTimeFormatView()); ?>&nbsp;</td>
						<td><?php echo $historico['descricao']; ?></td>
						<td><?php if (isset($historico['Checklist']['nome'])) echo $this->Html->link($historico['Checklist']['nome'], array('controller' => 'checklists', 'action' => 'view', $historico['checklist_id']), array('class' => '')); ?></td>
						<td class="actions">
							<?php echo $this->CustomHtml->linkView(null, array('controller' => 'historicos', $historico['id']), array('class' => 'btn btn-default btn-xs')); ?>
							<?php 
							$user = $this->Session->read('Auth.User');
							if ((strtolower($user['role']) == 'root') || (strtolower($user['role']) == 'admin')) { ?>
							<?php echo $this->CustomHtml->linkEdit(null, array('controller' => 'historicos', $historico['id']), array('class' => 'btn btn-default btn-xs')); ?>
							<?php echo $this->CustomHtml->linkDelete(null, array('controller' => 'historicos', $historico['id']), array('class' => 'btn btn-default btn-xs')); ?>
							<?php } ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	<?php endif; ?>	
</div>
</div>
