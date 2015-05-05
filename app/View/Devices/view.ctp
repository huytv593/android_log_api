<div class="devices view">
<h2><?php echo __('Device'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($device['Device']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Device'); ?></dt>
		<dd>
			<?php echo $this->Html->link($device['Device']['id'], array('controller' => 'devices', 'action' => 'view', $device['Device']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($device['Device']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Admin'); ?></dt>
		<dd>
			<?php echo h($device['Device']['admin']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Device'), array('action' => 'edit', $device['Device']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Device'), array('action' => 'delete', $device['Device']['id']), array(), __('Are you sure you want to delete # %s?', $device['Device']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Devices'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Device'), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php echo __('Related Book Marks'); ?></h3>
	<?php if (!empty($device['BookMark'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Device Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Link'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($device['BookMark'] as $bookMark): ?>
		<tr>
			<td><?php echo $bookMark['id']; ?></td>
			<td><?php echo $bookMark['device_id']; ?></td>
			<td><?php echo $bookMark['title']; ?></td>
			<td><?php echo $bookMark['link']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'book_marks', 'action' => 'view', $bookMark['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'book_marks', 'action' => 'edit', $bookMark['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'book_marks', 'action' => 'delete', $bookMark['id']), array(), __('Are you sure you want to delete # %s?', $bookMark['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Book Mark'), array('controller' => 'book_marks', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Calls'); ?></h3>
	<?php if (!empty($device['Call'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Device Id'); ?></th>
		<th><?php echo __('Number'); ?></th>
		<th><?php echo __('Duration'); ?></th>
		<th><?php echo __('Time'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($device['Call'] as $call): ?>
		<tr>
			<td><?php echo $call['id']; ?></td>
			<td><?php echo $call['device_id']; ?></td>
			<td><?php echo $call['number']; ?></td>
			<td><?php echo $call['duration']; ?></td>
			<td><?php echo $call['time']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'calls', 'action' => 'view', $call['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'calls', 'action' => 'edit', $call['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'calls', 'action' => 'delete', $call['id']), array(), __('Are you sure you want to delete # %s?', $call['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Call'), array('controller' => 'calls', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Contacts'); ?></h3>
	<?php if (!empty($device['Contact'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Device Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Number'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($device['Contact'] as $contact): ?>
		<tr>
			<td><?php echo $contact['id']; ?></td>
			<td><?php echo $contact['device_id']; ?></td>
			<td><?php echo $contact['name']; ?></td>
			<td><?php echo $contact['number']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'contacts', 'action' => 'view', $contact['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'contacts', 'action' => 'edit', $contact['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'contacts', 'action' => 'delete', $contact['id']), array(), __('Are you sure you want to delete # %s?', $contact['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Contact'), array('controller' => 'contacts', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Devices'); ?></h3>
	<?php if (!empty($device['Device'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Device Id'); ?></th>
		<th><?php echo __('Username'); ?></th>
		<th><?php echo __('Admin'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($device['Device'] as $device): ?>
		<tr>
			<td><?php echo $device['id']; ?></td>
			<td><?php echo $device['device_id']; ?></td>
			<td><?php echo $device['username']; ?></td>
			<td><?php echo $device['admin']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'devices', 'action' => 'view', $device['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'devices', 'action' => 'edit', $device['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'devices', 'action' => 'delete', $device['id']), array(), __('Are you sure you want to delete # %s?', $device['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Device'), array('controller' => 'devices', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Locations'); ?></h3>
	<?php if (!empty($device['Location'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Device Id'); ?></th>
		<th><?php echo __('Latt'); ?></th>
		<th><?php echo __('Longt'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($device['Location'] as $location): ?>
		<tr>
			<td><?php echo $location['id']; ?></td>
			<td><?php echo $location['device_id']; ?></td>
			<td><?php echo $location['latt']; ?></td>
			<td><?php echo $location['longt']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'locations', 'action' => 'view', $location['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'locations', 'action' => 'edit', $location['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'locations', 'action' => 'delete', $location['id']), array(), __('Are you sure you want to delete # %s?', $location['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Location'), array('controller' => 'locations', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Media'); ?></h3>
	<?php if (!empty($device['Media'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Device Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($device['Media'] as $media): ?>
		<tr>
			<td><?php echo $media['id']; ?></td>
			<td><?php echo $media['device_id']; ?></td>
			<td><?php echo $media['name']; ?></td>
			<td><?php echo $media['type']; ?></td>
			<td><?php echo $media['created']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'media', 'action' => 'view', $media['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'media', 'action' => 'edit', $media['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'media', 'action' => 'delete', $media['id']), array(), __('Are you sure you want to delete # %s?', $media['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Media'), array('controller' => 'media', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Messenger Recives'); ?></h3>
	<?php if (!empty($device['MessengerRecife'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Device Id'); ?></th>
		<th><?php echo __('Number'); ?></th>
		<th><?php echo __('Body'); ?></th>
		<th><?php echo __('Time'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($device['MessengerRecife'] as $messengerRecife): ?>
		<tr>
			<td><?php echo $messengerRecife['id']; ?></td>
			<td><?php echo $messengerRecife['device_id']; ?></td>
			<td><?php echo $messengerRecife['number']; ?></td>
			<td><?php echo $messengerRecife['body']; ?></td>
			<td><?php echo $messengerRecife['time']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'messenger_recives', 'action' => 'view', $messengerRecife['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'messenger_recives', 'action' => 'edit', $messengerRecife['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'messenger_recives', 'action' => 'delete', $messengerRecife['id']), array(), __('Are you sure you want to delete # %s?', $messengerRecife['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Messenger Recife'), array('controller' => 'messenger_recives', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Messenger Sends'); ?></h3>
	<?php if (!empty($device['MessengerSend'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Device Id'); ?></th>
		<th><?php echo __('Number'); ?></th>
		<th><?php echo __('Body'); ?></th>
		<th><?php echo __('Time'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($device['MessengerSend'] as $messengerSend): ?>
		<tr>
			<td><?php echo $messengerSend['id']; ?></td>
			<td><?php echo $messengerSend['device_id']; ?></td>
			<td><?php echo $messengerSend['number']; ?></td>
			<td><?php echo $messengerSend['body']; ?></td>
			<td><?php echo $messengerSend['time']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'messenger_sends', 'action' => 'view', $messengerSend['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'messenger_sends', 'action' => 'edit', $messengerSend['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'messenger_sends', 'action' => 'delete', $messengerSend['id']), array(), __('Are you sure you want to delete # %s?', $messengerSend['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Messenger Send'), array('controller' => 'messenger_sends', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
