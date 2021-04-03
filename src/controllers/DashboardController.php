<?php
include_once('controllers/BaseController.php');
include_once('models/JobOffer.php');
include_once('controllers/EditOfferController.php');

class DashboardController extends BaseController {
	public static function get() {
		$jobs = JobOffer::getAllFromDB();
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
