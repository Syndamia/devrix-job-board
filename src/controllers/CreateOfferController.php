<?php
include_once('controllers/BaseController.php');
include_once('models/Company.php');

class CreateOfferController extends BaseController {
	private static $companies;

	public static function get() {
		self::$companies = Company::getAllFromDB();
		include('views/create-offer.php');
	}

	public static function post() {
		$newJobOffer = new JobOffer($_POST['title'], $_POST['description'], $_POST['company'], $_POST['salary']);
		JobOffer::insertIntoDB($newJobOffer);

		// Redirect to landing page
		header('Location: /', TRUE, 301);
		exit();
	}
}
