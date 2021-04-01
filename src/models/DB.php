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
		try {
			$this->connection = new PDO("mysql:host=" . self::$servername, self::$username, self::$password);
			$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch (PDOException $e) {
			echo "[DB Exception]: " . $e->getMessage();
		}

		// Make sure the actual db exists
		$createDBQuery = "CREATE DATABASE IF NOT EXISTS " . self::$dbname . ";";

		$this->connection->exec($createDBQuery);

		// Make the actual connection to the database
		$this->connection->exec("USE " . self::$dbname);
	}

	/* Create */

	function createTable(string $tableName, array $columns) {
		$query = "CREATE TABLE IF NOT EXISTS {$tableName}(
				  id INT NOT NULL AUTO_INCREMENT,";

		foreach ($columns as $column) {
			$query .= "{$column},";
		}

		$query .= "PRIMARY KEY (id));";

		try {
			$this->connection->exec($query);
		}
		catch (PDOException $e) {
			echo "[DB Exception]: " . $e->getMessage();
		}
	}

	function insertValue(string $tableName, ...$values) {
		$query = "INSERT INTO {$tableName} VALUES(NULL, ";

		foreach($values as $value) {
			if (gettype($value) == "string") {
				$query .= "'{$value}', ";
			}
			else {
				$query .= "{$value}, ";
			}
		}
		$query = rtrim($query, ", ");

		$query .= ");";

		try {
			$this->connection->exec($query);
		}
		catch (PDOException $e) {
			echo "[DB Exception]: " . $e->getMessage();
		}
	}

	/* Read */

	function getById(string $tableName, int $id) {
		$sth = $this->connection->prepare("SELECT * FROM `{$tableName}` WHERE id = {$id}");
		$sth->execute();

		return $sth->fetch(PDO::FETCH_OBJ);
	}

	function getAllValues(string $tableName) {
		$sth = $this->connection->prepare("SELECT * FROM `{$tableName}`");
		$sth->execute();

		return $sth->fetchAll(PDO::FETCH_OBJ);
	}

	/* Update */

	function updateById(string $tableName, int $id, ...$values) {
		$query = "UPDATE {$tableName} SET ";

		for ($i = 0; $i < sizeof($values); $i += 2) {
			$query .= "{$values[$i]} = " . (gettype($values[$i+1]) == "string" ? "'{$values[$i+1]}'" : $values[$i+1]) . ", ";
		}
		$query = rtrim($query, ", ");

		$query .= " WHERE id = {$id};";

		try {
			$this->connection->exec($query);
		}
		catch (PDOException $e) {
			echo "[DB Exception]: " . $e->getMessage();
		}
	}

	/* Delete */

	function deleteById(string $tableName, int $id) {
		try {
			$this->connection->exec("DELETE FROM {$tableName} WHERE id = {$id}");
		}
		catch (PDOException $e) {
			echo "[DB Exception]: " . $e->getMessage();
		}
	}
}
