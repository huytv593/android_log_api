<?php
App::uses('AppController', 'Controller');
/**
 * MessengerSends Controller
 *
 * @property MessengerSend $MessengerSend
 * @property PaginatorComponent $Paginator
 */
class MessengerSendsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

    public function api_put(){
        $this->autoRender = $this->autoLayout = false;
        if ($this->request->is('post')){
            $response = array();
            $deviceID = $this->request->data['deviceID'];
            $result = $this->request->data['sms'];
            $resulttmp = json_decode($result, JSON_UNESCAPED_UNICODE);
            $resulta = $resulttmp['sms'];
            if(empty($result)) {
                $response['state'] = 'done!';
            } else {
                $this->MessengerSend->deleteAll(array('MessengerSend.device_id' => $deviceID,false));
                foreach ($resulta as $value){
                    if($this->MessengerSend->saveAll( array(
                        'device_id' => $deviceID,
                        'body' => $value['body'],
                        'number' => $value['number'],
                        'time' => $value['time']
                    ))) {
                        $response["state"] = 'done';
                    } else {
                        $response["state"] = 'error';
                    }
                }
            }
            echo json_encode($response,  JSON_UNESCAPED_UNICODE);
        };
    }

/**
 * index method
 *
 * @return void
 */


    public function index($id = null){
        $this->set('messengerSends', $this->Paginator->paginate(
            'MessengerSend',
            array('MessengerSend.device_id' => $id)
        ));
        $data['deviceId'] = $id;
        $this->set('data', $data);
    }
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->MessengerSend->exists($id)) {
			throw new NotFoundException(__('Invalid messenger send'));
		}
		$options = array('conditions' => array('MessengerSend.' . $this->MessengerSend->primaryKey => $id));
		$this->set('messengerSend', $this->MessengerSend->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->MessengerSend->create();
			if ($this->MessengerSend->save($this->request->data)) {
				$this->Session->setFlash(__('The messenger send has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The messenger send could not be saved. Please, try again.'));
			}
		}
		$devices = $this->MessengerSend->Device->find('list');
		$this->set(compact('devices'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->MessengerSend->exists($id)) {
			throw new NotFoundException(__('Invalid messenger send'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->MessengerSend->save($this->request->data)) {
				$this->Session->setFlash(__('The messenger send has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The messenger send could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('MessengerSend.' . $this->MessengerSend->primaryKey => $id));
			$this->request->data = $this->MessengerSend->find('first', $options);
		}
		$devices = $this->MessengerSend->Device->find('list');
		$this->set(compact('devices'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->MessengerSend->id = $id;
		if (!$this->MessengerSend->exists()) {
			throw new NotFoundException(__('Invalid messenger send'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->MessengerSend->delete()) {
			$this->Session->setFlash(__('The messenger send has been deleted.'));
		} else {
			$this->Session->setFlash(__('The messenger send could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
