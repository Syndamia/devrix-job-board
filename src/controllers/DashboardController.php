<?php
include_once('controllers/BaseController.php');
include_once('models/JobOffer.php');
include_once('models/Company.php');
include_once('controllers/EditOfferController.php');

class DashboardController extends BaseController {
	public static $companies = array();

	public static function get() {
		$jobs = JobOffer::getAllFromDB();
		foreach(Company::getAllFromDB() as $company) {
			self::$companies[$company->id] = $company->name;
		}
		include "views/dashboard.php";
	}

	public static function post() {
		switch($_POST['_method']) {
			case "get":
				EditOfferController::get();
				break;
			case "put":
				EditOfferController::put();
				break;
			case "delete":
				EditOfferController::delete();
				break;
		}
	}
}
