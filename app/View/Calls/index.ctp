<div class="calls index">
	<h2><?php echo __('Calls'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('device_id'); ?></th>
			<th><?php echo $this->Paginator->sort('number'); ?></th>
			<th><?php echo $this->Paginator->sort('duration'); ?></th>
			<th><?php echo $this->Paginator->sort('time'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($calls as $call): ?>
	<tr>
		<td><?php echo h($call['Call']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($call['Device']['id'], array('controller' => 'devices', 'action' => 'view', $call['Device']['id'])); ?>
		</td>
		<td><?php echo h($call['Call']['number']); ?>&nbsp;</td>
		<td><?php echo h($call['Call']['duration']); ?>&nbsp;</td>
		<td><?php echo h($call['Call']['time']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $call['Call']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $call['Call']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $call['Call']['id']), array(), __('Are you sure you want to delete # %s?', $call['Call']['id'])); ?>
		</td>
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
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Call'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Devices'), array('controller' => 'devices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Device'), array('controller' => 'devices', 'action' => 'add')); ?> </li>
	</ul>
</div>
