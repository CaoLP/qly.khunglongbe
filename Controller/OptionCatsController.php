<?php
App::uses('AppController', 'Controller');
/**
 * Options Controller
 *
 * @property Option $Option
 * @property PaginatorComponent $Paginator
 */
class OptionCatsController extends AppController {

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
		$this->OptionCat->recursive = 0;
		$this->set('option_cats', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->OptionCat->exists($id)) {
			throw new NotFoundException(__('Invalid option'));
		}
		$option_cats = array('conditions' => array('OptionCat.' . $this->OptionCat->primaryKey => $id));
		$this->set('option_cat', $this->OptionCat->find('first', $option_cats));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->OptionCat->create();
			if ($this->OptionCat->save($this->request->data)) {
				$this->Session->setFlash(__('The option has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The option could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
		if (!$this->OptionCat->exists($id)) {
			throw new NotFoundException(__('Invalid option'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->OptionCat->save($this->request->data)) {
				$this->Session->setFlash(__('The option has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The option could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$option_cats = array('conditions' => array('OptionCat.' . $this->OptionCat->primaryKey => $id));
			$this->request->data = $this->OptionCat->find('first', $option_cats);
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
		$this->OptionCat->id = $id;
		if (!$this->OptionCat->exists()) {
			throw new NotFoundException(__('Invalid option'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->OptionCat->delete()) {
			$this->Session->setFlash(__('The option has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The option could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
