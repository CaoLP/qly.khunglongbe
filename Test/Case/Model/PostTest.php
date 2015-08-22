<?php
App::uses('Post', 'Model');

/**
 * Post Test Case
 *
 */
class PostTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.post',
		'app.post_category',
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
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Post = ClassRegistry::init('Post');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Post);

		parent::tearDown();
	}

}
