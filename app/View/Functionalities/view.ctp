<div id="page-container" class="row">
    <div id="page-content" class="col-sm-12">
        <div class="functionalities view">
            <h2><?php echo __('Datos Funcionalidad'); ?></h2>
            <hr>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <tbody>
                        <tr>
                            <td><strong><?php echo __('Nombre'); ?></strong></td>
                            <td><?php echo h($functionality['Functionality']['name']); ?>&nbsp;</td>
                        </tr>
                        <tr>
                            <td><strong><?php echo __('Activa'); ?></strong></td>
                            <td><?php echo h($functionality['Functionality']['active']); ?>&nbsp;</td>
                        </tr>
                        <tr>
                            <td><strong><?php echo __('URL'); ?></strong></td>
                            <td><?php echo h($functionality['Functionality']['url']); ?>&nbsp;</td>
                        </tr>
                        <tr>
                            <td><strong><?php echo __('Descripción'); ?></strong></td>
                            <td><?php echo h($functionality['Functionality']['description']); ?>&nbsp;</td>
                        </tr>
                        <tr>
                            <td><strong><?php echo __('Parámetro'); ?></strong></td>
                            <td><?php echo h($functionality['Functionality']['param']); ?>&nbsp;</td>
                        </tr>
                        <tr>
                            <td><strong><?php echo __('Tipo Funcionalidad'); ?></strong></td>
                            <td><?php echo $this->Html->link($functionality['FunctionalityType']['name'], array('controller' => 'functionality_types', 'action' => 'view', $functionality['FunctionalityType']['id']), array('class' => '')); ?>&nbsp;</td>
                        </tr>
                        <tr>
                            <td><strong><?php echo __('Creada'); ?></strong></td>
                            <td><?php echo h($functionality['Functionality']['created']); ?>&nbsp;</td>
                        </tr>
                        <tr>
                            <td><strong><?php echo __('Modificada'); ?></strong></td>
                            <td><?php echo h($functionality['Functionality']['modified']); ?>&nbsp;</td>
                        </tr>					
                    </tbody>
                </table>
            </div>
        </div>
        <div class="related">
            <h3><?php echo __('Roles asociados'); ?></h3>
            <?php if (!empty($functionality['Role'])): ?>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><?php echo __('Nombre'); ?></th>
                                <th><?php echo __('Descripción'); ?></th>
                                <th><?php echo __('Creado'); ?></th>
                                <th><?php echo __('Modificado'); ?></th>
                                <th class="actions"><?php echo __('Acciones'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0;
                                foreach ($functionality['Role'] as $role): ?>
                                <tr>
                                    <td><?php echo $role['name']; ?></td>
                                    <td><?php echo $role['description']; ?></td>
                                    <td><?php echo $role['created']; ?></td>
                                    <td><?php echo $role['modified']; ?></td>
                                    <td class="actions">
                                        <ul class="navigation">
                                            <li><a href="#"><?php echo $this->Html->image('tools.png')?></a>
                                                <ul class="level1">
                                                    <li><?php echo $this->Html->link(__('Ver'), array('controller' => 'roles', 'action' => 'view', $role['id']), array('class' => 'btn btn-default btn-xs')); ?></li>
                                                    <li><?php echo $this->Html->link(__('Editar'), array('controller' => 'roles', 'action' => 'edit', $role['id']), array('class' => 'btn btn-default btn-xs')); ?></li>
                                                    <li><?php echo $this->Form->postLink(__('Eliminar'), array('controller' => 'roles', 'action' => 'delete', $role['id']), array('class' => 'btn btn-default btn-xs'), __('Está seguro que desea eliminar el rol '.$role['name'].'?', $role['id'])); ?></li>
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
                <?php echo $this->Html->link('<i class="icon-plus icon-white"></i> ' . __('Nuevo Rol'), array('controller' => 'roles', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>
            </div>
        </div>
    </div>
</div>
<div class="form-group col-sm-3 col-sm-offset-5">
    <?php echo $this->Html->link('Regresar','/functionalities', array('class' => 'btn btn-large btn-primary')); ?>
</div>