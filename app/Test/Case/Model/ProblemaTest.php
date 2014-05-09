<?php
App::uses('Problema', 'Model');

/**
 * Problema Test Case
 *
 */
class ProblemaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.problema',
		'app.chamado',
		'app.tipo',
		'app.cliente',
		'app.cidade',
		'app.unidade',
		'app.subgrupo',
		'app.user',
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
		$this->Problema = ClassRegistry::init('Problema');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Problema);

		parent::tearDown();
	}

}
