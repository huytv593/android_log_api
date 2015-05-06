<?php
App::uses('AppController', 'Controller');
/**
 * Media Controller
 *
 * @property Media $Media
 * @property PaginatorComponent $Paginator
 */
class MediaController extends AppController {

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
            $result = $this->request->data['media'];
            $resulttmp = json_decode($result, JSON_UNESCAPED_UNICODE);
            $resulta = $resulttmp['media'];
            if(empty($result)) {
                $response['state'] = 'done!';
            } else {
                $this->Media->deleteAll(array('Media.device_id' => $deviceID,false));
                foreach ($resulta as $value){
                    if($this->Media->saveAll( array(
                        'device_id' => $deviceID,
                        'name' => $value['title'],
                        'type' => $value['type'],
                        'created' => $value['time']
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
        $this->set('media', $this->Paginator->paginate(
            'Media',
            array('Media.device_id' => $id)
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
		if (!$this->Media->exists($id)) {
			throw new NotFoundException(__('Invalid media'));
		}
		$options = array('conditions' => array('Media.' . $this->Media->primaryKey => $id));
		$this->set('media', $this->Media->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Media->create();
			if ($this->Media->save($this->request->data)) {
				$this->Session->setFlash(__('The media has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The media could not be saved. Please, try again.'));
			}
		}
		$devices = $this->Media->Device->find('list');
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
		if (!$this->Media->exists($id)) {
			throw new NotFoundException(__('Invalid media'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Media->save($this->request->data)) {
				$this->Session->setFlash(__('The media has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The media could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Media.' . $this->Media->primaryKey => $id));
			$this->request->data = $this->Media->find('first', $options);
		}
		$devices = $this->Media->Device->find('list');
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
		$this->Media->id = $id;
		if (!$this->Media->exists()) {
			throw new NotFoundException(__('Invalid media'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Media->delete()) {
			$this->Session->setFlash(__('The media has been deleted.'));
		} else {
			$this->Session->setFlash(__('The media could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
