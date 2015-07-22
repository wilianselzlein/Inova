<table class="table table-bordered table-hover table-condensed">  
   <thead>
      <tr>
         <th><?php echo $this->Paginator->sort('id');?></th>
         <th><?php echo $this->Paginator->sort('cliente_id');?></th>
         <th><?php echo $this->Paginator->sort('contato');?></th>
         <th><?php echo $this->Paginator->sort('descricao');?></th>
         <th><?php echo $this->Paginator->sort('prioridade_id');?></th>
         <th><?php echo $this->Paginator->sort('problema_id');?></th>
         <th><?php echo $this->Paginator->sort('user_id');?></th>
         <th><?php echo __('Actions'); ?></th>
      </tr>
   </thead>
   <?php foreach ($chamados as $chamado): ?>                        
   <tr>
      <td>
         <?php echo $this->Html->link($chamado['Chamado']['id'], array('controller' => 'chamados', 'action' => 'view', $chamado['Chamado']['id'])) ?>
      </td>

      <td title="<?php echo h($chamado['Cliente']['celular']."\n".$chamado['Cliente']['telefone']."\n".$chamado['Cliente']['telefone2']."\n".$chamado['Cliente']['email']);?>">
         <?php echo $this->Html->link($chamado['Cliente']['fantasia'], array('controller' => 'clientes', 'action' => 'view', $chamado['Cliente']['id'])) ?>
      </td>
      <td>
         <?php echo  $chamado['Chamado']['contato'] ?>
      </td>
      <td>
         <?php echo $this->Html->wrapText($chamado['Chamado']['id'], $chamado['Chamado']['descricao']); ?>&nbsp;
      </td>
      <td>
         <?php echo $this->Html->link($chamado['Prioridade']['nome'], array('controller' => 'subgrupos', 'action' => 'view', $chamado['Prioridade']['id'])) ?>
      </td>
      <td>
         <?php echo $this->Html->link($chamado['Problema']['nome'], array('controller' => 'problemas', 'action' => 'view', $chamado['Problema']['id'])) ?>
      </td>
      <td>
         <nowrap>
            <?php echo $this->Html->link($chamado['User']['nickname'], array('controller' => 'users', 'action' => 'view', $chamado['User']['id'])) ?>
         </nowrap>
      </td>
      <td class="actions" align="right">
         <?php echo $this->Html->link('<i class="fa fa-history"></i>', 
                                      array('controller' => 'historicos', 'action' => 'add', $chamado['Chamado']['id']), 
                                      array('class' => 'btn btn-default btn-xs', 
                                            'target' =>'_parent',
                                            'title'=>__('Histórico'), 'escape'=>false)); ?>

         <a class="btn btn-default btn-xs" >
            <div class="edit" id="situacao<?php echo $chamado['Chamado']['id']; ?>">
               <i class="fa fa-flag"></i><?php echo " ".$chamado['Situacao']['nome']; ?>
            </div>
         </a>
         <a class="btn btn-default btn-xs" title="Adicionar" id="adicionar<?php echo $chamado['Chamado']['id']; ?>"><i class="fa fa-plus-circle"></i></a>
      </td>
   </tr>
   <?php endforeach; ?>
</table>
<ul class="pagination">
   <?php
echo $this->Paginator->prev('< ' . __('Previous'), array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'tag' => 'li', 'currentClass' => 'disabled'));
echo $this->Paginator->next(__('Next') . ' >', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
   ?>
</ul><!-- /.pagination -->