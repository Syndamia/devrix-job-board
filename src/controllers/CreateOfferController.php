<?php
include_once('controllers/BaseController.php');

class CreateOfferController extends BaseController {
	public static function get() {
		include 'views/create-offer.php';
	}

	public static function post() {
		echo "Posted";
		echo "Title: " . $_POST['title'];
		echo "Description: " . $_POST['description'];
		echo "Company: " . $_POST['company'];
		echo "Salary: " . $_POST['salary'];
	}
}
