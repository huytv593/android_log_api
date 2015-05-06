<div class="media index">
    <h2><?php echo __('Media: ');
        echo $this->Paginator->counter(array(
            'format' => __('{:count} files')
        ));
        ?></h2>
    <table cellpadding="0" cellspacing="0">
        <thead>
        <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('name'); ?></th>
            <th><?php echo $this->Paginator->sort('type'); ?></th>
            <th><?php echo $this->Paginator->sort('created'); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($media as $media): ?>
            <tr>
                <td><?php echo h($media['Media']['id']); ?>&nbsp;</td>
                <td><?php echo h($media['Media']['name']); ?>&nbsp;</td>
                <td><?php echo h($media['Media']['type']); ?>&nbsp;</td>
                <td><?php echo h($media['Media']['created']); ?>&nbsp;</td>
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
    </ul>
</div>
