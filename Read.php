<?php
include_once 'Database.php';
include_once 'SqlExecutor.php';

	//trida Read pro cteni z databaze dodane v konstruktoru 
	class Read
	{
		private $database;
		private $sqlExecutor;

		//pri zavolani konstruktoru se inicializuji promenne $database a $databaseConnection
		function __construct($database)
		{
			$this->database = $db;
			$sqlExecutor = new SqlExecutor($db->getConnection);
		}

		//funkce getProduct vraci pocet produktu podle parametru $limit, parametr $offset urcuje offset ve vysledku dotazu select 
		public function getProduct($limit,$offSet) {

			//vysledek sql dotazu select
			$sqlRestult = $sqlExecutor->executeSqlQuery("SELECT * FROM Products LIMIT".$limit."OFFSET".$offSet);
				
			//test zda dotaz obsahuje nejake vysledky 
			if ($sqlRestult->number_of_rows > 0) {
				
				$productArray = array();

				//cyklus iterujici zkrz vysledek dotazu, uklada zaznamy o produktech do pole
				while ($tableRow = $sqlRestult->fetch()) {
					
					$product[$tableRow['id']] = array(
						'id' => $tableRow['id'],
						'name' => $tableRow['name'],
						'category' => $tableRow['category']
					);

				}
				//vysledek se vraci v .json formatu
				return json_encode($productArray);
			}
			else {
				//v pripade neuspechu se do souboru zapise chybove hlaseni
				return json_encode(array('Error' => 'No products were found'));
			}
		}
	}
?>