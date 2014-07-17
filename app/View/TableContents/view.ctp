<div id="page-container" class="row">	
    <div id="page-content" class="col-sm-12">
        <div class="tableContents view">
            <h2><?php  echo __('Contenido'); ?></h2>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>
                            <td><strong><?php echo __('Contenido'); ?></strong></td>
                            <td><?php echo h($tableContent['TableContent']['content']); ?>&nbsp;</td>
                        </tr>
                        <tr>
                            <td><strong><?php echo __('Nivel'); ?></strong></td>
                            <td><?php echo h($tableContent['TableContent']['level']); ?>&nbsp;</td>
                        </tr>
                        <tr>
                            <td><strong><?php echo __('Orden'); ?></strong></td>
                            <td><?php echo h($tableContent['TableContent']['order']); ?>&nbsp;</td>
                        </tr>
                        <tr>
                            <td><strong><?php echo __('Libro'); ?></strong></td>
                            <td><?php echo $this->Html->link($tableContent['Book']['title'], array('controller' => 'books', 'action' => 'view', $tableContent['Book']['id']), array('class' => '')); ?>&nbsp;</td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group col-sm-3 col-sm-offset-5">
                    <?php echo $this->Html->link('Regresar','/table_contents', array('class' => 'btn btn-large btn-primary')); ?>    
                </div>
            </div>
        </div>		
    </div>
</div>
