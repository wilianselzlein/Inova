
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
			
			<ul class="list-group">			
						<li class="list-group-item"><?php echo $this->Html->link(__('Edit').' '.__('Equipamento'), array('action' => 'edit', $equipamento['Equipamento']['id']), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Form->postLink(__('Delete').' '.__('Equipamento'), array('action' => 'delete', $equipamento['Equipamento']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $equipamento['Equipamento']['id'])); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List').' '.__('Equipamentos'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New').' '.__('Equipamento'), array('action' => 'add'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List').' '.__('Acaos'), array('controller' => 'acaos', 'action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New').' '.__('Acao'), array('controller' => 'acaos', 'action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- /.list-group -->
			
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .span3 -->
	
	<div id="page-content" class="col-sm-9">
		
		<div class="equipamentos view">

			<h2><?php echo __('Equipamento'); ?></h2>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($equipamento['Equipamento']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Nome'); ?></strong></td>
		<td>
			<?php echo h($equipamento['Equipamento']['nome']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Acao'); ?></strong></td>
		<td>
			<?php echo h($equipamento['Acao']['nome']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Cliente'); ?></strong></td>
		<td>
			<?php echo h($equipamento['Cliente']['razaosocial']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Contato'); ?></strong></td>
		<td>
			<?php echo h($equipamento['Equipamento']['contato']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Telefone'); ?></strong></td>
		<td>
			<?php echo h($equipamento['Equipamento']['telefone']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Data'); ?></strong></td>
		<td>
			<?php echo h($equipamento['Equipamento']['data']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Técnico'); ?></strong></td>
		<td>
			<?php echo h($equipamento['User']['username']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Observacao'); ?></strong></td>
		<td>
			<?php echo h($equipamento['Equipamento']['observacao']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Retorno'); ?></strong></td>
		<td>
			<?php echo h($equipamento['Equipamento']['retorno']); ?>
			&nbsp;
		</td>
</tr>

</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->
			
	</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
