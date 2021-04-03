<?php
include_once('models/DBModel.php');

class Company extends DBModel {
	public string $name;

	function __construct(string $name) {
		$this->name = $name;
	}

	/*
	 * Everything from here is static functionality
	 */

	public const TABLE_NAME = 'companies';

	static function __constructStatic() {
		$columns = array(
			'name ' . DB::STRING_TYPE,
		);
		self::$DB->createTable(self::TABLE_NAME, $columns);

		// Since there is no real way to add companies, this serves as the only official way.
		if (sizeof(self::getAllFromDB()) == 0) {
			self::insertIntoDB(new Company("MegaCorp"));
			self::insertIntoDB(new Company("Cool INC."));
			self::insertIntoDB(new Company("Company Awesome Ltd."));
		}
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
