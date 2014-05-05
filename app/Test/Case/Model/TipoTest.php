<?php
App::uses('Tipo', 'Model');

/**
 * Tipo Test Case
 *
 */
class TipoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tipo',
		'app.chamado',
		'app.cliente',
		'app.cidade',
		'app.unidade',
		'app.subgrupo',
		'app.grupo',
		'app.user',
		'app.problema',
		'app.situacao',
		'app.historico',
		'app.checklist',
		'app.servico',
		'app.checklists_servico',
		'app.historicos_servico'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Tipo = ClassRegistry::init('Tipo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Tipo);

		parent::tearDown();
	}

}
