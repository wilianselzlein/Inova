
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
			
			<ul class="list-group">			
						<li class="list-group-item"><?php echo $this->Html->link(__('Edit').' '.__('User'), array('action' => 'edit', $user['User']['id']), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Form->postLink(__('Delete').' '.__('User'), array('action' => 'delete', $user['User']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List').' '.__('Users'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New').' '.__('User'), array('action' => 'add'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List').' '.__('Clientes'), array('controller' => 'clientes', 'action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New').' '.__('Cliente'), array('controller' => 'clientes', 'action' => 'add'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List').' '.__('Historicos'), array('controller' => 'historicos', 'action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New').' '.__('Historico'), array('controller' => 'historicos', 'action' => 'add'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List').' '.__('Murals'), array('controller' => 'murals', 'action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New').' '.__('Mural'), array('controller' => 'murals', 'action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- /.list-group -->
			
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .span3 -->
	
	<div id="page-content" class="col-sm-9">
		
		<div class="users view">

			<h2><?php  echo __('User'); ?></h2>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Username'); ?></strong></td>
		<td>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Role'); ?></strong></td>
		<td>
			<?php echo h($user['User']['role']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
		<td>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
		<td>
			<?php echo h($user['User']['modified']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Unidade'); ?></strong></td>
		<td>
                        <?php echo $this->Html->link($user['Unidade']['nome'], array('controller' => 'unidades', 'action' => 'view', $user['Unidade']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
                
</tr><tr>		<td><strong><?php echo __('Email'); ?></strong></td>
		<td>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Emailsup'); ?></strong></td>
		<td>
			<?php echo h($user['User']['emailsup']); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

					
			<div class="related">

				<h3><?php echo __('Clientes'); ?></h3>
				
				<?php if (!empty($user['Cliente'])): ?>
					
					<div class="table-responsive">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
											<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Fantasia'); ?></th>
		<th><?php echo __('Razaosocial'); ?></th>
		<th><?php echo __('Cpfcnpj'); ?></th>
		<th><?php echo __('Cidade Id'); ?></th>
		<th><?php echo __('Subgrupo Id'); ?></th>
		<th><?php echo __('Dtvenda'); ?></th>
		<th><?php echo __('Endereco'); ?></th>
		<th><?php echo __('Numero'); ?></th>
		<th><?php echo __('Bairro'); ?></th>
		<th><?php echo __('Complemento'); ?></th>
		<th><?php echo __('Ie'); ?></th>
		<th><?php echo __('Senha'); ?></th>
		<th><?php echo __('Dtinstalacao'); ?></th>
		<th><?php echo __('Contato'); ?></th>
		<th><?php echo __('Caixas'); ?></th>
		<th><?php echo __('Retaguardas'); ?></th>
		<th><?php echo __('Prioridade'); ?></th>
		<th><?php echo __('Mensalidade'); ?></th>
		<th><?php echo __('Valorvenda'); ?></th>
		<th><?php echo __('Estrutura'); ?></th>
		<th><?php echo __('Obs'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Telefone'); ?></th>
		<th><?php echo __('Celular'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Cep'); ?></th>
		<th><?php echo __('Unidade Id'); ?></th>
									<th class="actions"><?php echo __('Actions'); ?></th>
								</tr>
							</thead>
							<tbody>
									<?php
										$i = 0;
										foreach ($user['Cliente'] as $cliente): ?>
		<tr>
			<td><?php echo $cliente['id']; ?></td>
			<td><?php echo $cliente['fantasia']; ?></td>
			<td><?php echo $cliente['razaosocial']; ?></td>
			<td><?php echo $cliente['cpfcnpj']; ?></td>
			<td><?php echo $cliente['cidade_id']; ?></td>
			<td><?php echo $cliente['subgrupo_id']; ?></td>
			<td><?php echo $cliente['dtvenda']; ?></td>
			<td><?php echo $cliente['endereco']; ?></td>
			<td><?php echo $cliente['numero']; ?></td>
			<td><?php echo $cliente['bairro']; ?></td>
			<td><?php echo $cliente['complemento']; ?></td>
			<td><?php echo $cliente['ie']; ?></td>
			<td><?php echo $cliente['senha']; ?></td>
			<td><?php echo $cliente['dtinstalacao']; ?></td>
			<td><?php echo $cliente['contato']; ?></td>
			<td><?php echo $cliente['caixas']; ?></td>
			<td><?php echo $cliente['retaguardas']; ?></td>
			<td><?php echo $cliente['prioridade']; ?></td>
			<td><?php echo $cliente['mensalidade']; ?></td>
			<td><?php echo $cliente['valorvenda']; ?></td>
			<td><?php echo $cliente['estrutura']; ?></td>
			<td><?php echo $cliente['obs']; ?></td>
			<td><?php echo $cliente['user_id']; ?></td>
			<td><?php echo $cliente['telefone']; ?></td>
			<td><?php echo $cliente['celular']; ?></td>
			<td><?php echo $cliente['email']; ?></td>
			<td><?php echo $cliente['cep']; ?></td>
			<td><?php echo $cliente['unidade_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'clientes', 'action' => 'view', $cliente['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'clientes', 'action' => 'edit', $cliente['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'clientes', 'action' => 'delete', $cliente['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $cliente['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
							</tbody>
						</table><!-- /.table table-striped table-bordered -->
					</div><!-- /.table-responsive -->
					
				<?php endif; ?>

				
				<div class="actions">
					<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('New').' '.__('Cliente'), array('controller' => 'clientes', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- /.actions -->
				
			</div><!-- /.related -->

					
			<div class="related">

				<h3><?php echo __('Historicos'); ?></h3>
				
				<?php if (!empty($user['Historico'])): ?>
					
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
										foreach ($user['Historico'] as $historico): ?>
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

					
			<div class="related">

				<h3><?php echo __('Murals'); ?></h3>
				
				<?php if (!empty($user['Mural'])): ?>
					
					<div class="table-responsive">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
											<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Data'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Recado'); ?></th>
									<th class="actions"><?php echo __('Actions'); ?></th>
								</tr>
							</thead>
							<tbody>
									<?php
										$i = 0;
										foreach ($user['Mural'] as $mural): ?>
		<tr>
			<td><?php echo $mural['id']; ?></td>
			<td><?php echo $mural['data']; ?></td>
			<td><?php echo $mural['user_id']; ?></td>
			<td><?php echo $mural['recado']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'murals', 'action' => 'view', $mural['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'murals', 'action' => 'edit', $mural['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'murals', 'action' => 'delete', $mural['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $mural['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
							</tbody>
						</table><!-- /.table table-striped table-bordered -->
					</div><!-- /.table-responsive -->
					
				<?php endif; ?>

				
				<div class="actions">
					<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('New').' '.__('Mural'), array('controller' => 'murals', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- /.actions -->
				
			</div><!-- /.related -->

			<div class="related">

				<h3><?php echo __('Contadores'); ?></h3>
				
				<?php if (!empty($user['Contador'])): ?>
					
					<div class="table-responsive">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
                                                                        <th><?php echo __('Id'); ?></th>
                                                                        <th><?php echo __('Fantasia'); ?></th>
                                                                        <th><?php echo __('Razaosocial'); ?></th>
                                                                        <th><?php echo __('Endereco'); ?></th>
                                                                        <th><?php echo __('Numero'); ?></th>
                                                                        <th><?php echo __('Bairro'); ?></th>
                                                                        <th><?php echo __('Complemento'); ?></th>
                                                                        <th><?php echo __('Cep'); ?></th>
                                                                        <th><?php echo __('Cidade Id'); ?></th>
                                                                        <th><?php echo __('CRC'); ?></th>
                                                                        <th><?php echo __('Contato'); ?></th>
                                                                        <th><?php echo __('Telefone'); ?></th>
                                                                        <th><?php echo __('Celular'); ?></th>
                                                                        <th><?php echo __('Email'); ?></th>
                                                                        <th><?php echo __('Emailalt'); ?></th>
                                                                        <th><?php echo __('Obs'); ?></th>
		
									<th class="actions"><?php echo __('Actions'); ?></th>
								</tr>
							</thead>
							<tbody>
									<?php
										$i = 0;
										foreach ($user['Contador'] as $contador): ?>
		<tr>
			<td><?php echo $contador['id']; ?></td>
			<td><?php echo $contador['fantasia']; ?></td>
			<td><?php echo $contador['razaosocial']; ?></td>
			<td><?php echo $contador['endereco']; ?></td>
			<td><?php echo $contador['numero']; ?></td>
			<td><?php echo $contador['bairro']; ?></td>
			<td><?php echo $contador['complemento']; ?></td>
			<td><?php echo $contador['cep']; ?></td>
			<td><?php echo $contador['cidade_id']; ?></td>
			<td><?php echo $contador['cpfcnpj']; ?></td>
			<td><?php echo $contador['contato']; ?></td>
			<td><?php echo $contador['telefone']; ?></td>
			<td><?php echo $contador['celular']; ?></td>
			<td><?php echo $contador['email']; ?></td>
			<td><?php echo $contador['emailalt']; ?></td>
			<td><?php echo $contador['obs']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'clientes', 'action' => 'view', $contador['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'clientes', 'action' => 'edit', $contador['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'clientes', 'action' => 'delete', $contador['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $contador['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
							</tbody>
						</table><!-- /.table table-striped table-bordered -->
					</div><!-- /.table-responsive -->
					
				<?php endif; ?>

				
				<div class="actions">
					<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('New').' '.__('Contador'), array('controller' => 'contadors', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				
                                </div><!-- /.actions -->
				
			</div><!-- /.related -->
			
	</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
