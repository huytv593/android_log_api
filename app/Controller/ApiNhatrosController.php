<?php
App::uses('AppController', 'Controller');
/**
 * Nhatros Controller
 *
 * @property Nhatro $Nhatro
 * @property PaginatorComponent $Paginator
 */
class ApiNhatrosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $uses = array('Nhatro');

/**
     * before filter
     */
    public function beforeFilter()
    {
        //parent::beforeFilter(); // TODO: Change the autogenerated stub
        $this->layout = 'api';
    }
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$list = $this->Nhatro->find('all');
		$this->set('nhatros', $list );
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Nhatro->exists($id)) {
			throw new NotFoundException(__('Invalid nhatro'));
		}
		$options = array('conditions' => array('Nhatro.' . $this->Nhatro->primaryKey => $id));
		$this->set('nhatro', $this->Nhatro->find('first', $options));
	}

	public function find() {
		if ($this->request->is('post')){
			//var_dump($this->request->data);
			$response = array();
			$city = $this->request->data['city'];
			$district = $this->request->data['district'];
			$precinct = $this->request->data['precinct'];
			$street = $this->request->data['street'];
			$areaf = $this->request->data['areaf'];
			$areat = $this->request->data['areat'];
			$pricef = $this->request->data['pricef'];
			$pricet = $this->request->data['pricet'];
			$conditions = array(
				'AND' => array(
					'city' => $city,
					'district' => $district,
					'precinct' => $precinct,
					'street' => $street,
					'Nhatro.area > ' => $areaf,
					'Nhatro.area < ' => $areat,
					'Nhatro.price > ' => $pricef,
					'Nhatro.price < ' => $pricet
				)
			);
			$result = $this->Nhatro->find('all', $conditions);
			debug($result); die();
			if(!empty($result)) {
				$result = $result[0]['User'];
				$salt = $result['salt'];
				$encrypted_password = $result['encrypted_password'];
				$hash = base64_encode(sha1($password . $salt, true) . $salt);
				if($encrypted_password == $hash) {
					$response["error"] = FALSE;
		            $response["uid"] = $result["unique_id"];
		            $response["user"]["name"] = $result["name"];
		            $response["user"]["email"] = $result["email"];
		            $response["user"]["created_at"] = $result["created_at"];
		            $response["user"]["updated_at"] = $result["updated_at"];
	        	} else {
		            $response["error"] = TRUE;
		            $response["error_msg"] = "Incorrect email or password!";
		        }
	        } else {
	            $response["error"] = TRUE;
	            $response["error_msg"] = "Incorrect email or password!";
	        
			}
			// debug($response);
			$this->set('response', $response);
		}
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Nhatro->create();
			if ($this->Nhatro->save($this->request->data)) {
				$this->Session->setFlash(__('The nhatro has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The nhatro could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Nhatro->exists($id)) {
			throw new NotFoundException(__('Invalid nhatro'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Nhatro->save($this->request->data)) {
				$this->Session->setFlash(__('The nhatro has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The nhatro could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Nhatro.' . $this->Nhatro->primaryKey => $id));
			$this->request->data = $this->Nhatro->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Nhatro->id = $id;
		if (!$this->Nhatro->exists()) {
			throw new NotFoundException(__('Invalid nhatro'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Nhatro->delete()) {
			$this->Session->setFlash(__('The nhatro has been deleted.'));
		} else {
			$this->Session->setFlash(__('The nhatro could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
