<?php

session_start();
$idven = $_SESSION["idventa"];

// (A) LOAD INVOICR
require "invlib/invoicr.php";

// (B) SET INVOICE DATA
// (B1) COMPANY INFORMATION
/* RECOMMENDED TO JUST PERMANENTLY CODE INTO INVLIB/INVOICR.PHP > (C1)
$invoicr->set("company", [
	"http://localhost/code-boxx-logo.png",
	"D:/http/code-boxx-logo.png",
	"Code Boxx",
	"Street Address, City, State, Zip",
	"Phone: xxx-xxx-xxx | Fax: xxx-xxx-xxx",
	"https://code-boxx.com",
	"doge@code-boxx.com"
]); */

include_once ('classes/barra.php');
include_once ('classes/evento.php');
include_once ('classes/bebida.php');
include_once ('classes/venta.php');


$venta = new venta();
$ven = $venta->ventaById($idven);

// (B2) DATOS VENTA
$invoicr->set("head", [
	["VENTA # ", '<b>'.strval($idven).'</b>'],
]);


// (B4) SHIP TO
/*
$invoicr->set("shipto", [
	"Customer Name",
	"Street Address",
	"City, State, Zip"
]);
*/

// (B5) ITEMS DE LA VENTA
$evento = new evento();
$barra = new barra();
$bebida = new bebida();
$venta1 = new venta();
$items = [];

/*$v1 = $venta1->findEventoById($idven);
while($ev = $v1->fetch_assoc()){
	$eve = $evento->eventoById($ev['idevento']);
	$tipo = '<b>EVENTO '.strval($eve['id']).'</b> - '.$eve['tipo'];
	array_push( $items , 
	[$tipo] );
}*/
/*
$v1 = $venta1->findBarraById($idven);
while($vb = $v1->fetch_assoc()){
	$bar = $barra->barraById($ba['idbarra']);
	$nombre = '<b>BARRA '.strval($bar['idbarra']).'</b> - '.$bar['nombre'];
	array_push( $items , 
	[$nombre]);
}*/

$v1 = $venta1->findBebidaById($idven);
while($vbe = $v1->fetch_assoc()){
	$beb = $bebida->bebidaById($be['idbebida']);
	$nombre = '<b>BEBIDA '.strval($beb['idbebida']).'</b> - '.$beb['nombre'];
	$precio = (is_null ( $beb['precio'] ));
	array_push( $items , 
	[$nombre, $precio, "$ "]);
	$total += $precio;
}

/*
$items = [
	["Rubber Hose", "5m long rubber hose", 3, "$5.50", "$16.50"],
	["Rubber Duck", "Good bathtub companion", 8, "$4.20", "$33.60"],
	["Rubber Band", "", 10, "$0.10", "$1.00"],
	["Rubber Stamp", "", 3, "$12.30", "$36.90"],
	["Rubber Shoe", "For slipping, not for running", 1, "$50.00", "$50.00"]
];
*/

// (B6) ITEMS - OR SET ALL AT ONCE
$invoicr->set("items", $items);

// (B7) TOTALS
$invoicr->set("totals", [
	["TOTAL", '$ '.strval($total)],
]);

// (B8) NOTES, IF ANY
$invoicr->set("notes", [

]);

// (C) OUTPUT
// (C1) CHOOSE A TEMPLATE
 $invoicr->template("apple");
// $invoicr->template("banana");
// $invoicr->template("blueberry");
// $invoicr->template("lime");
// $invoicr->template("simple");
// $invoicr->template("strawberry");

// (C2) OUTPUT IN HTML
// DEFAULT : DISPLAY IN BROWSER
// 1 : DISPLAY IN BROWSER
// 2 : FORCE DOWNLOAD
// 3 : SAVE ON SERVER
// 4 : DISPLAY IN BROWSER & SAVE AS PNG
$invoicr->outputHTML();
// $invoicr->outputHTML(1);
// $invoicr->outputHTML(2, "invoice.html");
// $invoicr->outputHTML(3, __DIR__ . DIRECTORY_SEPARATOR . "invoice.html");
// $invoicr->outputHTML(4, "invoice.png");

// (C3) OUTPUT IN PDF
// DEFAULT : DISPLAY IN BROWSER
// 1 : DISPLAY IN BROWSER
// 2 : FORCE DOWNLOAD
// 3 : SAVE ON SERVER
// $invoicr->outputPDF();
// $invoicr->outputPDF(1);
// $invoicr->outputPDF(2, "invoice.pdf");
// $invoicr->outputPDF(3, __DIR__ . DIRECTORY_SEPARATOR . "invoice.pdf");

// (C4) OUTPUT IN DOCX
// DEFAULT : FORCE DOWNLOAD
// 1 : FORCE DOWNLOAD
// 2 : SAVE ON SERVER
// $invoicr->outputDOCX();
// $invoicr->outputDOCX(1, "invoice.docx");
// $invoicr->outputDOCX(2, __DIR__ . DIRECTORY_SEPARATOR . "invoice.docx");

// (D) USE RESET() IF YOU WANT TO CREATE ANOTHER ONE AFFTER THIS
// $invoicr->reset();