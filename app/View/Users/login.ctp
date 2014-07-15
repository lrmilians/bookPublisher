<div id="page-container" class="row">
    <div id="page-content" class="col-sm-12">
        <h2><?php echo __(''); ?></h2>
        <div class="users form col-sm-3 col-sm-offset-4">	
            <?php echo $this->Session->flash('auth'); 
                  echo $this->Form->create('User', array('role' => 'form','action' => 'login')); ?>
                <fieldset>
                    <div class="form-group">
                        <?php echo $this->Form->input('username', array('label'=>'Usuario', 'class' => 'form-control')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('password', array('label'=>'Contraseña', 'class' => 'form-control')); ?>
                    </div>
                    <?php echo $this->Form->submit('Aceptar', array('class' => 'btn btn-large btn-primary col-sm-5 col-sm-offset-3')); ?>
                </fieldset>
            <?php echo $this->Form->end(); ?>
	</div>	
    </div>
</div>