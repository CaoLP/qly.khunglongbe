<div class="panel-heading">
    <h3 class="panel-title">
        <a href="javascript:void(0);" class="toggle-sidebar">
            <span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a>
        <?php echo __('Edit Admin Menu'); ?>    </h3>
</div>
<div class="panel-body">
    <div class="col-md-12">
        <ul class="nav nav-pills nav-justified">
            <li><?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>'.__('Delete'), array('action' => 'delete', $this->Form->value('AdminMenu.id')), array('escape' => false), __('Are you sure you want to delete # %s?', $this->Form->value('AdminMenu.id'))); ?></li>
            <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>'.__('List Admin Menus'), array('action' => 'index'), array('escape' => false)); ?></li>
            <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>'.__('List Admin Menus'), array('controller' => 'admin_menus', 'action' => 'index'), array('escape' => false)); ?> </li>
            <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>'.__('New Parent Admin Menu'), array('controller' => 'admin_menus', 'action' => 'add'), array('escape' => false)); ?> </li>
        </ul>
    </div>
    <div class="col-md-12">
        <?php echo $this->Form->create('AdminMenu', array('role' => 'form')); ?>

        <div class="form-group">
            <?php echo $this->Form->input('id', array('class' => 'form-control', 'placeholder' => 'Id')); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('name', array('class' => 'form-control', 'placeholder' => 'Name')); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('icon', array('class' => 'form-control', 'placeholder' => 'Icon')); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('url', array('class' => 'form-control', 'placeholder' => 'Url', 'options' => $listUrls, 'empty' => '___SELECT PATH___')); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('parent_id', array('class' => 'form-control', 'placeholder' => 'Parent Id', 'empty' =>'__Parents__')); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
        </div>

        <?php echo $this->Form->end() ?>


    </div>
</div>

