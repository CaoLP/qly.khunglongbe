<?php $this->Html->css(array('tree'), array('inline' => false)); ?>
<?php $this->Html->script(array('add_promote','tree'), array('inline' => false)); ?>
<script>
    var product_not_inpromote = "<?php echo $this->Html->url(array(
            'controller' => 'product_promotes',
            'action' => 'product_not_inpromote'
    ));?>";
    var saved = "<?php echo $this->Html->url(array(
            'controller' => 'product_promotes',
            'action' => 'add'
    ));?>";
    var index = "<?php echo $this->Html->url(array(
            'controller' => 'product_promotes',
            'action' => 'index'
    ));?>";
</script>
<div class="panel-heading">
    <h3 class="panel-title">
        <a href="javascript:void(0);" class="toggle-sidebar">
            <span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a>
        <?php echo __('Add Product Promote'); ?>    </h3>
</div>
<div class="panel-body">
    <div class="col-md-12">
        <ul class="nav nav-pills nav-justified">
            <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Product Promotes'), array('action' => 'index'), array('escape' => false)); ?></li>
            <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Products'), array('controller' => 'products', 'action' => 'index'), array('escape' => false)); ?> </li>
            <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Product'), array('controller' => 'products', 'action' => 'add'), array('escape' => false)); ?> </li>
            <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Promotes'), array('controller' => 'promotes', 'action' => 'index'), array('escape' => false)); ?> </li>
            <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Promote'), array('controller' => 'promotes', 'action' => 'add'), array('escape' => false)); ?> </li>
        </ul>
    </div>
    <div class="col-md-4">
        <div class="panel panel-info">
            <div class="panel-heading">
                Danh mục sản phẩm
            </div>
            <div class="panel-body">
                <div class="tree">
                    <?php echo $this->App->genTree($categories);?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Khuyến mãi
                <div>
                    <select class="form-control" name="promote_id" id="promote_id">
                        <?php foreach($promotes as $k=>$pr){ ?>
                            <option value="<?php echo $k;?>"><?php echo $pr;?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="panel-body padding-lr-0" id="product-list">
                <div class="col-md-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">Danh sách sản phẩm <a href="javascript:;" class="btn btn-sm btn-danger pull-right" id="add-all" onclick="add_all()">Thêm tất cã</a></div>
                        <div class="panel-body" id="product_list"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Danh sách sản phẩm khuyến mãi <a href="javascript:;" class="btn btn-sm btn-warning pull-right" id="save" onclick="save_data()">Lưu lại</a></div>
                        <div class="panel-body" id="product_promote_list"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

