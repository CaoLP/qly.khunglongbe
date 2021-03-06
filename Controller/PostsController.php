<?php
App::uses('AppController', 'Controller');
/**
 * Posts Controller
 *
 * @property Post $Post
 * @property PaginatorComponent $Paginator
 * @property nComponent $n
 * @property SessionComponent $Session
 */
class PostsController extends AppController {

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
	public $components = array('Paginator',  'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Post->recursive = 0;
		$this->set('posts', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Post->exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		$options = array('conditions' => array('Post.' . $this->Post->primaryKey => $id));
		$this->set('post', $this->Post->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			if(empty($this->request->data['Post']['slug']))
				$this->request->data['Post']['slug'] = $this->make_slug($this->request->data['Post']['title'] );
			$this->Post->create();
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash(__('The post has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The post could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$id = $this->Post->getNextAutoNumber($this->Post);
		$this->request->data('Post.id',$id);
		$postCategories = $this->Post->PostCategory->find('list');
		$trackableCreators = $this->Post->TrackableCreator->find('list');
		$trackableUpdaters = $this->Post->TrackableUpdater->find('list');
		$this->set(compact('postCategories', 'trackableCreators', 'trackableUpdaters'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Post->exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if(empty($this->request->data['Post']['slug']))
				$this->request->data['Post']['slug'] = $this->make_slug($this->request->data['Post']['title'] );
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash(__('The post has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The post could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Post.' . $this->Post->primaryKey => $id));
			$this->request->data = $this->Post->find('first', $options);
		}
		$postCategories = $this->Post->PostCategory->find('list');
		$trackableCreators = $this->Post->TrackableCreator->find('list');
		$trackableUpdaters = $this->Post->TrackableUpdater->find('list');
		$this->set(compact('postCategories', 'trackableCreators', 'trackableUpdaters'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Post->id = $id;
		if (!$this->Post->exists()) {
			throw new NotFoundException(__('Invalid post'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Post->delete()) {
			$this->Session->setFlash(__('The post has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The post could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
