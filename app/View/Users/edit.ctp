<div id="page-container" class="row">
    <div id="page-content" class="col-sm-12">
        <h2><?php echo __('Editar Usuario'); ?></h2>
        <hr>
        <div class="users form">
            <?php echo $this->Form->create('User', array('role' => 'form')); ?>
                <fieldset>
                    <div class="form-group col-sm-12">
                        <?php echo $this->Form->input('id', array('class' => 'form-control')); ?>
                    </div>
                    <div class="form-group col-sm-6">
                        <div class="form-group">
                            <?php echo $this->Form->input('username', array('readonly' => 'readonly', 'label' => 'El nombre de usuario no se puede cambiar!', 'class' => 'form-control')); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('name', array('label' => 'Nombre completo *', 'class' => 'form-control')); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('ci', array('label' => 'Cédula *', 'class' => 'form-control')); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('ruc', array('label' => 'RUC *', 'class' => 'form-control')); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('address', array('label' => 'Dirección *', 'class' => 'form-control')); ?>
                        </div>
                    </div>
                    <div class="form-group col-sm-6">
                        <div class="form-group">
                            <?php echo $this->Form->input('email', array('label' => 'Correo electrónico *', 'class' => 'form-control')); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('phone', array('label' => 'Teléfono', 'class' => 'form-control')); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('cell', array('label' => 'Celular', 'class' => 'form-control')); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('password_update', array('label' => 'Nueva Contraseña (dejar en blanco si no desea cambiar)', 'maxLength' => 255, 'type' => 'password', 'required' => 0, 'class' => 'form-control')); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('password_confirm_update', array('label' => 'Confirmar Nueva Contraseña*', 'maxLength' => 255, 'title' => 'Confirm New password', 'type' => 'password', 'required' => 0, 'class' => 'form-control')); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('role_id', array('label' => 'Rol', 'class' => 'form-control')); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('active', array('label' => 'Activo')); ?>
                        </div>
                    </div>
                    <div class="form-group col-sm-12">
                        <div class="form-group col-sm-3 col-sm-offset-4">
                            <?php echo $this->Form->submit('Aceptar', array('class' => 'btn btn-large btn-primary')); ?>
                        </div>   
                        <div class="form-group col-sm-3" >
                            <?php echo $this->Html->link('Cancelar','/users', array('class' => 'btn btn-large btn-danger')); ?>
                        </div>     
                    </div>
                </fieldset>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
</div>