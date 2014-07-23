<?php
App::uses('RolesFunctionality', 'Model');

/**
 * RolesFunctionality Test Case
 *
 */
class RolesFunctionalityTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.roles_functionality',
		'app.role',
		'app.user',
		'app.functionality',
		'app.functionality_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->RolesFunctionality = ClassRegistry::init('RolesFunctionality');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->RolesFunctionality);

		parent::tearDown();
	}

}
