<div class="panel-heading">
    <h3 class="panel-title">
        <a href="javascript:void(0);" class="toggle-sidebar">
            <span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a>
        <?php echo __('Products'); ?>    </h3>
</div>
<div class="panel-body">
    <div class="col-md-12">
        <ul class="nav nav-pills nav-justified">
            <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Product'), array('action' => 'add'), array('escape' => false)); ?></li>
        </ul>
    </div>
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading"><strong>Tìm kiếm</strong></div>
            <div class="panel-body">
                <form id="search">
                    <div class="row">
                        <?php echo $this->Form->hidden('box_search'); ?>
                        <div class="col-lg-3">
                            <?php echo $this->Form->input('keyword',
                                array(
                                    'label' => false,
                                    'class' => 'form-control input-sm',
                                    'placeholder' => 'Từ khóa hoặc mã sản phẩm',
                                    'value' => $this->request->query('data.keyword')
                                )
                            ); ?>
                        </div>
                        <div class="col-lg-3">
                            <?php echo $this->Form->input('category_id',
                                array(
                                    'label' => false,
                                    'class' => 'form-control input-sm',
                                    'empty' => '-- Tất cã --',
                                    'value' => $this->request->query('data.category_id')
                                )
                            ); ?>
                        </div>
                        <div class="col-lg-3">
                            <?php echo $this->Form->input('provider_id',
                                array(
                                    'label' => false,
                                    'class' => 'form-control input-sm',
                                    'empty' => '-- Tất cã --',
                                    'value' => $this->request->query('data.provider_id')
                                )
                            ); ?>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="form-control btn btn-sm btn-success"><i
                                    class="fa fa-search"></i> Tìm
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <?php echo $this->Session->flash(); ?>
        <form action="<?php echo $this->Html->url(array('action'=>'save_many'))?>" id="product_list_form" method="post">
        <table cellpadding="0" cellspacing="0" class="table table-striped">
            <thead>
            <tr>
                <th></th>
                <th><?php echo $this->Paginator->sort('sku'); ?></th>
                <th><?php echo $this->Paginator->sort('provider_id'); ?></th>
                <th><?php echo $this->Paginator->sort('category_id'); ?></th>
                <th><?php echo $this->Paginator->sort('name'); ?></th>
                <th><?php echo $this->Paginator->sort('slug'); ?></th>
                <th><?php echo $this->Paginator->sort('price'); ?></th>
                <th><?php echo $this->Paginator->sort('retail_price'); ?></th>
                <th><?php echo $this->Paginator->sort('source_price'); ?></th>
                <th><?php echo $this->Paginator->sort('status'); ?></th>
                <th class="actions"></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?php
                        if ($product['Thumb']['file'])
                            echo $this->Media->image($product['Thumb']['file'], 50, 50, array('class' => 'thumbnail'));
                        ?>&nbsp;</td>
                    <td><?php echo h($product['Product']['sku']); ?>&nbsp;</td>
                    <td>
                        <?php echo $this->Form->hidden($product['Product']['id'].'.id',
                            array(
                                'value' => $product['Product']['id'],
                            )
                        ); ?>
                        <?php echo $this->Form->input($product['Product']['id'].'.provider_id',
                            array(
                                'label' => false,
                                'class' => 'form-control input-sm',
                                'value' => $product['Provider']['id'],
                                'empty' => '-- Chưa chọn --',
                            )
                        ); ?>
                    </td>
                    <td>
                        <?php echo $this->Form->input($product['Product']['id'].'.category_id',
                            array(
                                'label' => false,
                                'class' => 'form-control input-sm',
                                'value' => $product['Category']['id'],
                                'empty' => '-- Chưa chọn --',
                            )
                        ); ?>
                    </td>
                    <td>
                        <?php echo $this->Form->input($product['Product']['id'].'.name',
                            array(
                                'label' => false,
                                'type' => 'textarea',
                                'class' => 'form-control input-sm',
                                'value' => $product['Product']['name']
                            )
                        );
                        ?>
                    </td>
                    <td><?php echo h($product['Product']['slug']); ?></td>
                    <td class="currency">
                        <?php echo $this->Form->input($product['Product']['id'].'.price',
                            array(
                                'label' => false,
                                'type' => 'text',
                                'class' => 'form-control input-sm currency',
                                'placeholder' => 'Retail Price',
                                'value' => $product['Product']['price']
                            )
                        );
                        ?>
                    </td>
                    <td class="currency">
                        <?php echo $this->Form->input($product['Product']['id'].'.retail_price',
                            array(
                                'label' => false,
                                'type' => 'text',
                                'class' => 'form-control input-sm currency',
                                'placeholder' => 'Retail Price',
                                'value' => $product['Product']['retail_price']
                            )
                        );
                        ?>
                    </td>
                    <td class="currency">
                        <?php echo $this->Form->input($product['Product']['id'].'.source_price',
                            array(
                                'label' => false,
                                'type' => 'text',
                                'class' => 'form-control input-sm currency',
                                'placeholder' => 'Retail Price',
                                'value' => $product['Product']['source_price']
                            )
                        );
                        ?>
                    </td>
                    <td>
                        <?php echo $this->Form->input($product['Product']['id'].'.status', array('label' => false, 'class' => 'form-control input-sm', 'value' => $product['Product']['status'])); ?>
                    </td>
                    <td class="actions">
                        <?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $product['Product']['id']), array('escape' => false)); ?>
                        <?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $product['Product']['id']), array('escape' => false)); ?>
                        <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $product['Product']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $product['Product']['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <button class="btn btn-success"> Lưu lại </button>
            <hr>
        </form>
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

