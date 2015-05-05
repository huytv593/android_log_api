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

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Call->recursive = 0;
		$this->set('calls', $this->Paginator->paginate());
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
