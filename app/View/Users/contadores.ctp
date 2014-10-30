
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
</tr><tr>		<td><strong><?php echo __('Unidade'); ?></strong></td>
		<td>
                        <?php echo $this->Html->link($user['Unidade']['nome'], array('controller' => 'unidades', 'action' => 'view', $user['Unidade']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
                
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

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
			<td><?php echo DisplayField('cidade', $contador['cidade_id']); ?></td>
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
