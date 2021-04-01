<?php
include_once("models/JobOffer.php");
include_once("controllers/BaseController.php");

class LandingController extends BaseController {
	public static function get() {
		$jobs = JobOffer::getAllFromDB();
		include "views/landing.php";
	}
}
