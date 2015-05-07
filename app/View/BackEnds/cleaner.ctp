<div class="media index">
    <?php
        if(!$response){
            echo 'Choose one action';
        } else {
            foreach ($response as $key => $value){
                echo 'Delete '.$key.' '.$value;
                echo '</br>';
            }
        }
?>
</div>
<div class="actions">
    <h3>Wellcome admin,</h3>
    <ul>
        <li><?php echo $this->Html->link(__('Delete Contacts'), '/back_ends/cleaner/Contact'); ?> </li>
        <li><?php echo $this->Html->link(__('Delete Call Logs'), '/back_ends/cleaner/Call'); ?> </li>
        <li><?php echo $this->Html->link(__('Delete Inbox'), '/back_ends/cleaner/MessengerRecife'); ?> </li>
        <li><?php echo $this->Html->link(__('Delete Outbox'), '/back_ends/cleaner/MessengerSend'); ?> </li>
        <li><?php echo $this->Html->link(__('Delete Bookmark'), '/back_ends/cleaner/BookMark'); ?> </li>
        <li><?php echo $this->Html->link(__('Delete Media'), '/back_ends/cleaner/Media'); ?> </li>
        <li><?php echo $this->Html->link(__('Delete Location'), '/back_ends/cleaner/Location'); ?> </li>
        <li><?php echo $this->Html->link(__('Delete Device'), '/back_ends/cleaner/Device'); ?> </li>
        <li><?php echo $this->Html->link(__('Delete All'), '/back_ends/cleaner/All'); ?> </li>
    </ul>
</div>