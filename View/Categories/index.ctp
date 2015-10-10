<div class="panel-heading">
    <h3 class="panel-title">
        <a href="javascript:void(0);" class="toggle-sidebar">
            <span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a>
        <?php echo __('Categories'); ?>    </h3>
</div>
<div class="panel-body">
    <div class="col-md-12">
        <ul class="nav nav-pills nav-justified">
            <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>'.__('New Category'), array('action' => 'add'), array('escape' => false)); ?></li>
            <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>'.__('List Categories'), array('controller' => 'categories', 'action' => 'index'), array('escape' => false)); ?> </li>
            <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>'.__('New Parent Category'), array('controller' => 'categories', 'action' => 'add'), array('escape' => false)); ?> </li>
            <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>'.__('List Users'), array('controller' => 'users', 'action' => 'index'), array('escape' => false)); ?> </li>
            <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>'.__('New Trackable Creator'), array('controller' => 'users', 'action' => 'add'), array('escape' => false)); ?> </li>
            <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>'.__('List Products'), array('controller' => 'products', 'action' => 'index'), array('escape' => false)); ?> </li>
            <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>'.__('New Product'), array('controller' => 'products', 'action' => 'add'), array('escape' => false)); ?> </li>
        </ul>
    </div>
    <div class="col-md-12">
        <?php echo $this->Session->flash(); ?>
        <?php echo $this->Menu->gennerateChildList_TH($categories, array('icon', 'name', 'slug'), array('Icon', 'Name', 'Slug'));?>
    </div>
</div>

