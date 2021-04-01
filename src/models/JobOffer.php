<?php
include_once("DBModel.php");

class JobOffer extends DBModel {
	public const TABLE_NAME = "job_offers";
	public const TABLE_COLUMNS = array("title " . DB::STRING_TYPE, "description " . DB::STRING_TYPE, "company " . DB::STRING_TYPE, "salary " . DB::FLOAT_TYPE);

	public string $title;
	public string $description;
	public string $company;
	public float $salary;

	function __construct(string $title, string $description, string $company, float $salary) {
		$this->title = $title;
		$this->description = $description;
		$this->company = $company;
		$this->salary = $salary;

		self::$DB->createTable(self::TABLE_NAME, self::TABLE_COLUMNS);
	}

	/* Create */

	/**
	 * @param JobOffer $jb
	 */
	static function insertIntoDB($jb) {
		self::$DB->insertValue(self::TABLE_NAME, $jb->title, $jb->description, $jb->company, $jb->salary);
	}

	/* Read */

	/**
	 * @return JobOffer
	 */
	static function getFromDBById(int $id) {
		return self::$DB->getById(self::TABLE_NAME, $id);
	}

	/**
	 * @return JobOffer[]
	 */
	static function getAllFromDB() {
		return self::$DB->getAllValues(self::TABLE_NAME);
	}

	/* Update */

	/**
	 * @param JobOffer $jb
	 */
	static function updateFromDB($jb) {
		echo "here";
		self::$DB->updateById(self::TABLE_NAME, $jb->id, "title", $jb->title, "description", $jb->description, "company", $jb->company, "salary", $jb->salary);
	}
}
