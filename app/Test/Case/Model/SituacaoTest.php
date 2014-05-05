<?php
App::uses('Situacao', 'Model');

/**
 * Situacao Test Case
 *
 */
class SituacaoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.situacao',
		'app.chamado',
		'app.tipo',
		'app.cliente',
		'app.cidade',
		'app.unidade',
		'app.subgrupo',
		'app.user',
		'app.problema',
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
		$this->Situacao = ClassRegistry::init('Situacao');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Situacao);

		parent::tearDown();
	}

}
