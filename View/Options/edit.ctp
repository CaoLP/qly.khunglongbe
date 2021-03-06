<div class="panel-heading">
    <h3 class="panel-title">
        <a href="javascript:void(0);" class="toggle-sidebar">
            <span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a>
        <?php echo __('Edit Option'); ?>    </h3>
</div>
<div class="panel-body">
    <div class="col-md-12">
        <ul class="nav nav-pills nav-justified">
            <li><?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>' . __('Delete'), array('action' => 'delete', $this->Form->value('Option.id')), array('escape' => false), __('Are you sure you want to delete # %s?', $this->Form->value('Option.id'))); ?></li>
            <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Options'), array('action' => 'index'), array('escape' => false)); ?></li>
            <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Option Groups'), array('controller' => 'option_groups', 'action' => 'index'), array('escape' => false)); ?> </li>
            <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Option Group'), array('controller' => 'option_groups', 'action' => 'add'), array('escape' => false)); ?> </li>
        </ul>
    </div>
    <div class="col-md-12">
        <?php echo $this->Form->create('Option', array('role' => 'form')); ?>

        <div class="form-group">
            <?php echo $this->Form->input('id', array('class' => 'form-control', 'placeholder' => 'Id')); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('name', array('class' => 'form-control', 'placeholder' => 'Name')); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('option_group_id', array('class' => 'form-control', 'placeholder' => __('Option group'))); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('option_cat_id', array('options' => $option_cats,'class' => 'form-control','placeholder' => __('Category name'))); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('parent_id', array('class' => 'form-control', 'empty'=>__('__Select parent__'),'placeholder' => 'Parent Option Id')); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('other', array('class' => 'form-control', 'placeholder' => 'Other')); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
        </div>

        <?php echo $this->Form->end() ?>
    </div>
</div>

