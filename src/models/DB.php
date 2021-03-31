<?php
class DB {
	private static $servername = "localhost";
	private static $username = "root";
	private static $password = "password";
	private static $dbname = "devrix_job_board";

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
	}

	function __destruct() {
		mysqli_close($this->connection);
	}
}
