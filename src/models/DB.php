<?php
include_once("JobOffer.php");

class DB {
	private static $servername = "localhost";
	private static $username = "root";
	private static $password = "password";
	private static $dbname = "devrix_job_board";

	public const STRING_TYPE = "VARCHAR(100)";
	public const FLOAT_TYPE = "DOUBLE(16,4)";
	public const INTEGER_TYPE = "INT";

	private $connection;

	function __construct() {
		$this->connection = mysqli_connect(self::$servername, self::$username, self::$password);

		if (!$this->connection) {
			die(mysqli_connect_error());
		}

		// Make sure the actual db exists
		$createDBQuery = "CREATE DATABASE IF NOT EXISTS " . self::$dbname . ";";

		if (!mysqli_query($this->connection, $createDBQuery)) {
			die(mysqli_error($this->connection));
		}

		// Make the actual connection to the database
		mysqli_select_db($this->connection, self::$dbname);

		$this->createTables();
	}

	private function createTables() {
		$this->createTable(JobOffer::TABLE_NAME, JobOffer::TABLE_COLUMNS);
	}

	function __destruct() {
		mysqli_close($this->connection);
	}

	function createTable(string $tableName, array $columns) {
		$query = "CREATE TABLE IF NOT EXISTS {$tableName}(
				  id INT NOT NULL AUTO_INCREMENT,";

		foreach ($columns as $column) {
			$query .= "{$column},";
		}

		$query .= "PRIMARY KEY (id));";

		if (!mysqli_query($this->connection, $query)) {
			die(mysqli_error($this->connection));
		}
	}
}
