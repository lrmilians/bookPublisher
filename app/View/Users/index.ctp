<div id="page-container" class="row">
    <div id="page-content" class="col-sm-12">
        <div class="users index">
            <h2><?php echo __('Usuarios'); ?></h2>  
            <hr>             
            <div class="col-sm-12">
                <h5 class="col-sm-2"><?php echo $this->Html->link(__('Nuevo Usuario'), array('action' => 'add'), array('class' => 'btn btn-large btn-primary'));?></h5>
            </div>
            <div class="table-responsive col-sm-12">
                <table cellpadding="0" cellspacing="0" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th><?php echo $this->Paginator->sort('username', 'Usuario'); ?></th>
                            <th><?php echo $this->Paginator->sort('name', 'Nombre'); ?></th>
                            <th><?php echo $this->Paginator->sort('email', 'Email'); ?></th>
                            <th><?php echo $this->Paginator->sort('address', 'Dirección'); ?></th>
                            <th><?php echo $this->Paginator->sort('ci', 'Cédula'); ?></th>
                            <th><?php echo $this->Paginator->sort('ruc', 'RUC'); ?></th>
                            <th><?php echo $this->Paginator->sort('cell', 'Celular'); ?></th>
                            <th><?php echo $this->Paginator->sort('active', 'Activo'); ?></th>
                            <th><?php echo $this->Paginator->sort('role', 'Rol'); ?></th>
                            <th class="actions"><?php echo __('Acciones'); ?></th>  
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?php echo h($user['User']['username']); ?>&nbsp;</td>
                                <td><?php echo h($user['User']['name']); ?>&nbsp;</td>
                                <td><?php echo h($user['User']['email']); ?>&nbsp;</td>
                                <td><?php echo h($user['User']['address']); ?>&nbsp;</td>
                                <td><?php echo h($user['User']['ci']); ?>&nbsp;</td>
                                <td><?php echo h($user['User']['ruc']); ?>&nbsp;</td>
                                <td><?php echo h($user['User']['cell']); ?>&nbsp;</td>
                                <td><?php echo h($user['User']['active']); ?>&nbsp;</td>
                                <td><?php echo h($user['Role']['name']); ?>&nbsp;</td>     
                                <td class="actions">     
                                    <ul class="navigation">
                                        <li><a href="#"><?php echo $this->Html->image('tools.png')?></a>
                                            <ul class="level1">
                                                <li><?php echo $this->Html->link(__('Ver'), array('action' => 'view', $user['User']['id']), array('class' => 'btn btn-default btn-xs')); ?></li>
                                                <li><?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $user['User']['id'], $user['User']['role_id']), array('class' => 'btn btn-default btn-xs')); ?></li>
                                                <li><?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $user['User']['id']), array('class' => 'btn btn-default btn-xs'), __('Está seguro que desea eliminar el usuario '.$user['User']['username'].' ?', $user['User']['id'])); ?></li>         
                                            </ul>
                                        </li>
                                    </ul> 
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <p><small>
                <?php echo $this->Paginator->counter(array(
                            'format' => __('Pagina {:page} de {:pages} | {:current} registros de {:count} | a partir del registro {:start}, y terminando en {:end}'))); ?>
            </small></p>
            <ul class="pagination">
                <?php echo $this->Paginator->prev('< ' . __('Anterior'), array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
                      echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'tag' => 'li', 'currentClass' => 'disabled'));
                      echo $this->Paginator->next(__('Siguiente') . ' >', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));?>
            </ul>
        </div>
    </div>
</div>