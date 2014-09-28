<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">

			<ul class="list-group">
				<li class="list-group-item"><?php echo $this->Html->link(__('New').' '.__('Contador'), array('action' => 'add'), array('class' => '')); ?></li>
				<li class="list-group-item"><?php echo $this->Html->link(__('List').' '.__('Cidades'), array('controller' => 'cidades', 'action' => 'index'), array('class' => '')); ?></li> 
				<li class="list-group-item"><?php echo $this->Html->link(__('New').' '.__('Cidade'), array('controller' => 'cidades', 'action' => 'add'), array('class' => '')); ?></li> 
				<li class="list-group-item"><?php echo $this->Html->link(__('List').' '.__('Users'), array('controller' => 'users', 'action' => 'index'), array('class' => '')); ?></li> 
				<li class="list-group-item"><?php echo $this->Html->link(__('New').' '.__('User'), array('controller' => 'users', 'action' => 'add'), array('class' => '')); ?></li> 
			</ul><!-- /.list-group -->
			
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .col-sm-3 -->
	
	<div id="page-content" class="col-sm-9">

		<div class="clientes index">
		
			<h2><?php echo __('Contadores'); ?></h2>
                        <?php echo $this->element('filtros'); ?>
                               
			<div class="table-responsive">
				<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
					<thead>
						<tr>                                                   
                                                        <th><?php echo $this->Paginator->sort('id'); ?></th>
                                                        <th><?php echo $this->Paginator->sort('fantasia'); ?></th>
							<th><?php echo $this->Paginator->sort('razaosocial'); ?></th>
							<th><?php echo $this->Paginator->sort('endereco'); ?></th>
							<th><?php echo $this->Paginator->sort('numero'); ?></th>
							<th><?php echo $this->Paginator->sort('bairro'); ?></th>
							<th><?php echo $this->Paginator->sort('complemento'); ?></th>
                                                        <th><?php echo $this->Paginator->sort('cep'); ?></th>
                                                        <th><?php echo $this->Paginator->sort('cidade_id'); ?></th>
                                                        <th><?php echo $this->Paginator->sort('cpfcnpj', 'CRC'); ?></th>
							<th><?php echo $this->Paginator->sort('contato'); ?></th>
                                                        <th><?php echo $this->Paginator->sort('telefone'); ?></th>
                                                        <th><?php echo $this->Paginator->sort('celular'); ?></th>
                                                        <th><?php echo $this->Paginator->sort('email'); ?></th>
                                                        <th><?php echo $this->Paginator->sort('emailalt'); ?></th>
                                                        <th><?php echo $this->Paginator->sort('user_id'); ?></th>
                                                        <th><?php echo $this->Paginator->sort('obs'); ?></th>
							<th class="actions"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
<?php foreach ($contadors as $cliente): ?>
	<tr>
		<td><?php echo h($cliente['Contador']['id']); ?>&nbsp;</td>
                <td><?php echo h($cliente['Contador']['fantasia']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Contador']['razaosocial']); ?>&nbsp;</td>
                <td><?php echo h($cliente['Contador']['endereco']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Contador']['numero']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Contador']['bairro']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Contador']['complemento']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Contador']['cep']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($cliente['Cidade']['nome'], array('controller' => 'cidades', 'action' => 'view', $cliente['Cidade']['id'])); ?>
		</td>           
		<td><?php echo h($cliente['Contador']['cpfcnpj']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Contador']['contato']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Contador']['telefone']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Contador']['celular']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Contador']['email']); ?>&nbsp;</td>
                <td><?php echo h($cliente['Contador']['emailalt']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($cliente['User']['username'], array('controller' => 'users', 'action' => 'view', $cliente['User']['id'])); ?>
		</td>
		<td><?php echo h($cliente['Contador']['obs']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $cliente['Contador']['id']), array('class' => 'btn btn-default btn-xs')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $cliente['Contador']['id']), array('class' => 'btn btn-default btn-xs')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $cliente['Contador']['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $cliente['Contador']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
					</tbody>
				</table>
			</div><!-- /.table-responsive -->
			
			<p><small>
				<?php
					echo $this->Paginator->counter(array(
					'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
					));
				?>
			</small></p>

			<ul class="pagination">
				<?php
					echo $this->Paginator->prev('< ' . __('Previous'), array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
					echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'tag' => 'li', 'currentClass' => 'disabled'));
					echo $this->Paginator->next(__('Next') . ' >', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
				?>
			</ul><!-- /.pagination -->
			
		</div><!-- /.index -->
	
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->