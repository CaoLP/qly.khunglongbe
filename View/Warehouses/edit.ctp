<div class="panel-heading">
    <h3 class="panel-title">
        <a href="javascript:void(0);" class="toggle-sidebar">
            <span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a>
        <?php echo __('Edit Warehouse'); ?>    </h3>
</div>
<div class="panel-body">
    <div class="col-md-12">
        <ul class="nav nav-pills nav-justified">
            <li><?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>' . __('Delete'), array('action' => 'delete', $this->Form->value('Warehouse.id')), array('escape' => false), __('Are you sure you want to delete # %s?', $this->Form->value('Warehouse.id'))); ?></li>
            <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Warehouses'), array('action' => 'index'), array('escape' => false)); ?></li>
            <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Stores'), array('controller' => 'stores', 'action' => 'index'), array('escape' => false)); ?> </li>
            <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Store'), array('controller' => 'stores', 'action' => 'add'), array('escape' => false)); ?> </li>
            <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Products'), array('controller' => 'products', 'action' => 'index'), array('escape' => false)); ?> </li>
            <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Product'), array('controller' => 'products', 'action' => 'add'), array('escape' => false)); ?> </li>
            <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Users'), array('controller' => 'users', 'action' => 'index'), array('escape' => false)); ?> </li>
            <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Trackable Creator'), array('controller' => 'users', 'action' => 'add'), array('escape' => false)); ?> </li>
        </ul>
    </div>
    <div class="col-md-12">
        <?php echo $this->Form->create('Warehouse', array('role' => 'form')); ?>

        <div class="form-group">
            <?php echo $this->Form->input('id', array('class' => 'form-control', 'placeholder' => 'Id')); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('store_id', array('class' => 'form-control', 'placeholder' => 'Store Id')); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('product_id', array('class' => 'form-control', 'placeholder' => 'Product Id')); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('price', array('class' => 'form-control currency', 'placeholder' => __('Price'), 'type'=>'text')); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('retail_price', array('class' => 'form-control currency', 'placeholder' => __('Retail Price'), 'type'=>'text')); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('qty', array('class' => 'form-control', 'placeholder' => 'Qty', 'type'=>'text')); ?>
        </div>
        <div class="form-group">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo __('Options') ?></div>
                <div class="panel-body">
                    <?php foreach ($product_options as $key => $opt_gr) {
                        ?>
                        <h4><?php echo $key ?></h4>
                        <?php
                        foreach ($opt_gr as $s_key => $opt) {
                            ?>
                            <div class="list-option">
                                <div class="radio">
                                    <input type="radio"
                                        <?php
                                        foreach ($this->request->data['WarehouseOption'] as $op) {
                                            if ($op['option_id'] == $s_key) echo 'checked';
                                            else
                                                echo '';
                                        }
                                        ?>
                                           name="data[WarehouseOption][<?php echo $opt['Option']['option_group_id']?>][]"
                                        <?php if(!empty($opt['Option']['parent_id'])) echo ' disabled="true" class="parent-'.$opt['Option']['parent_id'].'" ';
                                        else echo ' class="option-checkbox" '
                                        ?>
                                           id="flat-radio-<?php echo $s_key; ?>" value="<?php echo $s_key; ?>">
                                    <label for="flat-radio-<?php echo $s_key; ?>"><?php echo $opt['Option']['name'] ?></label>
                                </div>
                            </div>
                        <?php
                        }
                    } ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
        </div>

        <?php echo $this->Form->end() ?>


    </div>
</div>

