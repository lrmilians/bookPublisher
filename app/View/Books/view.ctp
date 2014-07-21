<div id="page-container" class="row">
    <div id="page-content" class="col-sm-12">
        <div class="books view col-sm-12">
            <h2><?php  echo __('Libro'); ?></h2>
            <div class="col-sm-12">
                <h5 class="col-sm-2"><?php echo $this->Html->link(__('Contenido'), array('action' => 'showContent', $book['Book']['id']), array('class' => 'btn btn-large btn-primary')); ?></h5>
            </div>
            <div class="table-responsive col-sm-12">
                <table class="table table-striped table-bordered table-hover">
                    <tbody>
                        <tr>
                            <td><strong><?php echo __('Título'); ?></strong></td>
                            <td><?php echo h($book['Book']['title']); ?>&nbsp;</td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group col-sm-3 col-sm-offset-5">
                    <?php echo $this->Html->link('Regresar','/books', array('class' => 'btn btn-large btn-primary')); ?>    
                </div>  
            </div>
        </div>
        <div class="related col-sm-12">
            <h3><?php echo __('Contenidos del libro '). h($book['Book']['title']); ?></h3>
            <?php if (!empty($book['TableContent'])): ?>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><?php echo __('Contenido'); ?></th>
                                <th><?php echo __('Nivel'); ?></th>
                                <th><?php echo __('Orden'); ?></th>
                                <th class="actions"><?php echo __('Acciones'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0;
                                  foreach ($book['TableContent'] as $tableContent): ?>
                                    <tr>
                                        <td><?php echo $tableContent['content']; ?></td>
                                        <td><?php echo $tableContent['level']; ?></td>
                                        <td><?php echo $tableContent['order']; ?></td>
                                        <td class="actions">     
                                            <ul class="navigation">
                                                <li><a href="#"><?php echo $this->Html->image('tools.png')?></a>
                                                    <ul class="level1">
                                                        <li><?php echo $this->Html->link(__('Ver'), array('controller' => 'table_contents', 'action' => 'view', $tableContent['id']), array('class' => 'btn btn-default btn-xs')); ?></li>
                                                        <li><?php echo $this->Html->link(__('Editar'), array('controller' => 'table_contents', 'action' => 'edit', $tableContent['id']), array('class' => 'btn btn-default btn-xs')); ?></li>
                                                        <li><?php echo $this->Form->postLink(__('Eliminar'), array('controller' => 'table_contents', 'action' => 'delete', $tableContent['id']), array('class' => 'btn btn-default btn-xs'), __('Está seguro que desea eliminar el contenido '. $tableContent['content'] .'?', $tableContent['id'])); ?></li>         
                                                    </ul>
                                                </li>
                                            </ul> 
                                        </td>
                                    </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
            <div class="actions">
                <?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('Nuevo contenido'), array('controller' => 'table_contents', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>
            </div>
        </div>
    </div>
</div>
