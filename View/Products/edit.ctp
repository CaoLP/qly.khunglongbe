<?php $this->Html->css(array('bootstrap-tagsinput.css'),array('inline'=>false));?>
<?php $this->Html->script(array('jquery.popupoverlay.js','bootstrap-tagsinput.js'),array('inline'=>false));?>
<div class="panel-heading">
    <h3 class="panel-title">
        <a href="javascript:void(0);" class="toggle-sidebar">
            <span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a>
        <?php echo __('Edit Product'); ?>    </h3>
</div>
<div class="panel-body">
    <?php echo $this->Form->create('Product', array('role' => 'form')); ?>
    <div class="col-md-12">
        <ul class="nav nav-pills pull-right">
            <li><button class="btn btn-info" type="submit" name="submit" value="save"><span class="glyphicon glyphicon-plus"></span> <?php echo __('Save product')?></button></li>
            <li><button class="btn btn-info"  type="submit" name="submit" value="addnew"><span class="glyphicon glyphicon-plus"></span> <?php echo __('Save product and Add new')?></button></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="form-group">
                <div class="panel panel-default">
                    <div class="panel-heading"><?php echo __('Images') ?></div>
                    <div class="panel-body">
                        <?php echo $this->Media->iframe('Product', $this->request->data['Product']['id']); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <?php echo $this->Form->input('id', array('class' => 'form-control', 'placeholder' => 'Id')); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('sku', array('class' => 'form-control', 'placeholder' => 'Sku')); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('category_id', array('class' => 'form-control', 'placeholder' => 'Category Id')); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('provider_id', array('class' => 'form-control', 'placeholder' => 'Provider Id')); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('name', array('class' => 'form-control', 'placeholder' => 'Name')); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('slug', array('class' => 'form-control', 'placeholder' => 'Slug')); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('price', array('type' => 'text', 'class' => 'form-control currency', 'placeholder' => 'Price')); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('retail_price', array('type' => 'text', 'class' => 'form-control currency', 'placeholder' => 'Retail Price')); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('source_price', array('type' => 'text', 'class' => 'form-control currency', 'placeholder' => 'Source Price')); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('status', array('class' => 'form-control', 'placeholder' => 'Status')); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('type', array('options'=>$types,'class' => 'form-control', 'placeholder' => 'Status')); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('tags', array('type'=>'text','data-role' => 'tagsinput','class' => 'form-control', 'placeholder' => 'Status')); ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <?php echo $this->Form->input('excert', array('class' => 'form-control', 'placeholder' => 'Excert')); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Media->ckeditor('descriptions', array('label' => __('Descriptions'))); ?>
                <?php //echo $this->Form->input('descriptions', array('class' => 'form-control', 'placeholder' => 'Descriptions')); ?>
            </div>
            <div class="form-group">
                <div class="panel panel-default">
                    <div class="panel-heading"><?php echo __('Options') ?></div>
                    <div class="panel-body">
                        <div role="tabpanel">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <?php foreach($option_cats as $k=>$option_cat) {?>
                                    <li role="presentation" class="<?php echo $k == 0? 'active': '';?>"><a href="#tab_<?php echo $k?>" role="tab" data-toggle="tab"><?php echo $option_cat?></a></li>
                                <?php } ?>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <?php foreach($option_cats as $k=>$option_cat) {?>
                                <div role="tabpanel" class="tab-pane <?php echo $k == 1? 'active': '';?>" id="tab_<?php echo $k?>">
                                    <?php
                                    foreach($option_groups as $g_k => $group){
                                        $html = "<div class=\"panel panel-default\">
                                                    <div class=\"panel-heading\">{$group}
                                                    <a href=\"javascript:;\"
                                                        class=\"pull-right add-option\"
                                                        data-option_cat=\"{$k}\"
                                                        data-option_group=\"{$g_k}\"
                                                        data-target=\"#group_{$k}_{$g_k}\"><i class=\"glyphicon glyphicon-plus\"></i> Thêm mới
                                                    </a></div>
                                                        <div class=\"panel-body\">";
                                        $html .= "<div id=\"group_{$k}_{$g_k}\" data-option_cat=\"{$k}\">";
                                        $hasItem = false;
                                        if(isset($product_options[$group])){
                                            $opt_gr = $product_options[$group];
                                            foreach ($opt_gr as $s_key => $opt) {
                                                if($opt['Option']['option_cat_id'] == $k){
                                                    $hasItem = true;
                                                    $isChecked = '';
                                                    foreach ($this->request->data['ProductOption'] as $op) {
                                                        if ($op['option_id'] == $s_key){
                                                            $isChecked = 'checked';
                                                            break;
                                                        }
                                                    }
                                                    $name = $opt['Option']['name'];
                                                    if(!empty($opt['Option']['parent_id']))
                                                        $parent = ' disabled="true" class="parent-'.$opt['Option']['parent_id'].'" ';
                                                    else
                                                        $parent = ' class="option-checkbox" ';
                                                    $html.="<div class=\"list-option\">
                                                                <div class=\"checkbox\">
                                                                    <input type=\"checkbox\" {$isChecked} name=\"data[ProductOption][]\" {$parent}
                                                                           id=\"flat-checkbox-{$s_key}\" value=\"{$s_key}\">
                                                                    <label for=\"flat-checkbox-{$s_key}\">{$name}</label>
                                                                </div>
                                                            </div>";
                                                }
                                            }
                                        }
                                        $html .= "</div></div></div>";
                                        echo $html;
                                    }
                                   ?>
                                </div>
                                <?php } ?>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <ul class="nav nav-pills pull-right">
            <li><button class="btn btn-info" type="submit" name="submit" value="save"><span class="glyphicon glyphicon-plus"></span> <?php echo __('Save product')?></button></li>
            <li><button class="btn btn-info"  type="submit" name="submit" value="addnew"><span class="glyphicon glyphicon-plus"></span> <?php echo __('Save product and Add new')?></button></li>
        </ul>
    </div>
    <?php echo $this->Form->end() ?>
    <div id="option-add-form" style="display: none">
        <div class="panel panel-success">
            <div class="panel-body">
                <div id="error" style="display: none">
                    <div class="alert alert-warning" role="alert">
                        <strong>Lỗi!</strong> <span id="msg"></span>
                    </div>
                </div>
                <form action="<?php echo $this->Html->url(array('controller' => 'options', 'action' => 'add')); ?>"
                      method="post">
                    <div class="form-group">
                        <div class="input">
                            <label for="option_name">Tên thuộc tính</label>
                            <input name="name" id="option_name" class="form-control" required="required">
                            <input type="hidden" name="option_cat" id="option_cat" class="form-control">
                            <input type="hidden" name="option_group" id="option_group" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-danger">Đóng</button>
                        <button type="submit" class="btn btn-success">Thêm</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

