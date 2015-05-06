<?php
echo $this->Form->create(null, array(
    'url' => array('controller' => 'back_ends', 'action' => 'index')
));
echo $this->Form->input('username', array('label' => 'User Id:'));
echo $this->Form->end('Submit');