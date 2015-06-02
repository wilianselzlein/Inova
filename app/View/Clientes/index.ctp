<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">

			<ul class="list-group">
				<li class="list-group-item"><?php echo $this->Html->link(__('New').' '.__('Cliente'), array('action' => 'add'), array('class' => '')); ?></li>
				<li class="list-group-item"><?php echo $this->Html->link(__('List').' '.__('Cidades'), array('controller' => 'cidades', 'action' => 'index'), array('class' => '')); ?></li> 
				<li class="list-group-item"><?php echo $this->Html->link(__('New').' '.__('Cidade'), array('controller' => 'cidades', 'action' => 'add'), array('class' => '')); ?></li> 
				<li class="list-group-item"><?php echo $this->Html->link(__('List').' '.__('Subgrupos'), array('controller' => 'subgrupos', 'action' => 'index'), array('class' => '')); ?></li> 
				<li class="list-group-item"><?php echo $this->Html->link(__('New').' '.__('Subgrupo'), array('controller' => 'subgrupos', 'action' => 'add'), array('class' => '')); ?></li> 
				<li class="list-group-item"><?php echo $this->Html->link(__('List').' '.__('Users'), array('controller' => 'users', 'action' => 'index'), array('class' => '')); ?></li> 
				<li class="list-group-item"><?php echo $this->Html->link(__('New').' '.__('User'), array('controller' => 'users', 'action' => 'add'), array('class' => '')); ?></li> 
				<li class="list-group-item"><?php echo $this->Html->link(__('List').' '.__('Unidades'), array('controller' => 'unidades', 'action' => 'index'), array('class' => '')); ?></li> 
				<li class="list-group-item"><?php echo $this->Html->link(__('New').' '.__('Unidade'), array('controller' => 'unidades', 'action' => 'add'), array('class' => '')); ?></li> 
				<li class="list-group-item"><?php echo $this->Html->link(__('List').' '.__('Chamados'), array('controller' => 'chamados', 'action' => 'index'), array('class' => '')); ?></li> 
				<li class="list-group-item"><?php echo $this->Html->link(__('New').' '.__('Chamado'), array('controller' => 'chamados', 'action' => 'add'), array('class' => '')); ?></li> 
			</ul><!-- /.list-group -->
			
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .col-sm-3 -->
	
	<div id="page-content" class="col-sm-9">

		<div class="clientes index">
		
			<h2><?php echo __('Clientes'); ?></h2>
                        <?php echo $this->element('filtros'); ?>
                               
			<div class="table-responsive">
				<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th><?php echo $this->Paginator->sort('id'); ?></th>
							<th><?php echo $this->Paginator->sort('fantasia'); ?></th>
							<th><?php echo $this->Paginator->sort('razaosocial'); ?></th>
							<th><?php echo $this->Paginator->sort('cpfcnpj'); ?></th>
							<th><?php echo $this->Paginator->sort('cidade_id'); ?></th>
							
							
							
							
							
							
							
							
							
							
							
							<th><?php echo $this->Paginator->sort('contato'); ?></th>
							
							
							
							
							
							
							
							
							<th><?php echo $this->Paginator->sort('telefone'); ?></th>
							<th><?php echo $this->Paginator->sort('celular'); ?></th>
							<th><?php echo $this->Paginator->sort('email'); ?></th>
                    
                     
							
							<th class="actions"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
<?php foreach ($clientes as $cliente): ?>
	<tr>
		<td><?php echo h($cliente['Cliente']['id']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['fantasia']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['razaosocial']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['cpfcnpj']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($cliente['Cidade']['nome'], array('controller' => 'cidades', 'action' => 'view', $cliente['Cidade']['id'])); ?>
		</td>
		
		<td><?php echo h($cliente['Cliente']['contato']); ?>&nbsp;</td>
		
		<td><?php echo h($cliente['Cliente']['telefone']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['celular']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['email']); ?>&nbsp;</td>
                
		
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $cliente['Cliente']['id']), array('class' => 'btn btn-default btn-xs')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $cliente['Cliente']['id']), array('class' => 'btn btn-default btn-xs')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $cliente['Cliente']['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $cliente['Cliente']['id'])); ?>
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