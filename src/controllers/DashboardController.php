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
		include('views/dashboard.php');
	}

	public static function post() {
		// Forms can only send POST or GET requests.
		// EditOfferController doesn't have it's own URI, so we can't send a request.
		// We also can't just invoke it, because that means manually changing the server's request method.
		switch($_POST['_method']) {
			case 'get':
				EditOfferController::get();
				break;
			case 'put':
				EditOfferController::put();
				break;
			case 'delete':
				EditOfferController::delete();
				break;
		}
	}
}
