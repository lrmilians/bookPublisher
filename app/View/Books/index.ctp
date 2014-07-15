<div id="page-container" class="row">	
    <div id="page-content" class="col-sm-12">
        <div class="books index">	
            <h2><?php echo __('Libros'); ?></h2>
            <div class="col-sm-12">
                <h5 class="col-sm-2"><?php echo $this->Html->link(__('Nuevo Libro'), array('action' => 'add'), array('class' => 'btn btn-large btn-primary'));?></h5>
            </div>
            <div class="table-responsive col-sm-12">
                <table cellpadding="0" cellspacing="0" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th><?php echo $this->Paginator->sort('Título'); ?></th>
                            <th class="actions"><?php echo __('Acciones'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($books as $book): ?>
                            <tr>
                                <td><?php echo h($book['Book']['title']); ?>&nbsp;</td>
                                <td class="actions">     
                                    <ul class="navigation">
                                        <li><a href="#"><?php echo $this->Html->image('tools.png')?></a>
                                            <ul class="level1">
                                                <li><?php echo $this->Html->link(__('Ver'), array('action' => 'view', $book['Book']['id']), array('class' => 'btn btn-default btn-xs')); ?></li>
                                                <li><?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $book['Book']['id']), array('class' => 'btn btn-default btn-xs')); ?></li>
                                                <li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $book['Book']['id']), array('class' => 'btn btn-default btn-xs'), __('Está seguro que desea eliminar el libro '.$book['Book']['title'].' ?', $book['Book']['id'])); ?></li>         
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