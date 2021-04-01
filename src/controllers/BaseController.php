<?php
abstract class BaseController {
	public static function invoke() {
		switch ($_SERVER["REQUEST_METHOD"]) {
			case "POST": 
				static::post();
				break;
			case "PUT":
				static::put();
				break;
			case "DELETE":
				static::delete();
				break;
			default:
				static::get();
				break;
		}
	}

	abstract protected static function get();

	abstract protected static function post();

	abstract protected static function put();

	abstract protected static function delete();
}
