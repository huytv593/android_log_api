<?php

class AppSchema extends CakeSchema
{

    public function before($event = array())
    {
        $db = ConnectionManager::getDataSource($this->connection);
        $db->cacheSources = false;
        return true;
    }
//
//    public function after($event = array())
//    {
//        if (isset($event['update'])) {
//            $this->addData($event['update']);
//        }
//        if (isset($event['create'])) {
//            $this->addData($event['create']);
//        }
//    }

    public $devices = array(
        'id' => array('type' => 'biginteger', 'null' => false, 'default' => '0', 'length' => 20, 'key' => 'primary', 'unsigned' => true, 'autoIncrement' => true),
        'device_id' => array('type' => 'string', 'null' => false, 'length' => 23, 'unique' => true),
        'username' => array('type' => 'string', 'null' => false, 'unique' => true),
        'admin' => array('type' => 'integer', 'default' => '0', 'null' =>false ),
        'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci')
    );

    public $calls = array(
        'id' => array('type' => 'biginteger', 'null' => false, 'default' => '0', 'length' => 20, 'key' => 'primary', 'unsigned' => true, 'autoIncrement' => true),
        'device_id' => array('type' => 'string', 'null' => false, 'length' => 23, 'unique' => true),
        'number' => array('type' => 'string', 'null' => true),
        'duration' => array('type' => 'string', 'null' => true),
        'time' => array('type' => 'string', 'null' => true),
        'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci')
    );

    public $messenger_recives = array(
        'id' => array('type' => 'biginteger', 'null' => false, 'default' => '0', 'length' => 20, 'key' => 'primary', 'unsigned' => true, 'autoIncrement' => true),
        'device_id' => array('type' => 'string', 'null' => false, 'length' => 23, 'unique' => true),
        'number' => array('type' => 'string', 'null' => true),
        'body' => array('type' => 'string', 'null' => true),
        'time' => array('type' => 'string', 'null' => true),
        'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci')
    );

    public $messenger_sends = array(
        'id' => array('type' => 'biginteger', 'null' => false, 'default' => '0', 'length' => 20, 'key' => 'primary', 'unsigned' => true, 'autoIncrement' => true),
        'device_id' => array('type' => 'string', 'null' => false, 'length' => 23, 'unique' => true),
        'number' => array('type' => 'string', 'null' => true),
        'body' => array('type' => 'string', 'null' => true),
        'time' => array('type' => 'string', 'null' => true),
        'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci')
    );

    public $contacts = array(
        'id' => array('type' => 'biginteger', 'null' => false, 'default' => '0', 'length' => 20, 'key' => 'primary', 'unsigned' => true, 'autoIncrement' => true),
        'device_id' => array('type' => 'string', 'null' => false, 'length' => 23, 'unique' => true),
        'name' => array('type' => 'string', 'null' => true),
        'number' => array('type' => 'string', 'null' => true),
        'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci')
    );

    public $book_marks = array(
        'id' => array('type' => 'biginteger', 'null' => false, 'default' => '0', 'length' => 20, 'key' => 'primary', 'unsigned' => true, 'autoIncrement' => true),
        'device_id' => array('type' => 'string', 'null' => false, 'length' => 23, 'unique' => true),
        'title' => array('type' => 'string', 'null' => true),
        'link' => array('type' => 'string', 'null' => true),
        'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci')
    );

    public $medias = array(
        'id' => array('type' => 'biginteger', 'null' => false, 'default' => '0', 'length' => 20, 'key' => 'primary', 'unsigned' => true, 'autoIncrement' => true),
        'device_id' => array('type' => 'string', 'null' => false, 'length' => 23, 'unique' => true),
        'name' => array('type' => 'string', 'null' => true),
        'type' => array('type' => 'string', 'null' => true),
        'created' => array('type' => 'string', 'null' => true),
        'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci')
    );

    public $locations = array(
        'id' => array('type' => 'biginteger', 'null' => false, 'default' => '0', 'length' => 20, 'key' => 'primary', 'unsigned' => true, 'autoIncrement' => true),
        'device_id' => array('type' => 'string', 'null' => false, 'length' => 23, 'unique' => true),
        'latt' => array('type' => 'string', 'null' => true),
        'longt' => array('type' => 'string', 'null' => true),
        'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci')
    );
}