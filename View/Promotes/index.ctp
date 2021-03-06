<div class="panel-heading">
    <h3 class="panel-title">
        <a href="javascript:void(0);" class="toggle-sidebar">
            <span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a>
        <?php echo __('Promotes'); ?>    </h3>
</div>
<div class="panel-body">
    <div class="col-md-12">
        <ul class="nav nav-pills nav-justified">
            <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Promote'), array('action' => 'add'), array('escape' => false)); ?></li>
            <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Stores'), array('controller' => 'stores', 'action' => 'index'), array('escape' => false)); ?> </li>
            <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Store'), array('controller' => 'stores', 'action' => 'add'), array('escape' => false)); ?> </li>
            <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Users'), array('controller' => 'users', 'action' => 'index'), array('escape' => false)); ?> </li>
            <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Trackable Creator'), array('controller' => 'users', 'action' => 'add'), array('escape' => false)); ?> </li>
            <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Order Details'), array('controller' => 'order_details', 'action' => 'index'), array('escape' => false)); ?> </li>
            <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Order Detail'), array('controller' => 'order_details', 'action' => 'add'), array('escape' => false)); ?> </li>
            <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Orders'), array('controller' => 'orders', 'action' => 'index'), array('escape' => false)); ?> </li>
            <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Order'), array('controller' => 'orders', 'action' => 'add'), array('escape' => false)); ?> </li>
        </ul>
    </div>
    <div class="col-md-12">
        <?php echo $this->Session->flash(); ?>
        <table cellpadding="0" cellspacing="0" class="table table-striped">
            <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('id'); ?></th>
                <th><?php echo $this->Paginator->sort('name'); ?></th>
                <th><?php echo $this->Paginator->sort('code'); ?></th>
                <th><?php echo $this->Paginator->sort('value'); ?></th>
                <th><?php echo $this->Paginator->sort('type'); ?></th>
                <th><?php echo $this->Paginator->sort('begin'); ?></th>
                <th><?php echo $this->Paginator->sort('end'); ?></th>
                <th><?php echo $this->Paginator->sort('created'); ?></th>
                <th><?php echo $this->Paginator->sort('created_by'); ?></th>
                <th><?php echo $this->Paginator->sort('updated'); ?></th>
                <th><?php echo $this->Paginator->sort('updated_by'); ?></th>
                <th><?php echo $this->Paginator->sort('status'); ?></th>
                <th><?php echo $this->Paginator->sort('store_id'); ?></th>
                <th><?php echo $this->Paginator->sort('global'); ?></th>
                <th class="actions"></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($promotes as $promote): ?>
                <tr>
                    <td><?php echo h($promote['Promote']['id']); ?>&nbsp;</td>
                    <td><?php echo h($promote['Promote']['name']); ?>&nbsp;</td>
                    <td><?php echo h($promote['Promote']['code']); ?>&nbsp;</td>
                    <td><?php echo h($promote['Promote']['value']); ?>&nbsp;</td>
                    <td><?php echo h($promote['Promote']['type']); ?>&nbsp;</td>
                    <td><?php echo h($promote['Promote']['begin']); ?>&nbsp;</td>
                    <td><?php echo h($promote['Promote']['end']); ?>&nbsp;</td>
                    <td><?php echo h($promote['Promote']['created']); ?>&nbsp;</td>
                    <td>
                        <?php echo $this->Html->link($promote['TrackableCreator']['name'], array('controller' => 'users', 'action' => 'view', $promote['TrackableCreator']['id'])); ?>
                    </td>
                    <td><?php echo h($promote['Promote']['updated']); ?>&nbsp;</td>
                    <td>
                        <?php echo $this->Html->link($promote['TrackableUpdater']['name'], array('controller' => 'users', 'action' => 'view', $promote['TrackableUpdater']['id'])); ?>
                    </td>
                    <td><?php echo h($promote['Promote']['status']); ?>&nbsp;</td>
                    <td>
                        <?php echo $this->Html->link($promote['Store']['name'], array('controller' => 'stores', 'action' => 'view', $promote['Store']['id'])); ?>
                    </td>
                    <td><?php echo h($promote['Promote']['global']); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $promote['Promote']['id']), array('escape' => false)); ?>
                        <?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $promote['Promote']['id']), array('escape' => false)); ?>
                        <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $promote['Promote']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $promote['Promote']['id'])); ?>
                    </td>
                </tr>
                <?php
                if ($promote['Thumb']['file']){
                    ?>
                    <tr>
                        <td colspan="15">
                            <?php
                            echo $this->Media->image($promote['Thumb']['file'], 900, 334, array('class' => 'thumbnail'));
                            ?>
                        </td>
                    </tr>
                <?php
                }
                ?>
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

