<?php
App::uses('AppController', 'Controller');
/**
 * OptionGroups Controller
 *
 * @property OptionGroup $OptionGroup
 * @property PaginatorComponent $Paginator
 */
class OptionGroupsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

    public function beforeFilter(){
        $this->set('inventory',array(
            __('Not for Inventory'),
            __('Use for inventory'),
        ));
    }
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->OptionGroup->recursive = 0;
		$this->set('optionGroups', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->OptionGroup->exists($id)) {
			throw new NotFoundException(__('Invalid option group'));
		}
		$options = array('conditions' => array('OptionGroup.' . $this->OptionGroup->primaryKey => $id));
		$this->set('optionGroup', $this->OptionGroup->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->OptionGroup->create();
			if ($this->OptionGroup->save($this->request->data)) {
				$this->Session->setFlash(__('The option group has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The option group could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
		if (!$this->OptionGroup->exists($id)) {
			throw new NotFoundException(__('Invalid option group'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->OptionGroup->save($this->request->data)) {
				$this->Session->setFlash(__('The option group has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The option group could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('OptionGroup.' . $this->OptionGroup->primaryKey => $id));
			$this->request->data = $this->OptionGroup->find('first', $options);
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
		$this->OptionGroup->id = $id;
		if (!$this->OptionGroup->exists()) {
			throw new NotFoundException(__('Invalid option group'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->OptionGroup->delete()) {
			$this->Session->setFlash(__('The option group has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The option group could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
