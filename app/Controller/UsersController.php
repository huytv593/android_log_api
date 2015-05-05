<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * login method
 *
 * @return void
 */
	public function login() {
		$this->autoRender = $this->autoLayout = false;
		if ($this->request->is('post')){
			$response = array();
			$email = $this->request->data['email'];
			$password = $this->request->data['password'];
			$result = $this->User->findAllByEmail($email);
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
		            //$response["user"]["updated_at"] = $result["updated_at"];
	        	} else {
		            $response["error"] = TRUE;
		            $response["error_msg"] = "Email hoặc mật khẩu không đúng!";
		        }
	        } else {
	            $response["error"] = TRUE;
	            $response["error_msg"] = "Email hoặc mật khẩu không đúng!";
			}
			echo json_encode($response,  JSON_UNESCAPED_UNICODE);
		}
	}
/**
* register method
*
* @return void
*/
	public function register() {
		if ($this->request->is('post')){
			$response = array();
			$deviceID = $this->request->data['deviceID'];
			$result = $this->User->findAllByDeviceId($deviceID);
			if(!empty($result)) {
				$response['userId'] = $result[0]['User']['user_id'];
			} else {
		        $userId = $this->hashSSHA($deviceID);
				$this->User->create();
				if($this->User->saveAll( array(
                	'device_id' => $deviceID,
                    'user_id' => $userId
                ))) {
		            $response["userId"] = $userId;
                } else {
					$response["userId"] = 'error';
				}
			}
			$this->set('response', $response);
		}
	}


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
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
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * Encrypting password
 * @param password
 * returns salt and encrypted password
 */
    public function hashSSHA($deviceID) {

        $salt = sha1($deviceID);
        $salt = substr($salt, 0, 6);
        return $salt;
    }
}
