
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
			
			<ul class="list-group">			
						<li class="list-group-item"><?php echo $this->Html->link(__('Edit').' '.__('Cliente'), array('action' => 'edit', $cliente['Cliente']['id']), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Form->postLink(__('Delete').' '.__('Cliente'), array('action' => 'delete', $cliente['Cliente']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $cliente['Cliente']['id'])); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List').' '.__('Clientes'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New').' '.__('Cliente'), array('action' => 'add'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List').' '.__('Cidades'), array('controller' => 'cidades', 'action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New').' '.__('Cidade'), array('controller' => 'cidades', 'action' => 'add'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List').' '.__('Subgrupos'), array('controller' => 'subgrupos', 'action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New').' '.__('Subgrupo'), array('controller' => 'subgrupos', 'action' => 'add'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List').' '.__('Users'), array('controller' => 'users', 'action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New').' '.__('User'), array('controller' => 'users', 'action' => 'add'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List').' '.__('Unidades'), array('controller' => 'unidades', 'action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New').' '.__('Unidade'), array('controller' => 'unidades', 'action' => 'add'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List').' '.__('Chamados'), array('controller' => 'chamados', 'action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New').' '.__('Chamado'), array('controller' => 'chamados', 'action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- /.list-group -->
			
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .span3 -->
	
	<div id="page-content" class="col-sm-9">
		
		<div class="clientes view">

			<h2><?php  echo __('Cliente'); ?></h2>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($cliente['Cliente']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Fantasia'); ?></strong></td>
		<td>
			<?php echo h($cliente['Cliente']['fantasia']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Razaosocial'); ?></strong></td>
		<td>
			<?php echo h($cliente['Cliente']['razaosocial']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Cpfcnpj'); ?></strong></td>
		<td>
			<?php echo h($cliente['Cliente']['cpfcnpj']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Cidade'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($cliente['Cidade']['nome'], array('controller' => 'cidades', 'action' => 'view', $cliente['Cidade']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Sistema'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($cliente['Sistema']['nome'], array('controller' => 'sistemas', 'action' => 'view', $cliente['Sistema']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Build'); ?></strong></td>
		<td>
			<?php  echo h($cliente['Cliente']['build']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Subgrupo'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($cliente['Subgrupo']['nome'], array('controller' => 'subgrupos', 'action' => 'view', $cliente['Subgrupo']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Dtvenda'); ?></strong></td>
		<td>
			<?php echo date("d/m/y", strtotime($cliente['Cliente']['dtvenda'])); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Endereco'); ?></strong></td>
		<td>
			<?php echo h($cliente['Cliente']['endereco']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Numero'); ?></strong></td>
		<td>
			<?php echo h($cliente['Cliente']['numero']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Bairro'); ?></strong></td>
		<td>
			<?php echo h($cliente['Cliente']['bairro']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Complemento'); ?></strong></td>
		<td>
			<?php echo h($cliente['Cliente']['complemento']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Ie'); ?></strong></td>
		<td>
			<?php echo h($cliente['Cliente']['ie']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Senha'); ?></strong></td>
		<td>
			<?php echo h($cliente['Cliente']['senha']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Dtinstalacao'); ?></strong></td>
		<td>
			<?php echo date("d/m/y", strtotime($cliente['Cliente']['dtinstalacao'])); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Contato'); ?></strong></td>
		<td>
			<?php echo h($cliente['Cliente']['contato']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Caixas'); ?></strong></td>
		<td>
			<?php echo h($cliente['Cliente']['caixas']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Retaguardas'); ?></strong></td>
		<td>
			<?php echo h($cliente['Cliente']['retaguardas']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Prioridade'); ?></strong></td>
		<td>
			<?php echo h($cliente['Cliente']['prioridade']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Mensalidade'); ?></strong></td>
		<td>
			<?php 
                        
                        echo $this->Number->currency($cliente['Cliente']['mensalidade']/100, 'BRL'); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Valorvenda'); ?></strong></td>
		<td>
			<?php echo $this->Number->currency($cliente['Cliente']['valorvenda']/100, 'BRL'); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Estrutura'); ?></strong></td>
		<td>
			<?php echo h($cliente['Cliente']['estrutura']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Obs'); ?></strong></td>
		<td>
			<?php echo h($cliente['Cliente']['obs']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('User'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($cliente['User']['username'], array('controller' => 'users', 'action' => 'view', $cliente['User']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Telefone'); ?></strong></td>
		<td>
			<?php echo h($cliente['Cliente']['telefone']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Celular'); ?></strong></td>
		<td>
			<?php echo h($cliente['Cliente']['celular']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Email'); ?></strong></td>
		<td>
			<?php echo h($cliente['Cliente']['email']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Cep'); ?></strong></td>
		<td>
			<?php echo h($cliente['Cliente']['cep']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Unidade'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($cliente['Unidade']['nome'], array('controller' => 'unidades', 'action' => 'view', $cliente['Unidade']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Criado'); ?></strong></td>
		<td>
                        <?php echo $this->Time->i18nFormat($cliente['Cliente']['created'], $this->Html->__getDateTimeFormatView()); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Modificado'); ?></strong></td>
		<td>
                    <?php echo $this->Time->i18nFormat($cliente['Cliente']['modified'], $this->Html->__getDateTimeFormatView()); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Prospect'); ?></strong></td>
		<td>
			<?php echo h($cliente['Cliente']['prospect']); ?>
			&nbsp;
		</td>
</tr>					</tbody>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

					
			<div class="related">

				<h3><?php echo __('Chamados'); ?></h3>
				
				<?php if (!empty($cliente['Chamado'])): ?>
					
					<div class="table-responsive">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
											<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Tipo Id'); ?></th>
		<th><?php echo __('Descricao'); ?></th>
		<th><?php echo __('Contato'); ?></th>
		<th><?php echo __('Cliente Id'); ?></th>
		<th><?php echo __('Prioridade'); ?></th>
		<th><?php echo __('Problema Id'); ?></th>
		<th><?php echo __('Situacao Id'); ?></th>
									<th class="actions"><?php echo __('Actions'); ?></th>
								</tr>
							</thead>
							<tbody>
									<?php
										$i = 0;
										foreach ($cliente['Chamado'] as $chamado): ?>
		<tr>
			<td><?php echo $chamado['id']; ?></td>
			<td><?php echo $chamado['tipo_id']; ?></td>
			<td><?php echo $chamado['descricao']; ?></td>
			<td><?php echo $chamado['contato']; ?></td>
			<td><?php echo $chamado['cliente_id']; ?></td>
			<td><?php echo $chamado['prioridade']; ?></td>
			<td><?php echo $chamado['problema_id']; ?></td>
			<td><?php echo $chamado['situacao_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'chamados', 'action' => 'view', $chamado['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'chamados', 'action' => 'edit', $chamado['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'chamados', 'action' => 'delete', $chamado['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $chamado['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
							</tbody>
						</table><!-- /.table table-striped table-bordered -->
					</div><!-- /.table-responsive -->
					
				<?php endif; ?>

				
				<div class="actions">
					<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('New').' '.__('Chamado'), array('controller' => 'chamados', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- /.actions -->
				
			</div><!-- /.related -->

			
	</div><!-- /#page-content .span9 -->

*</div><!-- /#page-container .row-fluid -->
