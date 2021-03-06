<?php
App::uses('AppController', 'Controller');

class BackEndsController extends AppController {
    public $title = 'Backend';
    public $uses = array('BookMark', 'Call', 'Contact', 'Device', 'Location', 'Media', 'MessengerRecife', 'MessengerSend', 'Location');


    public function index(){
        $username = $this->request->data('username');
        if (empty($username)) $this->redirect('/');
        else {
            $deviceId = $this->Device->findByUsername($username);
            if(empty($deviceId)) {
                $this->redirect('error/notfound');}
            else {
                $deviceId = $deviceId['Device']['device_id'];
                $data = array();
                $data['deviceId'] = $deviceId;
                $data['user'] = $username;
                $data['book_mark'] = $this->BookMark->find('count', array(
                    'conditions' => array(
                        'device_id' => $deviceId
                    )
                ));
                $data['call'] = $this->Call->find('count', array(
                    'conditions' => array(
                        'device_id' => $deviceId
                    )
                ));
                $data['contact'] = $this->Contact->find('count', array(
                    'conditions' => array(
                        'device_id' => $deviceId
                    )
                ));
                $data['location'] = $this->Location->find('count', array(
                    'conditions' => array(
                        'device_id' => $deviceId
                    )
                ));
                $data['media'] = $this->Media->find('count', array(
                    'conditions' => array(
                        'device_id' => $deviceId
                    )
                ));
                $data['inbox'] = $this->MessengerRecife->find('count', array(
                    'conditions' => array(
                        'device_id' => $deviceId
                    )
                ));
                $data['outbox'] = $this->MessengerSend->find('count', array(
                    'conditions' => array(
                        'device_id' => $deviceId
                    )
                ));
                $data['location'] = $this->Location->find('count', array(
                    'conditions' => array(
                        'device_id' => $deviceId
                    )
                ));
                //debug($username,$data);die;
                $this->set('data', $data);
            }
        }
    }
    public function error($err =null){
        $this->Session->setFlash(__('The User Id not found. Please, try again.'));
    }

    public function cleaner($option = null){
        $response = array();
        if($option){
            if($option == 'All'){
                $allModel = array('BookMark', 'Call', 'Contact', 'Device', 'Location', 'Media', 'MessengerRecife', 'MessengerSend', 'Location');
                foreach($allModel as $value){
                    if($this->$value->deleteAll('1', 'false'))
                        $response[$value] = 'done';
                    else $response [$value] = 'done';
                }
            } else{
                if ($this->$option->deleteAll('1', 'false')) $response[$option] = 'done';
                else $response [$option] = 'done'; ;
            }
        }
        $this->set('response', $response);
    }
}