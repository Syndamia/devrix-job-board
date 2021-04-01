<?php
include_once("models/JobOffer.php");

class LandingController {
	function invoke() {
		$jobs = JobOffer::getAllFromDB();
		include "views/landing.php";
	}
}
