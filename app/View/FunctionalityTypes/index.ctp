<div id="page-container" class="row">
    <div id="page-content" class="col-sm-12">
        <div class="functionalityTypes index">
            <h2><?php echo __('Tipos Funcionalidades'); ?></h2>
            <hr>
            <h5><?php echo $this->Html->link(__('Nuevo Tipo Funcionalidad'), array('action' => 'add'), array('class' => 'btn btn-large btn-primary'));?></h5>
            <div class="table-responsive">
                <table cellpadding="0" cellspacing="0" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th><?php echo $this->Paginator->sort('name', 'Tipo Funcionalidad'); ?></th>
                            <th><?php echo $this->Paginator->sort('description', 'Descripción'); ?></th>
                            <th><?php echo $this->Paginator->sort('created', 'Creada'); ?></th>
                            <th><?php echo $this->Paginator->sort('modified', 'Modificada'); ?></th>
                            <th class="actions"><?php echo __('Acciones'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($functionalityTypes as $functionalityType): ?>
                            <tr>
                                <td><?php echo h($functionalityType['FunctionalityType']['name']); ?>&nbsp;</td>
                                <td><?php echo h($functionalityType['FunctionalityType']['description']); ?>&nbsp;</td>
                                <td><?php echo h($functionalityType['FunctionalityType']['created']); ?>&nbsp;</td>
                                <td><?php echo h($functionalityType['FunctionalityType']['modified']); ?>&nbsp;</td>
                                <td class="actions">
                                    <ul class="navigation">
                                        <li><a href="#"><?php echo $this->Html->image('tools.png')?></a>
                                            <ul class="level1">
                                                <li><?php echo $this->Html->link(__('Ver'), array('action' => 'view', $functionalityType['FunctionalityType']['id']), array('class' => 'btn btn-default btn-xs')); ?></li>
                                                <li><?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $functionalityType['FunctionalityType']['id']), array('class' => 'btn btn-default btn-xs')); ?></li>
                                                <li><?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $functionalityType['FunctionalityType']['id']), array('class' => 'btn btn-default btn-xs'), __('Está seguro que desea eliminar el tipo de funcionalidad '.$functionalityType['FunctionalityType']['name'].'?', $functionalityType['FunctionalityType']['id'])); ?></li>
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
                      echo $this->Paginator->next(__('Siguiente') . ' >', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a')); ?>
            </ul>
        </div>
    </div>
</div>