<?php
App::uses('AppController', 'Controller');
/**
 * ProductPromotes Controller
 *
 * @property ProductPromote $ProductPromote
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ProductPromotesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ProductPromote->recursive = 0;
		$promote_id = 0;
		if(!$this->request->is("ajax")){
			$promotes = $this->ProductPromote->Promote->find("all",array("conditions"=>array(),"recursive"=>-1,"order" => array("Promote.begin DESC")));
			$promote_id = isset($promotes[0]["Promote"]["id"])? $promotes[0]["Promote"]["id"] : 0;
		}else{
			$this->layout = "ajax";
			$promote_id = $this->request->data("promote_id");
		}
		$this->Paginator->settings = array(
			"conditions" => array(
				"promote_id" => $promote_id
			)
		);
		$this->set(compact("promotes","promote_id"));
		$this->set('productPromotes', $this->Paginator->paginate());
	}
	 public function product_not_inpromote(){
		if($this->request->is('ajax')){
			$this->layout = 'ajax';
			if(empty($this->request->data['category_id']) || empty($this->request->data['promote_id'])){
				die;
			}
			$not_in = array(0);
			if(!empty($this->request->data['not_in'])){
				$not_in = $this->request->data('not_in');
			}
			$categories = $this->ProductPromote->Product->Category->children($this->request->data('category_id'), null, 'Category.id');
			$categories = Set::combine($categories,'{n}.Category.id','{n}.Category.id');
			$categories[] = $this->request->data('category_id');
			$products = $this->ProductPromote->Product->query("
				SELECT `Product`.`id`,`Product`.`name`,`Thumb`.`file`
				FROM `products` AS `Product`
					LEFT JOIN `medias` AS `Thumb`
					ON `Thumb`.`id` = `Product`.`media_id`
				WHERE `Product`.`category_id` IN (".implode(',',$categories).")
					  AND `Product`.`id` NOT IN (SELECT `product_id` FROM `product_promotes` WHERE `id` = ".$this->request->data('promote_id').")
					  AND `Product`.`id` NOT IN (".implode(',',$not_in).");
					  AND `Product`.`name` <> '0'
			");
			$this->set(compact('products'));
		}
	 }
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ProductPromote->exists($id)) {
			throw new NotFoundException(__('Invalid product promote'));
		}
		$options = array('conditions' => array('ProductPromote.' . $this->ProductPromote->primaryKey => $id));
		$this->set('productPromote', $this->ProductPromote->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post') && $this->request->is('ajax')) {
			$this->layout = 'ajax';

			if(empty($this->request->data['promote_id']) || empty($this->request->data['products'])){
				echo 0;
				die;
			}
			$saveData = array();
			$promote_id = $this->request->data('promote_id');
			foreach($this->request->data('products') as $product){
				$saveData[] = array(
					'promote_id' => $promote_id,
					'product_id' => $product,
				);
			}
			$this->ProductPromote->saveMany($saveData);
			echo 1;
			die;
//			$this->ProductPromote->create();
//			if ($this->ProductPromote->save($this->request->data)) {
//				$this->Session->setFlash(__('The product promote has been saved.'), 'default', array('class' => 'alert alert-success'));
//				return $this->redirect(array('action' => 'index'));
//			} else {
//				$this->Session->setFlash(__('The product promote could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
//			}
		}
		$promotes = $this->ProductPromote->Promote->find("all",array("conditions"=>array(),"recursive"=>-1,"order" => array("Promote.begin DESC")));
		$promotes = Set::combine($promotes, "{n}.Promote.id",array("{0} ({1} - {2})", "{n}.Promote.name" ,"{n}.Promote.begin","{n}.Promote.end"));
		$categories = $this->ProductPromote->Product->Category->find('threaded', array(
			'fields' => array('id', 'parent_id', 'name'),
			'order' => array('id ASC') // or array('id ASC')
		));
		$this->set(compact('promotes','categories'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ProductPromote->exists($id)) {
			throw new NotFoundException(__('Invalid product promote'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ProductPromote->save($this->request->data)) {
				$this->Session->setFlash(__('The product promote has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product promote could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('ProductPromote.' . $this->ProductPromote->primaryKey => $id));
			$this->request->data = $this->ProductPromote->find('first', $options);
		}
		$products = $this->ProductPromote->Product->find('list');
		$promotes = $this->ProductPromote->Promote->find('list');
		$this->set(compact('products', 'promotes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ProductPromote->id = $id;
		if (!$this->ProductPromote->exists()) {
			throw new NotFoundException(__('Invalid product promote'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ProductPromote->delete()) {
			$this->Session->setFlash(__('The product promote has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The product promote could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
