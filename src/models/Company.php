<?php
include_once("DBModel.php");

class Company extends DBModel {
	public string $name;

	function __construct(string $name) {
		$this->name = $name;
	}

	/*
	 * Everything from here is static functionality
	 */

	public const TABLE_NAME = "companies";
	public const TABLE_COLUMNS = array(
		"name " . DB::STRING_TYPE,
	);

	static function __constructStatic() {
		self::$DB->createTable(self::TABLE_NAME, self::TABLE_COLUMNS);
	}

	/* Create */

	/**
	 * Inserts the giveb JobOffer into the databse. The id is automatically generated in the database.
	 *
	 * @param Company $com
	 */
	static function insertIntoDB($com) {
		self::$DB->insertValue(self::TABLE_NAME, $com->name);
	}

	/* Read */

	/**
	 * Returns all Companies from the database.
	 *
	 * @return Company[]
	 */
	static function getAllFromDB() {
		return self::$DB->getAllValues(self::TABLE_NAME);
	}
}

Company::__constructStatic();
