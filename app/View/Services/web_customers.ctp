<div class="panel panel-default">

	<div class="panel-heading">
		<h3>
			<span class="fa fa-smile-o"></span> <?php echo __('Clientes'); ?>
			<div class="btn-group pull-right">
				<button type="button" class="btn btn-default dropdown-toggle hidden" data-toggle="dropdown">
					<?php echo __('Actions');?><span class="caret"></span>
				</button>
				<ul class="dropdown-menu" role="menu">
					<li class="list-group-item"><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New')  .' '.__('Cliente'), array('action' => 'add'), array('escape' => false)); ?></li>
					<li class="list-group-item"><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '   .__('List') .' '.__('Cidades'), array('controller' => 'cidades', 'action' => 'index'), array('escape' => false)); ?></li>
					<li class="list-group-item"><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New')  .' '.__('Cidade'), array('controller' => 'cidades', 'action' => 'add'), array('escape' => false)); ?></li>
					<li class="list-group-item"><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '   .__('List') .' '.__('Subgrupos'), array('controller' => 'subgrupos', 'action' => 'index'), array('escape' => false)); ?></li>
					<li class="list-group-item"><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New')  .' '.__('Subgrupo'), array('controller' => 'subgrupos', 'action' => 'add'), array('escape' => false)); ?></li>
					<li class="list-group-item"><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '   .__('List') .' '.__('Users'), array('controller' => 'users', 'action' => 'index'), array('escape' => false)); ?></li>
					<li class="list-group-item"><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New')  .' '.__('User'), array('controller' => 'users', 'action' => 'add'), array('escape' => false)); ?></li>
					<li class="list-group-item"><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '   .__('List') .' '.__('Unidades'), array('controller' => 'unidades', 'action' => 'index'), array('escape' => false)); ?></li>
					<li class="list-group-item"><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New')  .' '.__('Unidade'), array('controller' => 'unidades', 'action' => 'add'), array('escape' => false)); ?></li>
					<li class="list-group-item"><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '   .__('List') .' '.__('Chamados'), array('controller' => 'chamados', 'action' => 'index'), array('escape' => false)); ?></li>
					<li class="list-group-item"><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New')  .' '.__('Chamado'), array('controller' => 'chamados', 'action' => 'add'), array('escape' => false)); ?></li>
				</ul>
			</div>
		</h3>
	</div>

	<div class="panel-body">
		<?php echo $this->element('filtros'); ?>
		<div class="table-responsive">
			<table class="table table-bordered table-hover table-condensed">
				<thead>
					<tr>
						<th><?php echo $this->Paginator->sort('id'); ?></th>
						<th><?php echo $this->Paginator->sort('fantasia'); ?></th>
						<th><?php echo $this->Paginator->sort('razaosocial'); ?></th>
						<th><?php echo $this->Paginator->sort('contato'); ?></th>
						<th><?php echo $this->Paginator->sort('telefone'); ?></th>
						<th><?php echo $this->Paginator->sort('celular'); ?></th>
						<th><?php echo $this->Paginator->sort('email'); ?></th>
						<th class="actions"><?php echo __('Actions'); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($clientes as $cliente): ?>
            <?php
						  $newLine = '&#13;&#10;';
              $customerData ="";
              $customerData .= $cliente['Cliente']['fantasiarazaosocial'].$newLine;
              $customerData .= $cliente['Cliente']['cpfcnpj'].$newLine;
              $customerData .= $cliente['Cliente']['contato'].$newLine;
              $customerData .= $cliente['Cliente']['email'].$newLine;
              $customerData .= !empty($cliente['Cliente']['telefone']) ? $cliente['Cliente']['telefone'].$newLine : '';
              $customerData .= !empty($cliente['Cliente']['telefone2']) ? $cliente['Cliente']['telefone2'].$newLine : '';
              $customerData .= !empty($cliente['Cliente']['celular']) ? $cliente['Cliente']['celular'].$newLine : '';
              $customerData .= $cliente['Cliente']['endereco'].', '.$cliente['Cliente']['numero'];
							$customerData .= !empty($cliente['Cliente']['complemento']) ? ' - '.$cliente['Cliente']['complemento'].$newLine : $newLine;
              $customerData .= $cliente['Cliente']['cep'].' / '.$cliente['Cliente']['bairro'].$newLine;
              $customerData .= $cliente['Cidade']['nome'].' / '.$cliente['Cidade']['uf'].$newLine;
             ?>

						<tr>
							<td><?php echo h($cliente['Cliente']['id']); ?>&nbsp;</td>
							<td><?php echo h($cliente['Cliente']['fantasia']); ?>&nbsp;
              <input type="hidden" id="copyTarget<?php echo $cliente['Cliente']['id'];?>" value="<?php echo $customerData; ?>"></td>
							<td><?php echo h($cliente['Cliente']['razaosocial']); ?>&nbsp;</td>
							<td><?php echo h($cliente['Cliente']['contato']); ?>&nbsp;</td>
							<td><nobr><?php echo h($cliente['Cliente']['telefone']); ?>&nbsp;</nobr></td>
							<td><nobr><?php echo h($cliente['Cliente']['celular']); ?>&nbsp;</nobr></td>
							<td><?php echo h($cliente['Cliente']['email']); ?>&nbsp;</td>


							<td class="actions">
								<?php
								$usuario_logado = $this->Session->read('Auth.User');

								if ((strtolower($usuario_logado['role']) == 'root') || (strtolower($usuario_logado['role']) == 'admin')
									|| (strtolower($usuario_logado['role']) == 'webmaster')) {
									echo $this->Html->link('<i class="fa fa-github-alt fa-2x"></i>', array('controller'=>'services', 'action' => 'index', $cliente['Cliente']['id'], 'web'=>true), array('class' => 'btn btn-default btn-xs', 'title'=>__('Web'), 'escape'=>false));
							}

							?>
							<?php echo $this->Html->link('<i class="fa fa-eye fa-2x"></i>', array('controller' => 'clientes', 'action' => 'view', $cliente['Cliente']['id'], 'web' => false), array('class' => 'btn btn-default btn-xs', 'title'=>__('View'), 'escape'=>false)); ?>
              <button class="btn btn-default btn-xs copyButton" title="<?php echo __('Copy');?>" onclick="copy(this, 'copyTarget'+<?php echo $cliente['Cliente']['id'];?>);"><i class="fa fa-clipboard fa-2x"></i></button>
              <?php //echo $this->Html->button('<i class="fa fa-clipboard fa-2x"></i>', null, array('class' => 'btn btn-default btn-xs', 'title'=>__('Copy'), 'escape'=>false)); ?>
							<?php //echo $this->Html->link('<i class="fa fa-pencil"></i>', array('action' => 'edit', $cliente['Cliente']['id']), array('class' => 'btn btn-default btn-xs', 'title'=>__('Edit'), 'escape'=>false)); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div><!-- /.table-responsive -->

</div>
<?php echo $this->element('Paginator'); ?>
</div>
<?php echo $this->Html->script('copyclipboard'); ?>
