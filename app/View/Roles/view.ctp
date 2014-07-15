<div id="page-container" class="row">
    <div id="page-content" class="col-sm-12">
        <div class="roles view">
            <h2><?php echo __('Datos del Rol'); ?></h2>
            <hr>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <tbody>
                        <tr>
                            <td><strong><?php echo __('Id'); ?></strong></td>
                            <td><?php echo h($role['Role']['id']); ?>&nbsp;</td>
                        </tr>
                        <tr>
                            <td><strong><?php echo __('Nombre'); ?></strong></td>
                            <td><?php echo h($role['Role']['name']); ?>&nbsp;</td>
                        </tr>
                        <tr>
                            <td><strong><?php echo __('Descripción'); ?></strong></td>
                            <td><?php echo h($role['Role']['description']); ?>&nbsp;</td>
                        </tr>
                        <tr>
                            <td><strong><?php echo __('Creado'); ?></strong></td>
                            <td><?php echo h($role['Role']['created']); ?>&nbsp;</td>
                        </tr>
                        <tr>
                            <td><strong><?php echo __('Modificado'); ?></strong></td>
                            <td><?php echo h($role['Role']['modified']); ?>&nbsp;</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    <div class="related">
        <h3><?php echo __('Usuarios asociados'); ?></h3>
        <?php if (!empty($role['User'])): ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th><?php echo __('Id'); ?></th>
                            <th><?php echo __('Usuario'); ?></th>
                            <th><?php echo __('Nombre'); ?></th>
                            <th><?php echo __('Activo'); ?></th>
                            <th><?php echo __('Rol'); ?></th>
                            <th><?php echo __('Creado'); ?></th>
                            <th><?php echo __('Modificado'); ?></th>
                            <th class="actions"><?php echo __('Acciones'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0;
                            foreach ($role['User'] as $user): ?>
                                <tr>
                                    <td><?php echo $user['id']; ?></td>
                                    <td><?php echo $user['username']; ?></td>
                                    <td><?php echo $user['name']; ?></td>
                                    <td><?php echo $user['active']; ?></td>
                                    <td><?php echo $user['role_id']; ?></td>
                                    <td><?php echo $user['created']; ?></td>
                                    <td><?php echo $user['modified']; ?></td>
                                    <td class="actions">
                                        <ul class="navigation">
                                            <li><a href="#"><?php echo $this->Html->image('tools.png')?></a>
                                                <ul class="level1">
                                                    <li><?php echo $this->Html->link(__('View'), array('controller' => 'users', 'action' => 'view', $user['id']), array('class' => 'btn btn-default btn-xs')); ?></li>
                                                    <li><?php echo $this->Html->link(__('Edit'), array('controller' => 'users', 'action' => 'edit', $user['id']), array('class' => 'btn btn-default btn-xs')); ?></li>
                                                    <li><?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users', 'action' => 'delete', $user['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $user['id'])); ?></li>
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
            <?php echo $this->Html->link('<i class="icon-plus icon-white"></i> ' . __('Nuevo Usuario'), array('controller' => 'users', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>
        </div>
    </div>
    <div class="related">
        <h3><?php echo __('Funcionalidades asociadas'); ?></h3>
        <?php if (!empty($role['Functionality'])): ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th><?php echo __('Id'); ?></th>
                            <th><?php echo __('Nombre'); ?></th>
                            <th><?php echo __('Activa'); ?></th>
                            <th><?php echo __('Url'); ?></th>
                            <th><?php echo __('Descripción'); ?></th>
                            <th><?php echo __('Parámetro'); ?></th>
                            <th><?php echo __('Creado'); ?></th>
                            <th><?php echo __('Modificado'); ?></th>
                            <th><?php echo __('Tipo Funcionalidad'); ?></th>
                            <th class="actions"><?php echo __('Acciones'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0;
                            foreach ($role['Functionality'] as $functionality): ?>
                                <tr>
                                    <td><?php echo $functionality['id']; ?></td>
                                    <td><?php echo $functionality['name']; ?></td>
                                    <td><?php echo $functionality['active']; ?></td>
                                    <td><?php echo $functionality['url']; ?></td>
                                    <td><?php echo $functionality['description']; ?></td>
                                    <td><?php echo $functionality['param']; ?></td>
                                    <td><?php echo $functionality['created']; ?></td>
                                    <td><?php echo $functionality['modified']; ?></td>
                                    <td><?php echo $functionality['functionality_type_id'] ?></td>
                                    <td class="actions">
                                        <ul class="navigation">
                                            <li><a href="#"><?php echo $this->Html->image('tools.png')?></a>
                                                <ul class="level1">
                                                    <li><?php echo $this->Html->link(__('Ver'), array('controller' => 'functionalities', 'action' => 'view', $functionality['id']), array('class' => 'btn btn-default btn-xs')); ?></li>
                                                    <li><?php echo $this->Html->link(__('Editar'), array('controller' => 'functionalities', 'action' => 'edit', $functionality['id']), array('class' => 'btn btn-default btn-xs')); ?></li>
                                                    <li><?php echo $this->Form->postLink(__('Eliminar'), array('controller' => 'functionalities', 'action' => 'delete', $functionality['id']), array('class' => 'btn btn-default btn-xs'), __('Está seguro que desea eliminar la funcionalidad ' . $functionality['name'] . '?', $functionality['id'])); ?></li>
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
    <?php echo $this->Html->link('Regresar','/roles', array('class' => 'btn btn-large btn-primary')); ?>
</div>