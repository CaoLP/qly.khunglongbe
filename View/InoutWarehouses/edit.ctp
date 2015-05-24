<div class="panel-heading">
    <h3 class="panel-title">
        <a href="javascript:void(0);" class="toggle-sidebar">
            <span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a>
        <?php echo __('Edit Inout Warehouse'); ?>    </h3>
</div>
<div class="panel-body">
    <div class="col-md-12">
        <ul class="nav nav-pills nav-justified">
                            <li><?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>'.__('Delete'), array('action' => 'delete', $this->Form->value('InoutWarehouse.id')), array('escape' => false), __('Are you sure you want to delete # %s?', $this->Form->value('InoutWarehouse.id'))); ?></li>
                        <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>'.__('List Inout Warehouses'), array('action' => 'index'), array('escape' => false)); ?></li>
            		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>'.__('List Stores'), array('controller' => 'stores', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>'.__('New Store'), array('controller' => 'stores', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>'.__('List Users'), array('controller' => 'users', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>'.__('New Trackable Creator'), array('controller' => 'users', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>'.__('List Inout Warehouse Details'), array('controller' => 'inout_warehouse_details', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>'.__('New Inout Warehouse Detail'), array('controller' => 'inout_warehouse_details', 'action' => 'add'), array('escape' => false)); ?> </li>
        </ul>
    </div>
    <div class="col-md-12">
        			<?php echo $this->Form->create('InoutWarehouse', array('role' => 'form')); ?>

        				<div class="form-group">
					<?php echo $this->Form->input('id', array('class' => 'form-control', 'placeholder' => 'Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('note', array('class' => 'form-control', 'placeholder' => 'Note'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('receive_note', array('class' => 'form-control', 'placeholder' => 'Receive Note'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('store_id', array('class' => 'form-control', 'placeholder' => 'Store Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('total', array('class' => 'form-control', 'placeholder' => 'Total'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('status', array('class' => 'form-control', 'placeholder' => 'Status'));?>
				</div>
        				<div class="form-group">
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>


    </div>
</div>

