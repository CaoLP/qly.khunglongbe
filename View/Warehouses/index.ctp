<div class="panel-heading">
    <h3 class="panel-title">
        <a href="javascript:void(0);" class="toggle-sidebar">
            <span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a>
        <?php echo __('Warehouses'); ?>    </h3>
</div>
<div class="panel-body">
    <div class="col-md-12">
        <ul class="nav nav-pills nav-justified">
            <li>
                <?php echo $this->Html->link(
                    '<span class="glyphicon glyphicon-plus"></span>' . __('New Warehouse'),
                    '#', array('escape' => false,'data-toggle' => 'modal', 'data-target'=>'#wareHouseModal')); ?>
            </li>
        </ul>
    </div>
    <div class="col-md-12">
        <?php echo $this->Session->flash(); ?>
        <table cellpadding="0" cellspacing="0" class="table table-striped">
            <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('id'); ?></th>
                <th><?php echo $this->Paginator->sort('store_id'); ?></th>
                <th><?php echo $this->Paginator->sort('product_id'); ?></th>
                <th><?php echo __('Options')?></th>
                <th><?php echo $this->Paginator->sort('price'); ?></th>
                <th><?php echo $this->Paginator->sort('retail_price'); ?></th>
                <th><?php echo $this->Paginator->sort('qty'); ?></th>
                <th><?php echo $this->Paginator->sort('created'); ?></th>
                <th><?php echo $this->Paginator->sort('created_by'); ?></th>
                <th><?php echo $this->Paginator->sort('updated'); ?></th>
                <th><?php echo $this->Paginator->sort('updated_by'); ?></th>
                <th class="actions"></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($warehouses as $warehouse): ?>
                <tr>
                    <td><?php echo h($warehouse['Warehouse']['id']); ?>&nbsp;</td>
                    <td>
                        <?php echo $this->Html->link($warehouse['Store']['name'], array('controller' => 'stores', 'action' => 'view', $warehouse['Store']['id'])); ?>
                    </td>
                    <td>
                        <?php echo $this->Html->link($warehouse['Product']['name'], array('controller' => 'products', 'action' => 'view', $warehouse['Product']['id'])); ?>
                    </td>
                    <td><?php echo implode(',',$warehouse['WarehouseOption']); ?>&nbsp;</td>
                    <td><?php echo h($warehouse['Warehouse']['price']); ?>&nbsp;</td>
                    <td><?php echo h($warehouse['Warehouse']['retail_price']); ?>&nbsp;</td>
                    <td><?php echo h($warehouse['Warehouse']['qty']); ?>&nbsp;</td>
                    <td><?php echo h($warehouse['Warehouse']['created']); ?>&nbsp;</td>
                    <td>
                        <?php echo $this->Html->link($warehouse['TrackableCreator']['name'], array('controller' => 'users', 'action' => 'view', $warehouse['TrackableCreator']['id'])); ?>
                    </td>
                    <td><?php echo h($warehouse['Warehouse']['updated']); ?>&nbsp;</td>
                    <td>
                        <?php echo $this->Html->link($warehouse['TrackableUpdater']['name'], array('controller' => 'users', 'action' => 'view', $warehouse['TrackableUpdater']['id'])); ?>
                    </td>
                    <td class="actions">
                        <?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $warehouse['Warehouse']['id']), array('escape' => false)); ?>
                        <?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $warehouse['Warehouse']['id']), array('escape' => false)); ?>
                        <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $warehouse['Warehouse']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $warehouse['Warehouse']['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <p>
            <small><?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}'))); ?></small>
        </p>

        <?php
        $params = $this->Paginator->params();
        if ($params['pageCount'] > 1) {
            ?>
            <ul class="pagination pagination-sm">
                <?php
                echo $this->Paginator->prev('&larr; Previous', array('class' => 'prev', 'tag' => 'li', 'escape' => false), '<a onclick="return false;">&larr; Previous</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
                echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentClass' => 'active', 'currentTag' => 'a'));
                echo $this->Paginator->next('Next &rarr;', array('class' => 'next', 'tag' => 'li', 'escape' => false), '<a onclick="return false;">Next &rarr;</a>', array('class' => 'next disabled', 'tag' => 'li', 'escape' => false));
                ?>
            </ul>
        <?php } ?>
    </div>
</div>

<!-- Default bootstrap modal example -->
<div class="modal fade" id="wareHouseModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-href="<?php echo $this->Html->url(array('action' => 'add'));?>">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo __('New Warehouse')?></h4>
            </div>
            <div class="modal-body">

            </div>
        </div>
    </div>
</div>