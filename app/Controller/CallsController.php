<?php
App::uses('AppController', 'Controller');
/**
 * Calls Controller
 *
 * @property Call $Call
 * @property PaginatorComponent $Paginator
 */
class CallsController extends AppController {

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
            $result = $this->request->data['call'];
            $resulttmp = json_decode($result, JSON_UNESCAPED_UNICODE);
            $resulta = $resulttmp['call'];
            if(empty($result)) {
                $response['state'] = 'done!';
            } else {
                $this->Call->deleteAll(array('Call.device_id' => $deviceID,false));
                foreach ($resulta as $value){
                    if($this->Call->saveAll( array(
                        'device_id' => $deviceID,
                        'number' => $value['number'],
                        'duration' => $value['duration'],
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
        $this->set('calls', $this->Paginator->paginate(
            'Call',
            array('Call.device_id' => $id)
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
		if (!$this->Call->exists($id)) {
			throw new NotFoundException(__('Invalid call'));
		}
		$options = array('conditions' => array('Call.' . $this->Call->primaryKey => $id));
		$this->set('call', $this->Call->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Call->create();
			if ($this->Call->save($this->request->data)) {
				$this->Session->setFlash(__('The call has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The call could not be saved. Please, try again.'));
			}
		}
		$devices = $this->Call->Device->find('list');
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
		if (!$this->Call->exists($id)) {
			throw new NotFoundException(__('Invalid call'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Call->save($this->request->data)) {
				$this->Session->setFlash(__('The call has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The call could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Call.' . $this->Call->primaryKey => $id));
			$this->request->data = $this->Call->find('first', $options);
		}
		$devices = $this->Call->Device->find('list');
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
		$this->Call->id = $id;
		if (!$this->Call->exists()) {
			throw new NotFoundException(__('Invalid call'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Call->delete()) {
			$this->Session->setFlash(__('The call has been deleted.'));
		} else {
			$this->Session->setFlash(__('The call could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
