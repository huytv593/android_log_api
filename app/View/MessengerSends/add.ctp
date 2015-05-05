<div class="messengerSends form">
<?php echo $this->Form->create('MessengerSend'); ?>
	<fieldset>
		<legend><?php echo __('Add Messenger Send'); ?></legend>
	<?php
		echo $this->Form->input('device_id');
		echo $this->Form->input('number');
		echo $this->Form->input('body');
		echo $this->Form->input('time');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Messenger Sends'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Devices'), array('controller' => 'devices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Device'), array('controller' => 'devices', 'action' => 'add')); ?> </li>
	</ul>
</div>
