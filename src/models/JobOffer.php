<?php
include_once("DB.php");

class JobOffer {
	public const TABLE_NAME = "job_offers";
	public const TABLE_COLUMNS = array("title " . DB::STRING_TYPE, "description " . DB::STRING_TYPE, "company " . DB::STRING_TYPE, "salary " . DB::FLOAT_TYPE);

	public string $title;
	public string $description;
	public string $company;
	public float $salary;

	private DB $db;

	function __construct(DB $db) {
		$this->db = $db;
	}
}
