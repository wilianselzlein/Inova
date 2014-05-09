<?php
App::uses('Chamado', 'Model');

/**
 * Chamado Test Case
 *
 */
class ChamadoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.chamado',
		'app.tipo',
		'app.cliente',
		'app.problema',
		'app.situacao',
		'app.historico'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Chamado = ClassRegistry::init('Chamado');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Chamado);

		parent::tearDown();
	}

}
