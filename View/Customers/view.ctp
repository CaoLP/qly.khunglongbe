<div class="panel-heading">
    <h3 class="panel-title">
        <a href="javascript:void(0);" class="toggle-sidebar">
            <span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a>
        <?php echo __('Customer'); ?>    </h3>
</div>
<div class="panel-body">
    <div class="col-md-12">
        <ul class="nav nav-pills nav-justified">
            		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>'.__('Edit Customer'), array('action' => 'edit', $customer['Customer']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>'.__('Delete Customer'), array('action' => 'delete', $customer['Customer']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $customer['Customer']['id'])); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>'.__('List Customers'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>'.__('New Customer'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>'.__('List Users'), array('controller' => 'users', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>'.__('New Trackable Creator'), array('controller' => 'users', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>'.__('List Customer Promotes'), array('controller' => 'customer_promotes', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>'.__('New Customer Promote'), array('controller' => 'customer_promotes', 'action' => 'add'), array('escape' => false)); ?> </li>
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
			<?php echo h($customer['Customer']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Name'); ?></th>
		<td>
			<?php echo h($customer['Customer']['name']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Phone'); ?></th>
		<td>
			<?php echo h($customer['Customer']['phone']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Email'); ?></th>
		<td>
			<?php echo h($customer['Customer']['email']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Facebook'); ?></th>
		<td>
			<?php echo h($customer['Customer']['facebook']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Address'); ?></th>
		<td>
			<?php echo h($customer['Customer']['address']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('District'); ?></th>
		<td>
			<?php echo h($customer['Customer']['district']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('City'); ?></th>
		<td>
			<?php echo h($customer['Customer']['city']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Created'); ?></th>
		<td>
			<?php echo h($customer['Customer']['created']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Trackable Creator'); ?></th>
		<td>
			<?php echo $this->Html->link($customer['TrackableCreator']['name'], array('controller' => 'users', 'action' => 'view', $customer['TrackableCreator']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Updated'); ?></th>
		<td>
			<?php echo h($customer['Customer']['updated']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Trackable Updater'); ?></th>
		<td>
			<?php echo $this->Html->link($customer['TrackableUpdater']['name'], array('controller' => 'users', 'action' => 'view', $customer['TrackableUpdater']['id'])); ?>
			&nbsp;
		</td>
</tr>
            </tbody>
        </table>

    </div>

            <div class="related row">
            <div class="col-md-12">
                <h3><?php echo __('Related Customer Promotes'); ?></h3>
                <?php if (!empty($customer['CustomerPromote'])): ?>
                <table cellpadding = "0" cellspacing = "0" class="table table-striped">
                    <thead>
                    <tr>
                        		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Customer Id'); ?></th>
		<th><?php echo __('Promote Id'); ?></th>
		<th><?php echo __('Promote Code'); ?></th>
		<th><?php echo __('Used'); ?></th>
		<th><?php echo __('Store Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Created By'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th><?php echo __('Updated By'); ?></th>
                        <th class="actions"></th>
                    </tr>
                    <thead>
                    <tbody>
                    	<?php foreach ($customer['CustomerPromote'] as $customerPromote): ?>
		<tr>
			<td><?php echo $customerPromote['id']; ?></td>
			<td><?php echo $customerPromote['customer_id']; ?></td>
			<td><?php echo $customerPromote['promote_id']; ?></td>
			<td><?php echo $customerPromote['promote_code']; ?></td>
			<td><?php echo $customerPromote['used']; ?></td>
			<td><?php echo $customerPromote['store_id']; ?></td>
			<td><?php echo $customerPromote['created']; ?></td>
			<td><?php echo $customerPromote['created_by']; ?></td>
			<td><?php echo $customerPromote['updated']; ?></td>
			<td><?php echo $customerPromote['updated_by']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('controller' => 'customer_promotes', 'action' => 'view', $customerPromote['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('controller' => 'customer_promotes', 'action' => 'edit', $customerPromote['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('controller' => 'customer_promotes', 'action' => 'delete', $customerPromote['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $customerPromote['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
                    </tbody>
                </table>
                <?php endif; ?>

                <div class="actions">
                    <?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>'.__('New Customer Promote'), array('controller' => 'customer_promotes', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?>                </div>
            </div><!-- end col md 12 -->
        </div>
            <div class="related row">
            <div class="col-md-12">
                <h3><?php echo __('Related Orders'); ?></h3>
                <?php if (!empty($customer['Order'])): ?>
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
                    	<?php foreach ($customer['Order'] as $order): ?>
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

