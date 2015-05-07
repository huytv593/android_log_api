<div class="locations index">
    <h2><?php echo __('Locations: ');
        echo $this->Paginator->counter(array(
            'format' => __('{:count} locations')
        ));?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('device_id'); ?></th>
			<th><?php echo $this->Paginator->sort('latt'); ?></th>
			<th><?php echo $this->Paginator->sort('longt'); ?></th>
			<th><?php echo $this->Paginator->sort('time'); ?></th>
            <th>View on Google Map</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($locations as $location): ?>
	<tr>
		<td><?php echo h($location['Location']['id']); ?>&nbsp;</td>
		<td><?php echo h($location['Location']['device_id']); ?>&nbsp;</td>
		<td><?php echo h($location['Location']['latt']); ?>&nbsp;</td>
		<td><?php echo h($location['Location']['longt']); ?>&nbsp;</td>
		<td><?php echo h($location['Location']['time']); ?>&nbsp;</td>
        <td><?php echo $this->Html->link(__('View'), 'https://google.com/maps/@'.$location['Location']['latt'].','.$location['Location']['longt'].',20z', array('target' => '_blank')); ?> </td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3>Wellcome</h3>
    <ul>
        <li><?php echo $this->Html->link(__('Contacts'), '/contacts/index/'.$data['deviceId']); ?> </li>
        <li><?php echo $this->Html->link(__('Call Logs'), '/calls/index/'.$data['deviceId']); ?> </li>
        <li><?php echo $this->Html->link(__('Inbox'), '/messenger_recives/index/'.$data['deviceId']); ?> </li>
        <li><?php echo $this->Html->link(__('Outbox'), '/messenger_sends/index/'.$data['deviceId']); ?> </li>
        <li><?php echo $this->Html->link(__('Bookmark'), '/book_marks/index/'.$data['deviceId']); ?> </li>
        <li><?php echo $this->Html->link(__('Media'), '/media/index/'.$data['deviceId']); ?> </li>
        <li><?php echo $this->Html->link(__('Location'), '/locations/index/'.$data['deviceId']); ?> </li>
    </ul>
</div>
