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
		'app.cliente',
		'app.cidade',
		'app.unidade',
		'app.subgrupo',
		'app.grupo',
		'app.chamado',
		'app.tipo',
		'app.problema',
		'app.situacao',
		'app.historico',
		'app.checklist',
		'app.servico',
		'app.checklists_servico',
		'app.historicos_servico',
		'app.mural'
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

}
