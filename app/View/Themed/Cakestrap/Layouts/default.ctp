<?php $cakeDescription = __d('cake_dev', 'Editorial Libros'); ?>
<?php echo $this->Html->docType('html5'); ?> 
<html>
    <head>
        <?php echo $this->Html->charset(); ?>
        <title><?php echo $cakeDescription ?>: </title>
        <?php echo $this->Html->meta('icon',$this->Html->url('/img/favicon.png'));
        echo $this->fetch('meta');

        echo $this->Html->css('bootstrap');
        echo $this->Html->css('main');
        echo $this->Html->css('jquery-ui-1.11.0.min');
        echo $this->Html->css('cssCustom');
        echo $this->fetch('css');
        
        echo $this->Html->script('libs/jquery-1.10.2.min'); 
        echo $this->Html->script('libs/jquery-ui-1.11.0.min');
        echo $this->Html->script('libs/jquery.mjs.nestedSortable');
        echo $this->Html->script('libs/bootstrap.min');
        echo $this->Html->script('jsCustom.js');
        echo $this->fetch('script');
        ?>
    </head>
    <body>
        <div id="main-container">
            <div id="header" class="container">
               <?php if($this->Session->check('Auth.User')){
                    echo $this->element('menu/top_menu'); 
               } else {
                   echo $this->element('menu/top_menu_start'); 
               }?>
            </div>
            <div id="content" class="container">
                <?php echo $this->Session->flash(); ?>
                <?php echo $this->fetch('content'); ?>
            </div>
            <div id="footer" class="container"></div>	
        </div>
        <div class="container">
            <div class="well well-sm">
                <small><?php echo $this->element('sql_dump'); ?></small>
            </div>
        </div>
        <?php echo $this->Js->writeBuffer();?>
    </body>
</html>