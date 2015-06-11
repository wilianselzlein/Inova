
<?php echo $this->Javascript->link('jquery.jeditable.mini'); ?>



<div class="panel panel-default">

   <div class="panel-heading">
      <h3>
         <span class="fa fa-map-marker"></span> <?php echo __('Chamados'); ?>                
         <div class="btn-group pull-right">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
               <?php echo __('Actions');?><span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
               <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New')  .' '. __('Chamado'),      array('action' => 'add'), array('escape'=>false)); ?></li>
               <li class="divider"></li>
               <li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '   .__('List') .' '. __('Tipos'),        array('controller' => 'tipos', 'action' => 'index'), array('escape'=>false)); ?></li> 
               <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New')  .' '. __('Tipo'),         array('controller' => 'tipos', 'action' => 'add'), array('escape'=>false)); ?></li> 
               <li class="divider"></li>
               <li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '   .__('List') .' '. __('Clientes'),     array('controller' => 'clientes', 'action' => 'index'), array('escape'=>false)); ?></li> 
               <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New')  .' '. __('Cliente'),      array('controller' => 'clientes', 'action' => 'add'), array('escape'=>false)); ?></li> 
               <li class="divider"></li>
               <li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '   .__('List') .' '. __('Problemas'),    array('controller' => 'problemas', 'action' => 'index'), array('escape'=>false)); ?></li> 
               <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New')  .' '. __('Problema'),     array('controller' => 'problemas', 'action' => 'add'), array('escape'=>false)); ?></li> 
               <li class="divider"></li>
               <li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '   .__('List') .' '. __('Situacaos'),    array('controller' => 'situacaos', 'action' => 'index'), array('escape'=>false)); ?></li> 
               <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New')  .' '. __('Situacao'),     array('controller' => 'situacaos', 'action' => 'add'), array('escape'=>false)); ?></li> 
               <li class="divider"></li>
               <li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '   .__('List') .' '. __('Historicos'),   array('controller' => 'historicos', 'action' => 'index'), array('escape'=>false)); ?></li> 
               <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New')  .' '. __('Historico'),    array('controller' => 'historicos', 'action' => 'add'), array('escape'=>false)); ?></li> 
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
                  <th><?php echo $this->Paginator->sort('tipo_id'); ?></th>
                  <th><?php echo $this->Paginator->sort('descricao'); ?></th>
                  <th><?php echo $this->Paginator->sort('contato'); ?></th>
                  <th><?php echo $this->Paginator->sort('cliente_id'); ?></th>
                  <th><?php echo $this->Paginator->sort('prioridade'); ?></th>
                  <th><?php echo $this->Paginator->sort('problema_id'); ?></th>
                  <th colspan="2"><?php echo $this->Paginator->sort('situacao_id'); ?></th>
                  <th><?php echo $this->Paginator->sort('user_id'); ?></th>
                  <th><?php echo $this->Paginator->sort('previsaoexecucao'); ?></th>
                  <th class="actions"><?php echo __('Actions'); ?></th>
               </tr>
            </thead>
            <tbody>
               <?php foreach ($chamados as $chamado): ?>
               <tr>
                  <td><?php echo h($chamado['Chamado']['id']); ?>&nbsp;</td>
                  <td>
                     <?php echo $this->Html->link($chamado['Tipo']['nome'], array('controller' => 'tipos', 'action' => 'view', $chamado['Tipo']['id'])); ?>
                  </td>
                  <td title="<?php echo h($chamado['Chamado']['descricao']);?>"><?php echo $this->Text->excerpt($chamado['Chamado']['descricao'], 'method', 30, '...'); ?></td>
                  <td><?php echo h($chamado['Chamado']['contato']); ?>&nbsp;</td>
                  <td>
                     <?php echo $this->Html->link($chamado['Cliente']['fantasia'], array('controller' => 'clientes', 'action' => 'view', $chamado['Cliente']['id'])); ?>
                  </td>
                  <td><nobr><?php echo $this->Html->link($chamado['Prioridade']['nome'], array('controller' => 'subgrupos', 'action' => 'view', $chamado['Prioridade']['id'])); ?></nobr></td>
                  <td>
                     <?php echo $this->Html->link($chamado['Problema']['nome'], array('controller' => 'problemas', 'action' => 'view', $chamado['Problema']['id'])); ?>
                  </td>
                  <td>
                     <nobr>
                        <div class="edit" id="situacao<?php echo $chamado['Chamado']['id']; ?>">
                           <?php echo $chamado['Situacao']['nome']; ?>
                        </div>

                        <?php
echo $this->Ajax->editor(
   'situacao' . $chamado['Chamado']['id'], array(
      'controller' => 'Chamados',
      'action' => 'situacao',
   ), array(
      'indicator' => '<i class="fa fa-spinner"></i>',
      'submit' => '<i class="fa fa-save"></i>',
      'type' => 'select',
      'style' => 'inherit',
      'submitdata' => array('id' => h($chamado['Chamado']['id'])),
      'data' => $situacoes,
      'tooltip' => 'Clique para alterar a situação'
   )
);
                        ?>
                     </nobr>
                  </td>
                  <td>
                     <?php echo $this->Html->link('Sit.', array('controller' => 'situacaos', 'action' => 'view', $chamado['Situacao']['id']), array('class' => 'btn btn-default btn-xs', 'title'=>__('Situação'))); ?> 
                  </td>
                  <td>
                     <?php echo $this->Html->link($chamado['User']['username'], array('controller' => 'users', 'action' => 'view', $chamado['User']['id'])); ?>
                  </td>
                  <td><?php
if (isset($chamado['Chamado']['previsaoexecucao'])) {
   echo $this->Time->i18nFormat($chamado['Chamado']['previsaoexecucao'], $this->Html->__getDateTimeFormatView());
}
                     ?>&nbsp;</td>

                  <td class="actions">
                     <nobr>
                        <?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('action' => 'view', $chamado['Chamado']['id']), array('class' => 'btn btn-default btn-xs','title' => __('View'), 'escape'=>false)); ?>
                        <?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('action' => 'edit', $chamado['Chamado']['id']), array('class' => 'btn btn-default btn-xs','title' => __('Edit'), 'escape'=>false)); ?>
                        <?php
$user = $this->Session->read('Auth.User');
if ((strtolower($user['role']) == 'root') || (strtolower($user['role']) == 'admin')) {
                        ?>
                        <?php echo $this->Form->postLink('<i class="fa fa-delete"></i>', array('action' => 'delete', $chamado['Chamado']['id']), array('class' => 'btn btn-default btn-xs', 'title' => __('Delete'), 'escape'=>false), __('Are you sure you want to delete # %s?', $chamado['Chamado']['id'])); ?>
                        <?php } ?>                                    
                        <?php echo $this->Html->link('<i class="fa fa-history"></i>', array('controller' => 'historicos', 'action' => 'add', $chamado['Chamado']['id']), array('class' => 'btn btn-default btn-xs','title' => __('Histórico'), 'escape'=>false)); ?>
                     </nobr>
                  </td>
               </tr>
               <?php endforeach; ?>
            </tbody>
         </table>
      </div><!-- /.table-responsive -->

   </div>
   <?php echo $this->element('Paginator'); ?>	
</div>