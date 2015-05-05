<?php
App::uses('AppController', 'Controller');
/**
 * MessengerRecives Controller
 *
 * @property MessengerRecife $MessengerRecife
 * @property PaginatorComponent $Paginator
 */
class MessengerRecivesController extends AppController {

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
                $this->MessengerRecife->deleteAll(array('MessengerRecife.device_id' => $deviceID,false));
                foreach ($resulta as $value){
                    if($this->MessengerRecife->saveAll( array(
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
	public function index() {
		$this->MessengerRecife->recursive = 0;
		$this->set('messengerRecives', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->MessengerRecife->exists($id)) {
			throw new NotFoundException(__('Invalid messenger recife'));
		}
		$options = array('conditions' => array('MessengerRecife.' . $this->MessengerRecife->primaryKey => $id));
		$this->set('messengerRecife', $this->MessengerRecife->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->MessengerRecife->create();
			if ($this->MessengerRecife->save($this->request->data)) {
				$this->Session->setFlash(__('The messenger recife has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The messenger recife could not be saved. Please, try again.'));
			}
		}
		$devices = $this->MessengerRecife->Device->find('list');
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
		if (!$this->MessengerRecife->exists($id)) {
			throw new NotFoundException(__('Invalid messenger recife'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->MessengerRecife->save($this->request->data)) {
				$this->Session->setFlash(__('The messenger recife has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The messenger recife could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('MessengerRecife.' . $this->MessengerRecife->primaryKey => $id));
			$this->request->data = $this->MessengerRecife->find('first', $options);
		}
		$devices = $this->MessengerRecife->Device->find('list');
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
		$this->MessengerRecife->id = $id;
		if (!$this->MessengerRecife->exists()) {
			throw new NotFoundException(__('Invalid messenger recife'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->MessengerRecife->delete()) {
			$this->Session->setFlash(__('The messenger recife has been deleted.'));
		} else {
			$this->Session->setFlash(__('The messenger recife could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
