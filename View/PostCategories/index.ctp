
<div class="panel-heading">
    <h3 class="panel-title">
		<a href="javascript:void(0);" class="toggle-sidebar">
			<span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a>
		<?php echo __('Post Categories'); ?>	</h3>
</div>
<div class="panel-body">
    <div class="col-md-12">
        <ul class="nav nav-pills nav-justified">
			<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Post Category'), array('action' => 'add'), array('escape' => false)); ?></li>
					<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Post Categories'), array('controller' => 'post_categories', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Parent Post Category'), array('controller' => 'post_categories', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Posts'), array('controller' => 'posts', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Post'), array('controller' => 'posts', 'action' => 'add'), array('escape' => false)); ?> </li>
		</ul>
    </div>
 <div class="col-md-12">
	<?php echo $this->Session->flash(); ?>
		<table cellpadding="0" cellspacing="0" class="table table-striped">
				<thead>
					<tr>
						<th><?php echo $this->Paginator->sort('id'); ?></th>
						<th><?php echo $this->Paginator->sort('name'); ?></th>
						<th><?php echo $this->Paginator->sort('slug'); ?></th>
						<th><?php echo $this->Paginator->sort('parent_id'); ?></th>
						<th><?php echo $this->Paginator->sort('lft'); ?></th>
						<th><?php echo $this->Paginator->sort('rght'); ?></th>
						<th><?php echo $this->Paginator->sort('created'); ?></th>
						<th><?php echo $this->Paginator->sort('created_by'); ?></th>
						<th><?php echo $this->Paginator->sort('updated'); ?></th>
						<th><?php echo $this->Paginator->sort('update_by'); ?></th>
						<th class="actions"></th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($postCategories as $postCategory): ?>
					<tr>
						<td><?php echo h($postCategory['PostCategory']['id']); ?>&nbsp;</td>
						<td><?php echo h($postCategory['PostCategory']['name']); ?>&nbsp;</td>
						<td><?php echo h($postCategory['PostCategory']['slug']); ?>&nbsp;</td>
								<td>
			<?php echo $this->Html->link($postCategory['ParentPostCategory']['name'], array('controller' => 'post_categories', 'action' => 'view', $postCategory['ParentPostCategory']['id'])); ?>
		</td>
						<td><?php echo h($postCategory['PostCategory']['lft']); ?>&nbsp;</td>
						<td><?php echo h($postCategory['PostCategory']['rght']); ?>&nbsp;</td>
						<td><?php echo h($postCategory['PostCategory']['created']); ?>&nbsp;</td>
						<td><?php echo h($postCategory['PostCategory']['created_by']); ?>&nbsp;</td>
						<td><?php echo h($postCategory['PostCategory']['updated']); ?>&nbsp;</td>
						<td><?php echo h($postCategory['PostCategory']['update_by']); ?>&nbsp;</td>
						<td class="actions">
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $postCategory['PostCategory']['id']), array('escape' => false)); ?>
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $postCategory['PostCategory']['id']), array('escape' => false)); ?>
							<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $postCategory['PostCategory']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $postCategory['PostCategory']['id'])); ?>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>

			<p>
				<small><?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?></small>
			</p>

			<?php
			$params = $this->Paginator->params();
			if ($params['pageCount'] > 1) {
			?>
			<ul class="pagination pagination-sm">
				<?php
					echo $this->Paginator->prev('&larr; Previous', array('class' => 'prev','tag' => 'li','escape' => false), '<a onclick="return false;">&larr; Previous</a>', array('class' => 'prev disabled','tag' => 'li','escape' => false));
					echo $this->Paginator->numbers(array('separator' => '','tag' => 'li','currentClass' => 'active','currentTag' => 'a'));
					echo $this->Paginator->next('Next &rarr;', array('class' => 'next','tag' => 'li','escape' => false), '<a onclick="return false;">Next &rarr;</a>', array('class' => 'next disabled','tag' => 'li','escape' => false));
				?>
			</ul>
			<?php } ?>
    </div>
</div>

