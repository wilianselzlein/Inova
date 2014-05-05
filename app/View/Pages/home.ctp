

<?php
$links = array(
	'links' => array (
		array('url'=> "./chamados", 	'descricao' => "Chamados"	),
		array('url'=> "./checklists", 	'descricao' => "Checklists"	),
		array('url'=> "./cidades", 		'descricao' => "Cidades"	),
		array('url'=> "./clientes", 	'descricao' => "Clientes"	),
		array('url'=> "./grupos", 		'descricao' => "Grupos"		),
		array('url'=> "./historicos", 	'descricao' => "Históricos"	),
		array('url'=> "./murals", 		'descricao' => "Mural"		),
		array('url'=> "./problemas", 	'descricao' => "Problemas"	),
		array('url'=> "./servicos", 	'descricao' => "Serviços"	),
		array('url'=> "./situacaos", 	'descricao' => "Situações"	),
		array('url'=> "./subgrupos", 	'descricao' => "Subgrupos"	),
		array('url'=> "./tipos", 		'descricao' => "Tipos"		),
		array('url'=> "./unidades", 	'descricao' => "Unidades"	),
		array('url'=> "./users", 		'descricao' => "Usuários"	)
		
	)
);


echo $this->Mustache->render('links', $links);

?>











