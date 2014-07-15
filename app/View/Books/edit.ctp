<div id="page-container" class="row">	
    <div id="page-content" class="col-sm-12">
        <h2><?php echo __('Editar Libro'); ?></h2>
        <div class="books form">
            <?php echo $this->Form->create('Book', array('role' => 'form')); ?>
                <fieldset>
                    <div class="form-group col-sm-12">
                        <div class="form-group">
                            <?php echo $this->Form->input('id', array('class' => 'form-control')); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('title', array('label' => 'Título *', 'class' => 'form-control')); ?>
                        </div>
                    </div>
                    <div class="form-group col-sm-12">
                        <div class="form-group col-sm-3 col-sm-offset-4">
                            <?php echo $this->Form->submit('Aceptar', array('class' => 'btn btn-large btn-primary')); ?>
                        </div>   
                        <div class="form-group col-sm-3" >
                            <?php echo $this->Html->link('Cancelar','/books', array('class' => 'btn btn-large btn-danger')); ?>
                        </div>     
                    </div>
                </fieldset>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
</div>