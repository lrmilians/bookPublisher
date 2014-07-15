<nav class="navbar navbar-default" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
        </button>
        <?php echo $this->Html->Link('Editorial', '/users/welcome', array('class' => 'navbar-brand')); ?>
    </div>
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav">
            <?php $functionality = $this->Session->read('Functionalities');
                  $functionalityType = array();

                    foreach ( $functionality['0']['Functionality'] as $value ) {
                        if (!in_array($value['FunctionalityType']['name'], $functionalityType)){
                           $functionalityType[$value['FunctionalityType']['id']] = $value['FunctionalityType']['name'];
                        }
                    }
                    foreach ( $functionalityType as $key => $value ) { 
                       echo('<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">'.$value.'
                                <b class="caret"></b>   </a><ul class="dropdown-menu">');
                             foreach ( $functionality['0']['Functionality'] as $value ){
                                    if ( $value['FunctionalityType']['id'] == $key) {
                                        if ($value['id'] == 10 || $value['id'] == 11 || $value['id'] == 12)
                                            echo ('<li>'.$this->Html->link( $value['name'], $value['url'].$this->Session->read('Auth.User.id')).'</li>');
                                        else
                                            echo ('<li>'.$this->Html->link( $value['name'], $value['url'] ).'</li>');
                                    }
                            }
                        echo ('</ul></li>');
                    } ?>
            <li><?php  echo $this->Html->link( "Cerrar sesión",   array('controller'=>'users', 'action'=>'logout') );?></li>
            <!--<li><a href="#">Link</a></li>
            <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li><a href="#">Separated link</a></li>
                            <li><a href="#">One more separated link</a></li>
                    </ul>
            </li>-->
        </ul><!-- /.nav navbar-nav -->
        <div class="user role">
            <?php echo $this->Session->read('Auth.User.Role.name').': &nbsp;'.$this->Session->read('Auth.User.name');?>
        </div>
        <div class="user dateTopMenu">
            <?php echo date('d/m/Y').'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.date('H:i'); //('Usuario: '.$this->Session->read('Auth.User.name'));?>
        </div>
    </div>
</nav>