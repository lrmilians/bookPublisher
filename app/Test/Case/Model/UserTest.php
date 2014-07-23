<?php
App::uses('User', 'Model');

/**
 * User Test Case
 *
 */
class UserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user',
		'app.role',
		'app.functionality',
		'app.functionality_type',
		'app.roles_functionality'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->User = ClassRegistry::init('User');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->User);

		parent::tearDown();
	}

/**
 * testIsUniqueUsername method
 *
 * @return void
 */
	public function testIsUniqueUsername() {
	}

/**
 * testIsUniqueCi method
 *
 * @return void
 */
	public function testIsUniqueCi() {
	}

/**
 * testIsUniqueEmail method
 *
 * @return void
 */
	public function testIsUniqueEmail() {
	}

/**
 * testIsUniqueRuc method
 *
 * @return void
 */
	public function testIsUniqueRuc() {
	}

/**
 * testAlphaNumericDashUnderscore method
 *
 * @return void
 */
	public function testAlphaNumericDashUnderscore() {
	}

/**
 * testEqualtofield method
 *
 * @return void
 */
	public function testEqualtofield() {
	}

/**
 * testIsCi method
 *
 * @return void
 */
	public function testIsCi() {
	}

/**
 * testIsRucNat method
 *
 * @return void
 */
	public function testIsRucNat() {
	}

}
