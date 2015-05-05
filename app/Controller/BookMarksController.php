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

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->BookMark->recursive = 0;
		$this->set('bookMarks', $this->Paginator->paginate());
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
