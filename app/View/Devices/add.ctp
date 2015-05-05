<div class="devices form">
<?php echo $this->Form->create('Device'); ?>
	<fieldset>
		<legend><?php echo __('Add Device'); ?></legend>
	<?php
		echo $this->Form->input('device_id');
		echo $this->Form->input('username');
		echo $this->Form->input('admin');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Devices'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Devices'), array('controller' => 'devices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Device'), array('controller' => 'devices', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Book Marks'), array('controller' => 'book_marks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Book Mark'), array('controller' => 'book_marks', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Calls'), array('controller' => 'calls', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Call'), array('controller' => 'calls', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Contacts'), array('controller' => 'contacts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contact'), array('controller' => 'contacts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Locations'), array('controller' => 'locations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Location'), array('controller' => 'locations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Media'), array('controller' => 'media', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Media'), array('controller' => 'media', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Messenger Recives'), array('controller' => 'messenger_recives', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Messenger Recife'), array('controller' => 'messenger_recives', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Messenger Sends'), array('controller' => 'messenger_sends', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Messenger Send'), array('controller' => 'messenger_sends', 'action' => 'add')); ?> </li>
	</ul>
</div>
