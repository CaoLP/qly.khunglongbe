<nav role="navigation" class="navbar navbar-custom">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button data-target="#bs-content-row-navbar-collapse-5" data-toggle="collapse" class="navbar-toggle" type="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="/" class="navbar-brand"><?php echo Configure::read('Site.title')?></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div id="bs-content-row-navbar-collapse-5" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo $this->Html->url(array('controller'=>'pages','action'=>'use_debug'))?>">
                    <?php
                    if($this->Session->check('use_debug') && $this->Session->read('use_debug')){
                        echo 'Disable Debug';
                    }else{
                        echo 'Debug';
                    }
                    ?>

                    </a></li>
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#"><?php echo AuthComponent::user()['name'];?> <b class="caret"></b></a>
                    <ul role="menu" class="dropdown-menu">
                        <li class="dropdown-header"><?php echo AuthComponent::user()['name'];?></li>
                        <li><a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'edit',AuthComponent::user()['id']));?>"><?php echo __('Edit account')?></a></li>
                        <li class="divider"></li>
                        <li class=""><a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'logout'));?>"><?php echo __('Sign out')?></a></li>
                    </ul>
                </li>
            </ul>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>