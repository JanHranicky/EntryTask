<?php
	/**
	 * 
	 */
	class SqlExecutor
	{
		private $databaseConnection;
		function __construct($databaseConnection)
		{
			$this->databaseConnection = $databaseConnection;
		}

		public function executeSqlQuery($queryStatement) {
			$returnStatement = $conn->prepare($sqlQuery);
	      $returnStatement->execute();
	      return $returnStatement;
		}
	}
?>