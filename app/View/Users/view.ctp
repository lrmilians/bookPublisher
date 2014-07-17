<div id="page-container" class="row">
    <div id="page-content" class="col-sm-12">
        <div class="users view">
            <h2><?php echo __('Datos Usuario'); ?></h2>
            <hr>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <tbody>
                        <tr>
                            <td><strong><?php echo __('Nombre usuario'); ?></strong></td>
                            <td><?php echo h($user['User']['username']); ?></td>
                        </tr>
                        <tr>
                            <td><strong><?php echo __('Nombre completo'); ?></strong></td>
                            <td><?php echo h($user['User']['name']); ?></td>
                        </tr>
                        <tr>
                            <td><strong><?php echo __('Email'); ?></strong></td>
                            <td><?php echo h($user['User']['email']); ?></td>
                        </tr>
                        <tr>
                            <td><strong><?php echo __('Dirección'); ?></strong></td>
                            <td><?php echo h($user['User']['address']); ?></td>
                        </tr>
                        <tr>
                            <td><strong><?php echo __('Cédula'); ?></strong></td>
                            <td><?php echo h($user['User']['ci']); ?></td>
                        </tr>
                        <tr>
                            <td><strong><?php echo __('RUC'); ?></strong></td>
                            <td><?php echo h($user['User']['ruc']); ?></td>
                        </tr>
                        <tr>
                            <td><strong><?php echo __('Teléfono'); ?></strong></td>
                            <td><?php echo h($user['User']['phone']); ?></td>
                        </tr>
                        <tr>
                            <td><strong><?php echo __('Celular'); ?></strong></td>
                            <td><?php echo h($user['User']['cell']); ?></td>
                        </tr>
                        <tr>
                            <td><strong><?php echo __('Activo'); ?></strong></td>
                            <td><?php echo h($user['User']['active']); ?></td>
                        </tr>
                        <tr>
                            <td><strong><?php echo __('Rol'); ?></strong></td>
                            <td><?php echo h($user['Role']['name']); ?></td>
                        </tr>
                        <tr>
                            <td><strong><?php echo __('Creado'); ?></strong></td>
                            <td><?php echo h($user['User']['created']); ?></td>
                        </tr>
                        <tr>
                            <td><strong><?php echo __('Modificado'); ?></strong></td>
                            <td><?php echo h($user['User']['modified']); ?></td>
                        </tr>					
                    </tbody>
                </table>
                <div class="form-group col-sm-3 col-sm-offset-5">
                    <?php echo $this->Html->link('Regresar','/users', array('class' => 'btn btn-large btn-primary')); ?>
                </div>   
            </div>
        </div>
    </div>
</div>
