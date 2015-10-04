<div class="panel-heading">
    <h3 class="panel-title">
        <a href="javascript:void(0);" class="toggle-sidebar">
            <span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a>
        <?php echo __('Edit Post'); ?>    </h3>
</div>
<div class="panel-body">
    <div class="col-md-12">
        <ul class="nav nav-pills nav-justified">
            <li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete'), array('action' => 'delete', $this->Form->value('Post.id')), array('escape' => false), __('Are you sure you want to delete # %s?', $this->Form->value('Post.id'))); ?></li>
            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Posts'), array('action' => 'index'), array('escape' => false)); ?></li>
            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Post Categories'), array('controller' => 'post_categories', 'action' => 'index'), array('escape' => false)); ?> </li>
            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Post Category'), array('controller' => 'post_categories', 'action' => 'add'), array('escape' => false)); ?> </li>
            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Users'), array('controller' => 'users', 'action' => 'index'), array('escape' => false)); ?> </li>
            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Trackable Creator'), array('controller' => 'users', 'action' => 'add'), array('escape' => false)); ?> </li>
        </ul>
    </div>
    <div class="col-md-12">
        <?php echo $this->Form->create('Post', array('role' => 'form')); ?>

        <div class="form-group">
            <?php echo $this->Form->input('id', array('class' => 'form-control', 'placeholder' => 'Id')); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('title', array('class' => 'form-control', 'placeholder' => 'Title')); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('slug', array('class' => 'form-control', 'placeholder' => 'Slug')); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('excert', array('class' => 'form-control', 'placeholder' => 'Excert')); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Media->ckeditor('descriptions', array('label' => __('Descriptions'))); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('tags', array('class' => 'form-control', 'placeholder' => 'Tags')); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('post_category_id', array('class' => 'form-control', 'placeholder' => 'Post Category Id')); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Media->iframe('Post', $this->request->data['Post']['id']); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
        </div>

        <?php echo $this->Form->end() ?>


    </div>
</div>

