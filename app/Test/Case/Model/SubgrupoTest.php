<?php
App::uses('Subgrupo', 'Model');

/**
 * Subgrupo Test Case
 *
 */
class SubgrupoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.subgrupo',
		'app.grupo',
		'app.cliente',
		'app.cidade',
		'app.unidade',
		'app.user',
		'app.chamado',
		'app.tipo',
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
		$this->Subgrupo = ClassRegistry::init('Subgrupo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Subgrupo);

		parent::tearDown();
	}

}
