
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
			
			<ul class="list-group">			
                <li class="list-group-item"><?php echo $this->Html->link(__('Edit').' '.__('Contador'), array('action' => 'edit', $cliente['Contador']['id']), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Form->postLink(__('Delete').' '.__('Contador'), array('action' => 'delete', $cliente['Contador']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $cliente['Contador']['id'])); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List').' '.__('Contadores'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New').' '.__('Contador'), array('action' => 'add'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List').' '.__('Cidades'), array('controller' => 'cidades', 'action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New').' '.__('Cidade'), array('controller' => 'cidades', 'action' => 'add'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List').' '.__('Users'), array('controller' => 'users', 'action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New').' '.__('User'), array('controller' => 'users', 'action' => 'add'), array('class' => '')); ?> </li>		
			</ul><!-- /.list-group -->
			
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .span3 -->
	
	<div id="page-content" class="col-sm-9">
		
		<div class="clientes view">

			<h2><?php  echo __('Contador'); ?></h2>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($cliente['Contador']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Fantasia'); ?></strong></td>
		<td>
			<?php echo h($cliente['Contador']['fantasia']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Razaosocial'); ?></strong></td>
		<td>
			<?php echo h($cliente['Contador']['razaosocial']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Endereco'); ?></strong></td>
		<td>
			<?php echo h($cliente['Contador']['endereco']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Numero'); ?></strong></td>
		<td>
			<?php echo h($cliente['Contador']['numero']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Bairro'); ?></strong></td>
		<td>
			<?php echo h($cliente['Contador']['bairro']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Complemento'); ?></strong></td>
		<td>
			<?php echo h($cliente['Contador']['complemento']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Cep'); ?></strong></td>
		<td>
			<?php echo h($cliente['Contador']['cep']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Cidade'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($cliente['Cidade']['nome'], array('controller' => 'cidades', 'action' => 'view', $cliente['Cidade']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('CRC'); ?></strong></td>
		<td>
			<?php echo h($cliente['Contador']['cpfcnpj']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Contato'); ?></strong></td>
		<td>
			<?php echo h($cliente['Contador']['contato']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Telefone'); ?></strong></td>
		<td>
			<?php echo h($cliente['Contador']['telefone']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Celular'); ?></strong></td>
		<td>
			<?php echo h($cliente['Contador']['celular']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Email'); ?></strong></td>
		<td>
			<?php echo h($cliente['Contador']['email']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Emailalt'); ?></strong></td>
		<td>
			<?php echo h($cliente['Contador']['emailalt']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('User'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($cliente['User']['username'], array('controller' => 'users', 'action' => 'view', $cliente['User']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Obs'); ?></strong></td>
		<td>
			<?php echo h($cliente['Contador']['obs']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Criado'); ?></strong></td>
		<td>
                        <?php echo $this->Time->i18nFormat($cliente['Contador']['created'], $this->Html->__getDateTimeFormatView()); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Modificado'); ?></strong></td>
		<td>
                    <?php echo $this->Time->i18nFormat($cliente['Contador']['modified'], $this->Html->__getDateTimeFormatView()); ?>
			&nbsp;
		</td>
</tr>					</tbody>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->
                <div class="related">
                    <?php if (!empty($cliente['Visita'])): ?>
                        <h3><?php echo __('Visitas'); ?></h3>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th><?php echo __('Id'); ?></th>
                                        <th><?php echo __('Data'); ?></th>
                                        <th><?php echo __('Nova'); ?></th>
                                        <th><?php echo __('Usuário'); ?></th>
                                        <th><?php echo __('Detalhes'); ?></th>
                                        <th class="actions"><?php echo __('Actions'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i = 0;
                                        foreach ($cliente['Visita'] as $visita): ?>
                                        <tr>
                                            <td><?php echo $visita['id']; ?></td>
                                            <td><?php echo $this->Time->i18nFormat($visita['data'], $this->Html->__getDateTimeFormatView()); ?></td>
                                            <td><?php echo $this->Time->i18nFormat($visita['nova'], $this->Html->__getDateTimeFormatView()); ?></td>
                                            <td><?php echo $visita['user_id']; ?></td>
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
                            <?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('New').' '.__('Chamado'), array('controller' => 'chamados', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>
                        </div><!-- /.actions -->
                    <?php endif; ?>
                </div><!-- /.related -->

                <div class="related">
                    <?php if (!empty($cliente['Cliente'])): ?>
                        <h3><?php echo __('Clientes'); ?></h3>
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
                                        foreach ($cliente['Cliente'] as $cliente): ?>
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
                        <div class="actions">
                            <?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('New').' '.__('Modulo'), array('controller' => 'modulos', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>
                        </div><!-- /.actions -->
                    <?php endif; ?>
                </div><!-- /.related -->

	</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
