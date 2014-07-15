<div id="page-container" class="row">
    <div id="page-content" class="col-sm-12">
        <div class="functionalityTypes view">
            <h2><?php echo __('Datos Tipo Funcionalidad'); ?></h2>
            <hr>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <tbody>
                        <tr>
                            <td><strong><?php echo __('Nombre'); ?></strong></td>
                            <td><?php echo h($functionalityType['FunctionalityType']['name']); ?>&nbsp;</td>
                        </tr>
                        <tr>
                            <td><strong><?php echo __('Descripción'); ?></strong></td>
                            <td><?php echo h($functionalityType['FunctionalityType']['description']); ?>&nbsp;</td>
                        </tr>
                        <tr>
                            <td><strong><?php echo __('Creado'); ?></strong></td>
                            <td><?php echo h($functionalityType['FunctionalityType']['created']); ?>&nbsp;</td>
                        </tr>
                        <tr>
                            <td><strong><?php echo __('Modificado'); ?></strong></td>
                            <td><?php echo h($functionalityType['FunctionalityType']['modified']); ?>&nbsp;</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="related">
            <h3><?php echo __('Funcionalidades relacionadas'); ?></h3>
            <?php if (!empty($functionalityType['Functionality'])): ?>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><?php echo __('Nombre'); ?></th>
                                <th><?php echo __('Activa'); ?></th>
                                <th><?php echo __('URL'); ?></th>
                                <th><?php echo __('Descripción'); ?></th>
                                <th><?php echo __('Parámetro'); ?></th>
                                <th><?php echo __('Creada'); ?></th>
                                <th><?php echo __('Modificada'); ?></th>
                                <th><?php echo __('Tipo Funcionalidad '); ?></th>
                                <th class="actions"><?php echo __('Acciones'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0;   
                                foreach ($functionalityType['Functionality'] as $functionality): ?>
                                <tr>
                                    <td><?php echo $functionality['name']; ?></td>
                                    <td><?php echo $functionality['active']; ?></td>
                                    <td><?php echo $functionality['url']; ?></td>
                                    <td><?php echo $functionality['description']; ?></td>
                                    <td><?php echo $functionality['param']; ?></td>
                                    <td><?php echo $functionality['created']; ?></td>
                                    <td><?php echo $functionality['modified']; ?></td>
                                    <td><?php echo $functionality['functionality_type_id']; ?></td>
                                    <td class="actions">
                                        <ul class="navigation">
                                            <li><a href="#"><?php echo $this->Html->image('tools.png')?></a>
                                                <ul class="level1">
                                                    <li><?php echo $this->Html->link(__('Ver'), array('controller' => 'functionalities', 'action' => 'view', $functionality['id']), array('class' => 'btn btn-default btn-xs')); ?></li>
                                                    <li><?php echo $this->Html->link(__('Editar'), array('controller' => 'functionalities', 'action' => 'edit', $functionality['id']), array('class' => 'btn btn-default btn-xs')); ?></li>
                                                    <li><?php echo $this->Form->postLink(__('Eliminar'), array('controller' => 'functionalities', 'action' => 'delete', $functionality['id']), array('class' => 'btn btn-default btn-xs'), __('Está seguro que desea eliminar '.$functionality['name'].'?', $functionality['id'])); ?></li>
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
                <?php echo $this->Html->link('<i class="icon-plus icon-white"></i> ' . __('Nueva Funcionalidad'), array('controller' => 'functionalities', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>
            </div>
        </div>
    </div>
</div>
<div class="form-group col-sm-3 col-sm-offset-5">
    <?php echo $this->Html->link('Regresar','/functionality_types', array('class' => 'btn btn-large btn-primary')); ?>
</div>