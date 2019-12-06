<?php

require_once __DIR__ . '/vendor/autoload.php';
$estilo1 = file_get_contents('style.css');
$mpdf = new \Mpdf\Mpdf([
    'format' => 'A4-P',
    'margin_left' => 0,
    'margin_right' => 0,
    'margin_top' => 0,
    'margin_bottom' => 0,
    'margin_header' => 0,
	'margin_footer' => 15,
]);
$html = '
	<div class="seccion"><br /><div class="inclinacion-texto">Shabbyshop</div></div>
	<div style="width:25%; height:1%;"/>
	<div class="cabecera">Cotizacion</div>
	<div class="barra" />
	<table class="titulos">
		<tr>
			<th class="a1">PRODUCTO</th>
			<th class="a2">COSTO UNITARIO</th>
			<th class="a3">CANTIDAD</th>
			<th class="a4">TOTAL</th>
		</tr>
	</table>
	<div class="barra" />
	<div class="productos">
		<div class="b1">Serie lineal 100m (Blanco
		cálido)</div>
		<div class="b2">$1,900</div>
		<div class="b3">22</div>
		<div class="b4">$41,800</div>
	</div>
	<div class="barra" />
	<div class="totales">
		<div class="iz">SUBTOTAL</div><div class="der">$41,800</div>
		<div class="iz">DESCUENTO (10%)</div><div class="der">-$4,180</div>
		<div class="iz">TOTAL</div><div class="der">$37,620</div>
	</div>
	';
$piePaginHTML = '
	<div class="pie-pagina">
		<h1>Shabbyshop</h1>
	</div>
	';
$mpdf->WriteHTML($estilo1,1);
//Cabecera del documento
$mpdf->WriteHTML($html,2);
$mpdf->SetHTMLFooter($piePaginHTML);
//Contenido del documento
$mpdf->Output();