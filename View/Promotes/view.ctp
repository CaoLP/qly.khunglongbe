<div class="panel-heading">
    <h3 class="panel-title">
        <a href="javascript:void(0);" class="toggle-sidebar">
            <span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a>
        <?php echo __('Promote'); ?>    </h3>
</div>
<div class="panel-body">
    <div class="col-md-12">
        <ul class="nav nav-pills nav-justified">
            		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>'.__('Edit Promote'), array('action' => 'edit', $promote['Promote']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>'.__('Delete Promote'), array('action' => 'delete', $promote['Promote']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $promote['Promote']['id'])); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>'.__('List Promotes'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>'.__('New Promote'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>'.__('List Stores'), array('controller' => 'stores', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>'.__('New Store'), array('controller' => 'stores', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>'.__('List Users'), array('controller' => 'users', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>'.__('New Trackable Creator'), array('controller' => 'users', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>'.__('List Order Details'), array('controller' => 'order_details', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>'.__('New Order Detail'), array('controller' => 'order_details', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>'.__('List Orders'), array('controller' => 'orders', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>'.__('New Order'), array('controller' => 'orders', 'action' => 'add'), array('escape' => false)); ?> </li>

        </ul>
    </div>
    <div class="col-md-12">
        <table cellpadding="0" cellspacing="0" class="table table-striped">
            <tbody>
            <tr>
		<th><?php echo __('Id'); ?></th>
		<td>
			<?php echo h($promote['Promote']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Name'); ?></th>
		<td>
			<?php echo h($promote['Promote']['name']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Code'); ?></th>
		<td>
			<?php echo h($promote['Promote']['code']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Value'); ?></th>
		<td>
			<?php echo h($promote['Promote']['value']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Type'); ?></th>
		<td>
			<?php echo h($promote['Promote']['type']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Begin'); ?></th>
		<td>
			<?php echo h($promote['Promote']['begin']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('End'); ?></th>
		<td>
			<?php echo h($promote['Promote']['end']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Created'); ?></th>
		<td>
			<?php echo h($promote['Promote']['created']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Trackable Creator'); ?></th>
		<td>
			<?php echo $this->Html->link($promote['TrackableCreator']['name'], array('controller' => 'users', 'action' => 'view', $promote['TrackableCreator']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Updated'); ?></th>
		<td>
			<?php echo h($promote['Promote']['updated']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Trackable Updater'); ?></th>
		<td>
			<?php echo $this->Html->link($promote['TrackableUpdater']['name'], array('controller' => 'users', 'action' => 'view', $promote['TrackableUpdater']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Status'); ?></th>
		<td>
			<?php echo h($promote['Promote']['status']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Store'); ?></th>
		<td>
			<?php echo $this->Html->link($promote['Store']['name'], array('controller' => 'stores', 'action' => 'view', $promote['Store']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Global'); ?></th>
		<td>
			<?php echo h($promote['Promote']['global']); ?>
			&nbsp;
		</td>
</tr>
            </tbody>
        </table>

    </div>

            <div class="related row">
            <div class="col-md-12">
                <h3><?php echo __('Related Order Details'); ?></h3>
                <?php if (!empty($promote['OrderDetail'])): ?>
                <table cellpadding = "0" cellspacing = "0" class="table table-striped">
                    <thead>
                    <tr>
                        		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Order Id'); ?></th>
		<th><?php echo __('Product Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Price'); ?></th>
		<th><?php echo __('Sku'); ?></th>
		<th><?php echo __('Qty'); ?></th>
		<th><?php echo __('Promote Id'); ?></th>
		<th><?php echo __('Promote Value'); ?></th>
		<th><?php echo __('Promote Type'); ?></th>
		<th><?php echo __('Product Options'); ?></th>
		<th><?php echo __('Code'); ?></th>
		<th><?php echo __('Data'); ?></th>
                        <th class="actions"></th>
                    </tr>
                    <thead>
                    <tbody>
                    	<?php foreach ($promote['OrderDetail'] as $orderDetail): ?>
		<tr>
			<td><?php echo $orderDetail['id']; ?></td>
			<td><?php echo $orderDetail['order_id']; ?></td>
			<td><?php echo $orderDetail['product_id']; ?></td>
			<td><?php echo $orderDetail['name']; ?></td>
			<td><?php echo $orderDetail['price']; ?></td>
			<td><?php echo $orderDetail['sku']; ?></td>
			<td><?php echo $orderDetail['qty']; ?></td>
			<td><?php echo $orderDetail['promote_id']; ?></td>
			<td><?php echo $orderDetail['promote_value']; ?></td>
			<td><?php echo $orderDetail['promote_type']; ?></td>
			<td><?php echo $orderDetail['product_options']; ?></td>
			<td><?php echo $orderDetail['code']; ?></td>
			<td><?php echo $orderDetail['data']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('controller' => 'order_details', 'action' => 'view', $orderDetail['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('controller' => 'order_details', 'action' => 'edit', $orderDetail['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('controller' => 'order_details', 'action' => 'delete', $orderDetail['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $orderDetail['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
                    </tbody>
                </table>
                <?php endif; ?>

                <div class="actions">
                    <?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>'.__('New Order Detail'), array('controller' => 'order_details', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?>                </div>
            </div><!-- end col md 12 -->
        </div>
            <div class="related row">
            <div class="col-md-12">
                <h3><?php echo __('Related Orders'); ?></h3>
                <?php if (!empty($promote['Order'])): ?>
                <table cellpadding = "0" cellspacing = "0" class="table table-striped">
                    <thead>
                    <tr>
                        		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Code'); ?></th>
		<th><?php echo __('Customer Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Store Id'); ?></th>
		<th><?php echo __('Promote Id'); ?></th>
		<th><?php echo __('Promote Type'); ?></th>
		<th><?php echo __('Promote Value'); ?></th>
		<th><?php echo __('Basic Total'); ?></th>
		<th><?php echo __('Total'); ?></th>
		<th><?php echo __('Total Promote'); ?></th>
		<th><?php echo __('Amount'); ?></th>
		<th><?php echo __('Receive'); ?></th>
		<th><?php echo __('Refund'); ?></th>
		<th><?php echo __('Ship'); ?></th>
		<th><?php echo __('Ship Increment Price'); ?></th>
		<th><?php echo __('Ship Name'); ?></th>
		<th><?php echo __('Ship Address'); ?></th>
		<th><?php echo __('Ship Address Alt'); ?></th>
		<th><?php echo __('Ship District'); ?></th>
		<th><?php echo __('Ship City'); ?></th>
		<th><?php echo __('Ship Phone'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Created By'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th><?php echo __('Updated By'); ?></th>
                        <th class="actions"></th>
                    </tr>
                    <thead>
                    <tbody>
                    	<?php foreach ($promote['Order'] as $order): ?>
		<tr>
			<td><?php echo $order['id']; ?></td>
			<td><?php echo $order['code']; ?></td>
			<td><?php echo $order['customer_id']; ?></td>
			<td><?php echo $order['user_id']; ?></td>
			<td><?php echo $order['store_id']; ?></td>
			<td><?php echo $order['promote_id']; ?></td>
			<td><?php echo $order['promote_type']; ?></td>
			<td><?php echo $order['promote_value']; ?></td>
			<td><?php echo $order['basic_total']; ?></td>
			<td><?php echo $order['total']; ?></td>
			<td><?php echo $order['total_promote']; ?></td>
			<td><?php echo $order['amount']; ?></td>
			<td><?php echo $order['receive']; ?></td>
			<td><?php echo $order['refund']; ?></td>
			<td><?php echo $order['ship']; ?></td>
			<td><?php echo $order['ship_increment_price']; ?></td>
			<td><?php echo $order['ship_name']; ?></td>
			<td><?php echo $order['ship_address']; ?></td>
			<td><?php echo $order['ship_address_alt']; ?></td>
			<td><?php echo $order['ship_district']; ?></td>
			<td><?php echo $order['ship_city']; ?></td>
			<td><?php echo $order['ship_phone']; ?></td>
			<td><?php echo $order['status']; ?></td>
			<td><?php echo $order['created']; ?></td>
			<td><?php echo $order['created_by']; ?></td>
			<td><?php echo $order['updated']; ?></td>
			<td><?php echo $order['updated_by']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('controller' => 'orders', 'action' => 'view', $order['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('controller' => 'orders', 'action' => 'edit', $order['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('controller' => 'orders', 'action' => 'delete', $order['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $order['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
                    </tbody>
                </table>
                <?php endif; ?>

                <div class="actions">
                    <?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>'.__('New Order'), array('controller' => 'orders', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?>                </div>
            </div><!-- end col md 12 -->
        </div>
    
</div>

