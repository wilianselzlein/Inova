<?php

App::import('Vendor','tcpdf/modelos/RelatorioPDF'); 
//App::import('Vendor', 'tcpdf_include');

$relatorio_pdf = new RelatorioPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        
/*
 *  $relatorio->SetCreator(PDF_CREATOR);
 *  $relatorio->SetAuthor('Pedro Escobar');
 *  $relatorio->SetTitle('TCPDF Example 048');
 *  $relatorio->SetSubject('TCPDF Tutorial');
 *  $relatorio->SetKeywords('TCPDF, PDF, example, test, guide');
 */

// set header and footer fonts
$relatorio_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', 13));

// set margins
$relatorio_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$relatorio_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$relatorio_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$relatorio_pdf->setTitulo("Relatório de Visitas por Cliente/Data");
// set auto page breaks
$relatorio_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$relatorio_pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
// add a page (required with recent versions of tcpdf) 
$relatorio_pdf->AddPage(); 

$relatorio_pdf->writeHTML('<h1>'.$relatorio_pdf->getTitulo().'</h1>', true, false, true, false, 'C');

$relatorio_pdf->SetFont('helvetica', '', 11);

$html = <<<EOD
        <style>
        .titulo
        {
            font-size: 30;
            background-color: red;
        }
        .table-header
        {
            font-weight:bold;
            text-align:left;            
        }
        .group-band
        {
            text-align: left;
            font-weight:bold;
        }
        .totais-label
        {
            text-align: left;
            font-weight:bold;
        }
        .line
        {
            border-top-width: 1;
        }
        </style>        
        <br>
        <br>
		<table cellspacing="0" cellpadding="1" border="0">
	        <thead>
	    		<tr class="teste">
                            <th class="table-header">DATA</th>
                            <th class="table-header">CLIENTE</th>
                            <th class="table-header">RUA</th>
                            <th class="table-header">BAIRRO</th>
                            <th class="table-header">CIDADE</th>        
                            <th class="table-header">FONE</th>        
	    		</tr>
	        </thead>
EOD;
for ($index = 0; $index < count($visitas); $index++) {
    $html .= '<tr>'
            .   '<td>'.$visitas[$index]['visita']['data'].'</td>'
            .   '<td>'.$visitas[$index]['cliente']['fantasia'].'</td>'
            .   '<td>'.$visitas[$index]['cliente']['endereco'].'</td>'
            .   '<td>'.$visitas[$index]['cliente']['bairro'].'</td>'
            .   '<td>'.$visitas[$index]['cidade']['nome'].'</td>'            
            .   '<td>'.$visitas[$index]['cliente']['telefone'].'</td>'
            . '</tr>';
    
}
$total_periodo=$total_clientes_periodo[0][0]['total_clientes_periodo'];
$total_visitados=$total_clientes_visitados[0][0]['total_clientes_visitados'];
$total_ativos=$total_clientes_ativos[0][0]['total_clientes_ativos'];

$html .= '<tr><td colspan="5"></td></tr>'
        .'<tr>'
        .'<td colspan="5"></td>'
        .'</tr>'
        .'<tr>'
        .   '<td colspan="2" class="totais-label">TOTAL DE CLIENTES NO PERÍODO:</td>'
        .   '<td colspan="2" class="totais-label">'.$total_periodo.'</td>'
        .'</tr>'
        .'<tr>'
        .   '<td colspan="2" class="totais-label">TOTAL DE CLIENTES VISITADOS:</td>'
        .   '<td colspan="2" class="totais-label">'.$total_visitados.'</td>'
        .'</tr>'
        .'<tr>'
        .   '<td colspan="2" class="totais-label">TOTAL DE CLIENTES ATIVOS:</td>'
        .   '<td colspan="2" class="totais-label">'.$total_ativos.'</td>'
        .'</tr>'
        ;
$html .= '</table>';

$relatorio_pdf->writeHTML($html, true, false, true, false, 'L');
$relatorio_pdf->lastPage();

echo $relatorio_pdf->Output('relatorio.pdf', 'I'); 