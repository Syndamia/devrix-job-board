<?php
include_once('controllers/BaseController.php');
include_once('controllers/DashboardController.php');

class DashboardLoginController extends BaseController {
	private static $message;

	public static function get() {
		// include "views/dashboard-login.php";
		DashboardController::invoke();
	}

	public static function post() {
		if (isset($_POST['_method'])) {
			DashboardController::invoke();
		}
		else if ($_POST['username'] == "admin" && $_POST['password'] == "admin") {
			// Probably a bad practice, but couldn't find if it is
			$_SERVER['REQUEST_METHOD'] = "GET";
			// Load normal dashboard
			DashboardController::invoke();
		}
		else {
			self::$message = "Bad credentials!";
			include "views/dashboard-login.php";
		}
	}
}
