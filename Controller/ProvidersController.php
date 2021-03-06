<?php
App::uses('AppController', 'Controller');
/**
 * Providers Controller
 *
 * @property Provider $Provider
 * @property PaginatorComponent $Paginator
 */
class ProvidersController extends AppController {


	/**
	 * Helpers
	 *
	 * @var array
	 */
	public $helpers = array('Media');
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
		$this->Provider->recursive = 0;
		$this->set('providers', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Provider->exists($id)) {
			throw new NotFoundException(__('Invalid provider'));
		}
		$options = array('conditions' => array('Provider.' . $this->Provider->primaryKey => $id));
		$this->set('provider', $this->Provider->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
            if(!isset($this->request->data['Provider']['slug']))
                $this->request->data['Provider']['slug'] = $this->make_slug($this->request->data['Provider']['name']);
			$this->Provider->create();
			if ($this->Provider->save($this->request->data)) {
				$this->Session->setFlash(__('The provider has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The provider could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
		if (!$this->Provider->exists($id)) {
			throw new NotFoundException(__('Invalid provider'));
		}
		if ($this->request->is(array('post', 'put'))) {
            if(empty($this->request->data['Provider']['slug']))
                $this->request->data['Provider']['slug'] = $this->make_slug($this->request->data['Provider']['name']);
			if ($this->Provider->save($this->request->data)) {
				$this->Session->setFlash(__('The provider has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The provider could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Provider.' . $this->Provider->primaryKey => $id));
			$this->request->data = $this->Provider->find('first', $options);
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
		$this->Provider->id = $id;
		if (!$this->Provider->exists()) {
			throw new NotFoundException(__('Invalid provider'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Provider->delete()) {
			$this->Session->setFlash(__('The provider has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The provider could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
