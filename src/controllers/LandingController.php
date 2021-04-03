<?php
include_once("models/JobOffer.php");
include_once('models/Company.php');
include_once("controllers/BaseController.php");

class LandingController extends BaseController {
	private static $companies = array();

	public static function get() {
		$jobs = JobOffer::getAllFromDB();
		foreach(Company::getAllFromDB() as $company) {
			self::$companies[$company->id] = $company->name;
		}
		include "views/landing.php";
	}
}
