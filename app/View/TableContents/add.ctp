<div id="page-container" class="row">
    <div id="page-content" class="col-sm-9">
        <h2><?php echo __('Adicionar Contenido'); ?></h2>
        <div class="tableContents form">
            <?php echo $this->Form->create('TableContent', array('role' => 'form')); ?>
                <fieldset>
                    <div class="form-group col-sm-6">
                        <div class="form-group">
                            <?php echo $this->Form->input('content', array('label' => 'Contenido *', 'class' => 'form-control')); ?>
                        </div>
                    </div>
                    <div class="form-group col-sm-6">
                        <div class="form-group">
                            <?php echo $this->Form->input('book_id', array('label' => 'Libro', 'class' => 'form-control')); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('parent_id', array('label' => 'Contenido Padre', 'class' => 'form-control')); ?>
                        </div>
                       <?php $this->Js->get('#TableContentBookId')->event(
                            'change',
                            $this->Js->request(
                                array('controller' => 'TableContents', 'action' => 'getContentByBook'),
                                array(
                                    'update' => '#TableContentParentId',
                                    'async' => true,
                                    'dataExpression' => true,
                                    'method' => 'post',
                                    'data' => $this->Js->serializeForm(array('isForm' => true, 'inline' => true))
                                )
                            )
                        );?>
                    </div>
                    <div class="form-group col-sm-12">
                        <div class="form-group col-sm-3 col-sm-offset-4">
                            <?php echo $this->Form->submit('Aceptar', array('class' => 'btn btn-large btn-primary')); ?>
                        </div>   
                        <div class="form-group col-sm-3" >
                            <?php echo $this->Html->link('Cancelar','/table_contents', array('class' => 'btn btn-large btn-danger')); ?>
                        </div>     
                    </div>
                </fieldset>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
</div>