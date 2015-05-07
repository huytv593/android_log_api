<div class="media index">
    <h2> You have:</h2> <br>
    <ul>
        <li><?php echo $data['contact'];?> contacts</li>
        <li><?php echo $data['call'];?> calls</li>
        <li><?php echo $data['inbox'];?> sms in inbox</li>
        <li><?php echo $data['outbox'];?> sms in outbox</li>
        <li><?php echo $data['book_mark'];?> bookmarks</li>
        <li><?php echo $data['media'];?> files</li>
        <li><?php echo $data['location'];?> locations</li>

    </ul>

</div>
<div class="actions">
    <h3>Wellcome <?php echo $data['user']; ?>,</h3>
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