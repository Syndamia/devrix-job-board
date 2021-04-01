<?php
class DB {
	private static $servername = "localhost";
	private static $username = "root";
	private static $password = "password";
	private static $dbname = "devrix_job_board";

	public const STRING_TYPE = "VARCHAR(100)";
	public const FLOAT_TYPE = "DOUBLE(16,4)";
	public const INTEGER_TYPE = "INT";

	private PDO $connection;

	function __construct() {
		$this->connection = new PDO("mysql:host=" . self::$servername, self::$username, self::$password);
		$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		// Make sure the actual db exists
		$createDBQuery = "CREATE DATABASE IF NOT EXISTS " . self::$dbname . ";";

		$this->connection->exec($createDBQuery);

		// Make the actual connection to the database
		$this->connection->exec("USE " . self::$dbname);
	}

	function createTable(string $tableName, array $columns) {
		$query = "CREATE TABLE IF NOT EXISTS {$tableName}(
				  id INT NOT NULL AUTO_INCREMENT,";

		foreach ($columns as $column) {
			$query .= "{$column},";
		}

		$query .= "PRIMARY KEY (id));";

		$this->connection->exec($query);
	}

	function getAllValues(string $tableName) {
		$sth = $this->connection->prepare("SELECT * FROM `{$tableName}`");
		$sth->execute();

		return $sth->fetchAll(PDO::FETCH_OBJ);
	}
}
