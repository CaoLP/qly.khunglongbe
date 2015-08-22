<?php
App::uses('PostCategory', 'Model');

/**
 * PostCategory Test Case
 *
 */
class PostCategoryTest extends CakeTestCase {

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
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PostCategory = ClassRegistry::init('PostCategory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PostCategory);

		parent::tearDown();
	}

}
