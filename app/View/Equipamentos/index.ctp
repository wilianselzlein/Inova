
<div id="page-container" class="row">

    <div id="sidebar" class="col-sm-3">
        
        <div class="actions">
        
            <ul class="list-group">
                <li class="list-group-item"><?php echo $this->Html->link(__('New').' '.__('Equipamento'), array('action' => 'add'), array('class' => '')); ?></li>
                <li class="list-group-item"><?php echo $this->Html->link(__('List').' '.__('Acaos'), array('controller' => 'acaos', 'action' => 'index'), array('class' => '')); ?></li> 
                <li class="list-group-item"><?php echo $this->Html->link(__('New').' '.__('Acao'), array('controller' => 'acaos', 'action' => 'add'), array('class' => '')); ?></li> 
            </ul><!-- /.list-group -->
            
        </div><!-- /.actions -->
        
    </div><!-- /#sidebar .col-sm-3 -->
    
    <div id="page-content" class="col-sm-9">

        <div class="equipamentos index">
        
            <h2><?php echo __('Equipamentos'); ?></h2>
            <?php echo $this->element('filtros'); ?>
            <div class="table-responsive">
                <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th><?php echo $this->Paginator->sort('id'); ?></th>
                            <th><?php echo $this->Paginator->sort('acao_id'); ?></th>
                            <th><?php echo $this->Paginator->sort('cliente_id'); ?></th>
							<th><?php echo $this->Paginator->sort('contato'); ?></th>
							<th><?php echo $this->Paginator->sort('telefone'); ?></th>
							<th><?php echo $this->Paginator->sort('data'); ?></th>
							<th><?php echo $this->Paginator->sort('user_id', 'Técnico'); ?></th>
							<th><?php echo $this->Paginator->sort('fornecedor'); ?></th>
							<th><?php echo $this->Paginator->sort('observacao'); ?></th>
							<th><?php echo $this->Paginator->sort('retorno'); ?></th>
                            <th class="actions"><?php echo __('Actions'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
<?php foreach ($equipamentos as $equipamento): ?>
    <tr>
        <td><?php echo h($equipamento['Equipamento']['id']); ?>&nbsp;</td>
        <td><?php echo $this->Html->link($equipamento['Acao']['nome'], array('controller' => 'acaos', 'action' => 'view', $equipamento['Equipamento']['acao_id']), array('class' => '')); ?></td>
        <td><?php echo $this->Html->link($equipamento['Cliente']['razaosocial'], array('controller' => 'clientes', 'action' => 'view', $equipamento['Equipamento']['cliente_id']), array('class' => '')); ?></td>
        <td><?php echo h($equipamento['Equipamento']['contato']); ?>&nbsp;</td>
        <td><?php echo h($equipamento['Equipamento']['telefone']); ?>&nbsp;</td>
        <td><?php echo date("d/m/y", strtotime($equipamento['Equipamento']['data'])); ?>&nbsp;</td>
        <td><?php echo $this->Html->link($equipamento['User']['username'], array('controller' => 'users', 'action' => 'view', $equipamento['Equipamento']['user_id']), array('class' => '')); ?></td>
        <td><?php echo h($equipamento['Equipamento']['fornecedor']); ?>&nbsp;</td>
        <td><?php echo h($equipamento['Equipamento']['observacao']); ?>&nbsp;</td>
        <td><?php echo date("d/m/y", strtotime($equipamento['Equipamento']['retorno'])); ?>&nbsp;</td>
        <td class="actions">
            <?php echo $this->Html->link(__('View'), array('action' => 'view', $equipamento['Equipamento']['id']), array('class' => 'btn btn-default btn-xs')); ?>
            <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $equipamento['Equipamento']['id']), array('class' => 'btn btn-default btn-xs')); ?>
            <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $equipamento['Equipamento']['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $equipamento['Equipamento']['id'])); ?>
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