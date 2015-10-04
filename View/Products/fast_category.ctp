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
            <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Category'), array('controller'=>'categories','action' => 'add'), array('escape' => false)); ?></li>
        </ul>
    </div>
    <div class="col-md-12">
        <div class="col-md-4">
            <div class="panel panel-info">
                <div class="panel-heading">
                    Sản phẩm
                </div>
                <div class="panel-body" id="p-list">

                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Danh mục
                    <div>
                        <select class="form-control" name="promote_id" id="promote_id">
                            <?php foreach($categories as $k=>$cat){ ?>
                                <option value="<?php echo $k;?>"><?php echo $cat;?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="panel-body padding-lr-0" id="p-cat">

                </div>
            </div>
        </div>
    </div>
</div>