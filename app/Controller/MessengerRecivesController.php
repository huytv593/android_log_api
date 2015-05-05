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
