<div class="messengerRecives view">
<h2><?php echo __('Messenger Recife'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($messengerRecife['MessengerRecife']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Device'); ?></dt>
		<dd>
			<?php echo $this->Html->link($messengerRecife['Device']['id'], array('controller' => 'devices', 'action' => 'view', $messengerRecife['Device']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Number'); ?></dt>
		<dd>
			<?php echo h($messengerRecife['MessengerRecife']['number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Body'); ?></dt>
		<dd>
			<?php echo h($messengerRecife['MessengerRecife']['body']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Time'); ?></dt>
		<dd>
			<?php echo h($messengerRecife['MessengerRecife']['time']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Messenger Recife'), array('action' => 'edit', $messengerRecife['MessengerRecife']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Messenger Recife'), array('action' => 'delete', $messengerRecife['MessengerRecife']['id']), array(), __('Are you sure you want to delete # %s?', $messengerRecife['MessengerRecife']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Messenger Recives'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Messenger Recife'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Devices'), array('controller' => 'devices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Device'), array('controller' => 'devices', 'action' => 'add')); ?> </li>
	</ul>
</div>
