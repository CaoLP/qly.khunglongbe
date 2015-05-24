<?php
App::uses('AppController', 'Controller');
/**
 * Reexes Controller
 *
 * @property Reex $Reex
 * @property PaginatorComponent $Paginator
 */
class ReexesController extends AppController {

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
		$this->Reex->recursive = 0;
		$this->set('reexes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Reex->exists($id)) {
			throw new NotFoundException(__('Invalid reex'));
		}
		$options = array('conditions' => array('Reex.' . $this->Reex->primaryKey => $id));
		$this->set('reex', $this->Reex->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Reex->create();
			if ($this->Reex->save($this->request->data)) {
				$this->Session->setFlash(__('The reex has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The reex could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$stores = $this->Reex->Store->find('list');
		$this->set(compact('stores'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Reex->exists($id)) {
			throw new NotFoundException(__('Invalid reex'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Reex->save($this->request->data)) {
				$this->Session->setFlash(__('The reex has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The reex could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Reex.' . $this->Reex->primaryKey => $id));
			$this->request->data = $this->Reex->find('first', $options);
		}
		$stores = $this->Reex->Store->find('list');
		$this->set(compact('stores'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Reex->id = $id;
		if (!$this->Reex->exists()) {
			throw new NotFoundException(__('Invalid reex'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Reex->delete()) {
			$this->Session->setFlash(__('The reex has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The reex could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
