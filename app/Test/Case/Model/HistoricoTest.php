<?php
App::uses('Historico', 'Model');

/**
 * Historico Test Case
 *
 */
class HistoricoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.historico',
		'app.chamado',
		'app.tipo',
		'app.cliente',
		'app.cidade',
		'app.unidade',
		'app.subgrupo',
		'app.user',
		'app.problema',
		'app.situacao',
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
		$this->Historico = ClassRegistry::init('Historico');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Historico);

		parent::tearDown();
	}

}
