<div class="messengerSends view">
<h2><?php echo __('Messenger Send'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($messengerSend['MessengerSend']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Device'); ?></dt>
		<dd>
			<?php echo $this->Html->link($messengerSend['Device']['id'], array('controller' => 'devices', 'action' => 'view', $messengerSend['Device']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Number'); ?></dt>
		<dd>
			<?php echo h($messengerSend['MessengerSend']['number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Body'); ?></dt>
		<dd>
			<?php echo h($messengerSend['MessengerSend']['body']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Time'); ?></dt>
		<dd>
			<?php echo h($messengerSend['MessengerSend']['time']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Messenger Send'), array('action' => 'edit', $messengerSend['MessengerSend']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Messenger Send'), array('action' => 'delete', $messengerSend['MessengerSend']['id']), array(), __('Are you sure you want to delete # %s?', $messengerSend['MessengerSend']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Messenger Sends'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Messenger Send'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Devices'), array('controller' => 'devices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Device'), array('controller' => 'devices', 'action' => 'add')); ?> </li>
	</ul>
</div>
