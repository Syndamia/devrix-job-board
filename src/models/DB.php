<?php
/**
 * The model that has the database functionality. DO NOT instantiate this class! If you need an instance, extend the DBModel class!
 */
class DB {
	private static $servername = 'localhost';
	private static $username = 'root';
	private static $password = 'password';
	private static $dbname = 'devrix_job_board';

	public const STRING_TYPE = 'VARCHAR(100)';
	public const FLOAT_TYPE = 'DOUBLE(16,4)';
	public const INTEGER_TYPE = 'INT';

	private PDO $connection;

	function __construct() {
		// Try to connect
		try {
			$this->connection = new PDO('mysql:host=' . self::$servername, self::$username, self::$password);
			$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch (PDOException $e) {
			echo '[DB Exception]: ' . $e->getMessage();
		}

		// Make sure the actual db exists
		$createDBQuery = 'CREATE DATABASE IF NOT EXISTS ' . self::$dbname . ';';

		$this->connection->exec($createDBQuery);

		// Connect to the actual database
		$this->connection->exec('USE ' . self::$dbname);
	}

	/**
	 * @return string
	 */
	static function genFK(string $currentColumn, string $foreignTable, string $foreignColumn) {
		return "CONSTRAINT fk_{$currentColumn}_{$foreignTable} FOREIGN KEY ({$currentColumn}) REFERENCES {$foreignTable}($foreignColumn)";
	}

	/* Create */

	/**
	 * Creates a table, with the given name and given column information.
	 * **WARNING**: The method also creates an auto-incremented int id column, **DO NOT** specify it!
	 *
	 * @param string[] $columns
	 * Represents the column information. Each value must be like: "column_name data_type", where the data_type should be taken
	 * from the constant values of DB class.
	 * Example value: array("first_name " . DB::STRING_TYPE, "age " . DB::INTEGER_TYPE, "income " . DB::FLOAT_TYPE)
	 *
	 * @param string[] $foreignKeys - OPTIONAL
	 * Represents the foreign keys. All foreign keys **MUST** be generated the the static DB method genFK.
	 * Example value: array(DB::genFK("jobId", "jobs", "id"), DB::genFK("cityId", "cities", "id"))
	 */
	function createTable(string $tableName, array $columns, array $foreignKeys = null) {
		$query = "CREATE TABLE IF NOT EXISTS {$tableName}(
				  id INT NOT NULL AUTO_INCREMENT, ";

		foreach ($columns as $column) {
			$query .= "{$column}, ";
		}

		$query .= 'PRIMARY KEY (id), ';

		foreach ($foreignKeys as $fk) {
			$query .= "{$fk}, ";
		}

		$query = rtrim($query, ', ');
		$query .= ');';

		try {
			$this->connection->exec($query);
		}
		catch (PDOException $e) {
			echo '[DB Exception]: ' . $e->getMessage();
		}
	}

	/**
	 * Inserts a value in a given table.
	 *
	 * @param string[] $values
	 * Represents the data that should be inserted. The values should be ordered the same way the table columns are ordered.
	 * Example: "John", 20, 2000.3
	 * **WARNING**: DO NOT insert the id value
	 */
	function insertValue(string $tableName, ...$values) {
		$query = "INSERT INTO {$tableName} VALUES(NULL, ";

		foreach($values as $value) {
			if (gettype($value) == 'string') {
				$query .= "'{$value}', ";
			}
			else {
				$query .= "{$value}, ";
			}
		}
		$query = rtrim($query, ', ');

		$query .= ');';

		try {
			$this->connection->exec($query);
		}
		catch (PDOException $e) {
			echo '[DB Exception]: ' . $e->getMessage();
		}
	}

	/* Read */

	/**
	 * Returns the next value that has the given id.
	 */
	function getById(string $tableName, int $id) {
		$sth = $this->connection->prepare("SELECT * FROM {$tableName} WHERE id = {$id}");
		$sth->execute();

		return $sth->fetch(PDO::FETCH_OBJ);
	}

	/**
	 * Returns all values inside a table.
	 */
	function getAllValues(string $tableName) {
		$sth = $this->connection->prepare("SELECT * FROM {$tableName}");
		$sth->execute();

		return $sth->fetchAll(PDO::FETCH_OBJ);
	}

	/* Update */

	/**
	 * Updates the value with the given id inside the specified table.
	 *
	 * @param string[] $values
	 * Represents the data that should be updated. There should always be an even amount of data, where you alternate the column name and column value.
	 * Example: "first_name", "John", "age", 20, "income", 2000.3
	 */
	function updateById(string $tableName, int $id, ...$values) {
		$query = "UPDATE {$tableName} SET ";

		for ($i = 0; $i < sizeof($values); $i += 2) {
			$query .= "{$values[$i]} = " . (gettype($values[$i+1]) == 'string' ? "'{$values[$i+1]}'" : $values[$i+1]) . ', ';
		}
		$query = rtrim($query, ', ');

		$query .= " WHERE id = {$id};";

		try {
			$this->connection->exec($query);
		}
		catch (PDOException $e) {
			echo '[DB Exception]: ' . $e->getMessage();
		}
	}

	/* Delete */

	/**
	 * Deletes the value with the given id inside the given table.
	 */
	function deleteById(string $tableName, int $id) {
		try {
			$this->connection->exec("DELETE FROM {$tableName} WHERE id = {$id}");
		}
		catch (PDOException $e) {
			echo '[DB Exception]: ' . $e->getMessage();
		}
	}
}
