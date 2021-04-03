<?php
include_once('controllers/BaseController.php');
include_once('controllers/DashboardController.php');

class DashboardLoginController extends BaseController {
	private static $message;

	public static function get() {
		include('views/dashboard-login.php');
	}

	public static function post() {
		// The dashboard(controller) doesn't have it's own URI (and all requests are sent in this controller), so
		// we can't send a request directly to dashboard.
		// This does compromise security, but for now it will have to do.
		if (isset($_POST['_method'])) {
			DashboardController::invoke();
		}
		else if ($_POST['username'] == 'admin' && $_POST['password'] == 'admin') {
			// Load normal dashboard
			DashboardController::get();
		}
		else {
			self::$message = 'Bad credentials!';
			include('views/dashboard-login.php');
		}
	}
}
