<div class="panel-heading">
    <h3 class="panel-title">
        <a href="javascript:void(0);" class="toggle-sidebar">
            <span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a>
        <?php echo __('Add Provider'); ?>    </h3>
</div>
<div class="panel-body">
    <div class="col-md-12">
        <ul class="nav nav-pills nav-justified">
            <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Providers'), array('action' => 'index'), array('escape' => false)); ?></li>
            <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Products'), array('controller' => 'products', 'action' => 'index'), array('escape' => false)); ?> </li>
            <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Product'), array('controller' => 'products', 'action' => 'add'), array('escape' => false)); ?> </li>
        </ul>
    </div>
    <div class="col-md-12">
        <?php echo $this->Form->create('Provider', array('role' => 'form')); ?>

        <div class="form-group">
            <?php echo $this->Form->input('name', array('class' => 'form-control', 'placeholder' => 'Name')); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
        </div>

        <?php echo $this->Form->end() ?>


    </div>
</div>

