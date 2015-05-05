<?php

class AppSchema extends CakeSchema
{

    public function before($event = array())
    {
        $db = ConnectionManager::getDataSource($this->connection);
        $db->cacheSources = false;
        return true;
    }

    public function after($event = array())
    {
        if (isset($event['update'])) {
            $this->addData($event['update']);
        }
        if (isset($event['create'])) {
            $this->addData($event['create']);
        }
    }

    private function addData($tableName = null)
    {
        App::uses('ClassRegistry', 'Utility');
        switch ($tableName) {
            case 'users':
                ClassRegistry::flush();
                $user = ClassRegistry::init('users');
                $firstUser = $user->find('first');
                if ($firstUser) {
                    break;
                }
                $user->create();
                $user->saveAll(
                    array('users' =>
                        array(
                        	'unique_id' => '552ea12aaf66a9.40421091',
                            'name' => 'huytv',
                            'email' => 'huytv@zxc.com',
                            'encrypted_password' => '1NqB5eusljh2dgCsdreQXvImgDBkZTI5MzY1ZTUw',
                            'salt' => 'de29365e50',
                        )
                    )
                );
                break;
            default:
                break;
        }
    }

    public $users = array(
        'id' => array('type' => 'biginteger', 'null' => false, 'default' => '0', 'length' => 20, 'key' => 'primary', 'unsigned' => true, 'autoIncrement' => true),
        'device_id' => array('type' => 'string', 'null' => false, 'length' => 23, 'unique' => true),
        'user_id' => array('type' => 'string', 'null' => false, 'unique' => true),
        'admin' => array('type' => 'integer', 'default' => '0', 'null' =>false ),
        'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci')
    );
}