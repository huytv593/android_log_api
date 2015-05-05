<div class="bookMarks view">
<h2><?php echo __('Book Mark'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($bookMark['BookMark']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Device'); ?></dt>
		<dd>
			<?php echo $this->Html->link($bookMark['Device']['id'], array('controller' => 'devices', 'action' => 'view', $bookMark['Device']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($bookMark['BookMark']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Link'); ?></dt>
		<dd>
			<?php echo h($bookMark['BookMark']['link']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Book Mark'), array('action' => 'edit', $bookMark['BookMark']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Book Mark'), array('action' => 'delete', $bookMark['BookMark']['id']), array(), __('Are you sure you want to delete # %s?', $bookMark['BookMark']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Book Marks'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Book Mark'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Devices'), array('controller' => 'devices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Device'), array('controller' => 'devices', 'action' => 'add')); ?> </li>
	</ul>
</div>
