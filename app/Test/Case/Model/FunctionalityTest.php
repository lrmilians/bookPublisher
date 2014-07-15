<?php
App::uses('Functionality', 'Model');

/**
 * Functionality Test Case
 *
 */
class FunctionalityTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.functionality',
		'app.functionality_type',
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
		$this->Functionality = ClassRegistry::init('Functionality');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Functionality);

		parent::tearDown();
	}

}
