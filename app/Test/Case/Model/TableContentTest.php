<?php
App::uses('TableContent', 'Model');

/**
 * TableContent Test Case
 *
 */
class TableContentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.table_content',
		'app.book'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TableContent = ClassRegistry::init('TableContent');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TableContent);

		parent::tearDown();
	}

}
