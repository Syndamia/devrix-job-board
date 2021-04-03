<?php
include_once('controllers/BaseController.php');

class DashboardController extends BaseController {
	public static function get() {
		include "views/dashboard.php";
	}
}
