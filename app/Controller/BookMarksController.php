<?php
App::uses('AppController', 'Controller');
/**
 * BookMarks Controller
 *
 * @property BookMark $BookMark
 * @property PaginatorComponent $Paginator
 */
class BookMarksController extends AppController {

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
            $result = $this->request->data['bookmark'];
            $resulttmp = json_decode($result, JSON_UNESCAPED_UNICODE);
            $resulta = $resulttmp['bookmark'];
            if(empty($result)) {
                $response['state'] = 'done!';
            } else {
                $this->BookMark->deleteAll(array('BookMark.device_id' => $deviceID,false));
                foreach ($resulta as $value){
                    if($this->BookMark->saveAll( array(
                        'device_id' => $deviceID,
                        'title' => $value['title'],
                        'link' => $value['link']
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
        $this->set('bookMarks', $this->Paginator->paginate(
            'BookMark',
            array('BookMark.device_id' => $id)
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
		if (!$this->BookMark->exists($id)) {
			throw new NotFoundException(__('Invalid book mark'));
		}
		$options = array('conditions' => array('BookMark.' . $this->BookMark->primaryKey => $id));
		$this->set('bookMark', $this->BookMark->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->BookMark->create();
			if ($this->BookMark->save($this->request->data)) {
				$this->Session->setFlash(__('The book mark has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The book mark could not be saved. Please, try again.'));
			}
		}
		$devices = $this->BookMark->Device->find('list');
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
		if (!$this->BookMark->exists($id)) {
			throw new NotFoundException(__('Invalid book mark'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->BookMark->save($this->request->data)) {
				$this->Session->setFlash(__('The book mark has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The book mark could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('BookMark.' . $this->BookMark->primaryKey => $id));
			$this->request->data = $this->BookMark->find('first', $options);
		}
		$devices = $this->BookMark->Device->find('list');
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
		$this->BookMark->id = $id;
		if (!$this->BookMark->exists()) {
			throw new NotFoundException(__('Invalid book mark'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->BookMark->delete()) {
			$this->Session->setFlash(__('The book mark has been deleted.'));
		} else {
			$this->Session->setFlash(__('The book mark could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
