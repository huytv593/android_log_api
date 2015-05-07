<div class="locations view">
<h2><?php echo __('Location'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($location['Location']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Device Id'); ?></dt>
		<dd>
			<?php echo h($location['Location']['device_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Latt'); ?></dt>
		<dd>
			<?php echo h($location['Location']['latt']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Longt'); ?></dt>
		<dd>
			<?php echo h($location['Location']['longt']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Time'); ?></dt>
		<dd>
			<?php echo h($location['Location']['time']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Location'), array('action' => 'edit', $location['Location']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Location'), array('action' => 'delete', $location['Location']['id']), array(), __('Are you sure you want to delete # %s?', $location['Location']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Locations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Location'), array('action' => 'add')); ?> </li>
	</ul>
</div>
