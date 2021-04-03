<?php
include_once('controllers/BaseController.php');
include_once('models/JobOffer.php');
include_once('models/Company.php');
include_once('controllers/DashboardController.php');

class EditOfferController extends BaseController {
	private static $job;
	private static $companies;

	public static function get() {
		self::$job = JobOffer::getFromDBById($_POST['jobId']);
		self::$companies = Company::getAllFromDB();
		include('views/edit-offer.php');
	}

	public static function put() {
		$newJobOffer = new JobOffer($_POST['title'], $_POST['description'], $_POST['company'], $_POST['salary']);
		$newJobOffer->id = $_POST['id'];
		JobOffer::updateFromDB($newJobOffer);

		DashboardController::get();
	}

	public static function delete() {
		JobOffer::deleteFromDB($_POST['jobId']);

		DashboardController::get();
	}
}
