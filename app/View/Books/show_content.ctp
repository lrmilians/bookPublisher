<div id="page-container" class="row">
    <div id="page-content" class="col-sm-12">
        <div class="books view col-sm-12">
            <h2><?php  echo __('Temas del libro '.$book['Book']['title']); ?></h2>
            <div class="table-responsive">
                <section id="demo">
                    <ol class="sortable ui-sortable">
                         <?php $this->requestAction('/books/loadTable/'.$bookId.'/'.'0'); ?>
                    </ol>
                </section>  
                <div class="form-group col-sm-12">
                    <div class="form-group col-sm-3 col-sm-offset-4">
                        <?php 
                            if (!$this->Session->read('haveContent')) {
                                echo $this->Html->link('Adicionar contenido','/table_contents/add', array('class' => 'btn btn-large btn-primary'));
                            } else { 
                                echo $this->Form->button('Actualizar contenidos', array('class' => 'btn btn-large btn-primary','onclick'=>'updateContent()'));
                            }   
                        ?>
                    </div>   
                    <div class="form-group col-sm-3" >
                        <?php echo $this->Html->link('Regresar','/books', array('class' => 'btn btn-large btn-danger')); ?>
                    </div>     
                </div>
            </div>
        </div>
    </div>
</div>
