<?php
App::uses('Mural', 'Model');

/**
 * Mural Test Case
 *
 */
class MuralTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.mural',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Mural = ClassRegistry::init('Mural');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Mural);

		parent::tearDown();
	}

}
