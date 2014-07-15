<?php
App::uses('FunctionalityType', 'Model');

/**
 * FunctionalityType Test Case
 *
 */
class FunctionalityTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.functionality_type',
		'app.functionality',
		'app.role',
		'app.roles_functionality'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FunctionalityType = ClassRegistry::init('FunctionalityType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FunctionalityType);

		parent::tearDown();
	}

}
