<?php
App::uses('PostCategoriesController', 'Controller');

/**
 * PostCategoriesController Test Case
 *
 */
class PostCategoriesControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.post_category',
		'app.post',
		'app.user',
		'app.store',
		'app.customer_promote',
		'app.customer',
		'app.order',
		'app.promote',
		'app.media',
		'app.order_detail',
		'app.product',
		'app.provider',
		'app.category',
		'app.inout_warehouse_detail',
		'app.inout_warehouse',
		'app.product_category',
		'app.product_option',
		'app.option',
		'app.option_group',
		'app.option_cat',
		'app.product_subitem',
		'app.warehouse',
		'app.warehouse_option',
		'app.reex'
	);

/**
 * testIndex method
 *
 * @return void
 */
	public function testIndex() {
		$this->markTestIncomplete('testIndex not implemented.');
	}

/**
 * testView method
 *
 * @return void
 */
	public function testView() {
		$this->markTestIncomplete('testView not implemented.');
	}

/**
 * testAdd method
 *
 * @return void
 */
	public function testAdd() {
		$this->markTestIncomplete('testAdd not implemented.');
	}

/**
 * testEdit method
 *
 * @return void
 */
	public function testEdit() {
		$this->markTestIncomplete('testEdit not implemented.');
	}

/**
 * testDelete method
 *
 * @return void
 */
	public function testDelete() {
		$this->markTestIncomplete('testDelete not implemented.');
	}

}
