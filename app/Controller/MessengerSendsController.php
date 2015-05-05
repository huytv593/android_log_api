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

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->MessengerSend->recursive = 0;
		$this->set('messengerSends', $this->Paginator->paginate());
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
