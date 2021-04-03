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
		if ($_POST['_method'] == "put") {
			$_SERVER['REQUEST_METHOD'] = "PUT";
			EditOfferController::invoke();
		}
		else if ($_POST['_method'] == "delete") {
			$_SERVER['REQUEST_METHOD'] = "DELETE";
			EditOfferController::invoke();
		}
	}
}
