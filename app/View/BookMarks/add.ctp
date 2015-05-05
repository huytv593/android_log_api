<div class="bookMarks form">
<?php echo $this->Form->create('BookMark'); ?>
	<fieldset>
		<legend><?php echo __('Add Book Mark'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List Book Marks'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Devices'), array('controller' => 'devices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Device'), array('controller' => 'devices', 'action' => 'add')); ?> </li>
	</ul>
</div>
