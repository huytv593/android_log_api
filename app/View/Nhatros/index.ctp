<div class="nhatros index">
	<h2><?php echo __('Nhatros'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('created_by'); ?></th>
			<th><?php echo $this->Paginator->sort('created_at'); ?></th>
			<th><?php echo $this->Paginator->sort('end_at'); ?></th>
			<th><?php echo $this->Paginator->sort('price'); ?></th>
			<th><?php echo $this->Paginator->sort('city'); ?></th>
			<th><?php echo $this->Paginator->sort('district'); ?></th>
			<th><?php echo $this->Paginator->sort('precinct'); ?></th>
			<th><?php echo $this->Paginator->sort('street'); ?></th>
			<th><?php echo $this->Paginator->sort('address'); ?></th>
			<th><?php echo $this->Paginator->sort('area'); ?></th>
			<th><?php echo $this->Paginator->sort('info'); ?></th>
			<th><?php echo $this->Paginator->sort('imga'); ?></th>
			<th><?php echo $this->Paginator->sort('imgb'); ?></th>
			<th><?php echo $this->Paginator->sort('imgc'); ?></th>
			<th><?php echo $this->Paginator->sort('imgd'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($nhatros as $nhatro): ?>
	<tr>
		<td><?php echo h($nhatro['Nhatro']['id']); ?>&nbsp;</td>
		<td><?php echo h($nhatro['Nhatro']['title']); ?>&nbsp;</td>
		<td><?php echo h($nhatro['Nhatro']['created_by']); ?>&nbsp;</td>
		<td><?php echo h($nhatro['Nhatro']['created_at']); ?>&nbsp;</td>
		<td><?php echo h($nhatro['Nhatro']['end_at']); ?>&nbsp;</td>
		<td><?php echo h($nhatro['Nhatro']['price']); ?>&nbsp;</td>
		<td><?php echo h($nhatro['Nhatro']['city']); ?>&nbsp;</td>
		<td><?php echo h($nhatro['Nhatro']['district']); ?>&nbsp;</td>
		<td><?php echo h($nhatro['Nhatro']['precinct']); ?>&nbsp;</td>
		<td><?php echo h($nhatro['Nhatro']['street']); ?>&nbsp;</td>
		<td><?php echo h($nhatro['Nhatro']['address']); ?>&nbsp;</td>
		<td><?php echo h($nhatro['Nhatro']['area']); ?>&nbsp;</td>
		<td><?php echo h($nhatro['Nhatro']['info']); ?>&nbsp;</td>
		<td><?php echo h($nhatro['Nhatro']['imga']); ?>&nbsp;</td>
		<td><?php echo h($nhatro['Nhatro']['imgb']); ?>&nbsp;</td>
		<td><?php echo h($nhatro['Nhatro']['imgc']); ?>&nbsp;</td>
		<td><?php echo h($nhatro['Nhatro']['imgd']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $nhatro['Nhatro']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $nhatro['Nhatro']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $nhatro['Nhatro']['id']), array(), __('Are you sure you want to delete # %s?', $nhatro['Nhatro']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Nhatro'), array('action' => 'add')); ?></li>
	</ul>
</div>
