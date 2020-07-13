<?php
include_once 'Read.php';
include_once 'Database.php';

//kvuli velkemu poctu produktu jsem se v uloze pokusil implementovat jednoduche strankovani kdy se funkce getProduct vola se dve parametry limit => pocet produktu ktere se z databaze nactou a offset => offset v dotazu select ze ktereho se data cerpaji. Data ukladam do souboru .json formatu ktere cisluji 1-10 data pro jednoduchost nacitam po 100 000 ve smycce for. Data se ukladaji do souboru formatu .json
function GetOneMillionProducts()
{
	$database = new Database();
	$database->connect('admin','admin');

	$read = new Read($database);
	for ($i=0; $i < 10; $i += 100 000) { 
		$jsonFile = fopen("testfile".$i.".txt", "w");
		file_put_contents($jsonFile, $read->getProduct(100 000,$i));
		fclose($jsonFile);
	}
}
?>