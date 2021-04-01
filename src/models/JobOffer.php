<?php
include_once("models/DBModel.php");
include_once("models/Company.php");

/**
 * Model that contains the required JobOffer properties. It also contains the request methods to the job_offers table.
 */
class JobOffer extends DBModel {
	public string $title;
	public string $description;
	public int $companyId;
	public float $salary;

	function __construct(string $title, string $description, int $companyId, float $salary) {
		$this->title = $title;
		$this->description = $description;
		$this->companyId = $companyId;
		$this->salary = $salary;
	}

	/*
	 * Everything from here is static functionality
	 */

	public const TABLE_NAME = "job_offers";

	static function __constructStatic() {
		$columns = array(
			"title " . DB::STRING_TYPE,
			"description " . DB::STRING_TYPE,
			"companyId " . DB::INTEGER_TYPE, // Requires a foreign key
			"salary " . DB::FLOAT_TYPE,
		);
		$foreignKeys = array(
			DB::genFK("companyId", Company::TABLE_NAME, "id")
		);
		self::$DB->createTable(self::TABLE_NAME, $columns, $foreignKeys);
	}

	/* Create */

	/**
	 * Inserts the giveb JobOffer into the databse. The id is automatically generated in the database.
	 *
	 * @param JobOffer $jb
	 */
	static function insertIntoDB($jb) {
		self::$DB->insertValue(self::TABLE_NAME, $jb->title, $jb->description, $jb->company, $jb->salary);
	}

	/* Read */

	/**
	 * Returns the JobOffer with the given id from the database.
	 *
	 * @return JobOffer
	 */
	static function getFromDBById(int $id) {
		return self::$DB->getById(self::TABLE_NAME, $id);
	}

	/**
	 * Returns all JobOffers from the database.
	 *
	 * @return JobOffer[]
	 */
	static function getAllFromDB() {
		return self::$DB->getAllValues(self::TABLE_NAME);
	}

	/* Update */

	/**
	 * Updates the given JobOffer from the database.
	 * **WARNING**: the JobOffer **MUST** have it's database id.
	 *
	 * @param JobOffer $jb
	 */
	static function updateFromDB($jb) {
		self::$DB->updateById(self::TABLE_NAME, $jb->id, "title", $jb->title, "description", $jb->description, "company", $jb->company, "salary", $jb->salary);
	}

	/* Delete */

	/**
	 * Deletes the JobOffer with the given id from the database.
	 */
	static function deleteFromDB(int $id) {
		self::$DB->deleteById(self::TABLE_NAME, $id);
	}
}

JobOffer::__constructStatic();
