<div class="bookMarks form">
<?php echo $this->Form->create('BookMark'); ?>
	<fieldset>
		<legend><?php echo __('Edit Book Mark'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('device_id');
		echo $this->Form->input('title');
		echo $this->Form->input('link');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('BookMark.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('BookMark.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Book Marks'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Devices'), array('controller' => 'devices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Device'), array('controller' => 'devices', 'action' => 'add')); ?> </li>
	</ul>
</div>
