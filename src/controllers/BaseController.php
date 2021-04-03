<?php
class BaseController {
	/**
	 * Calls the get, post, put or delete static methods, depending on the server request method ($_SERVER['REQUEST_METHOD'])
	 * **By default** all requests that are not POST, PUT or DELETE execute the GET request method
	 */
	public static function invoke() {
		switch ($_SERVER['REQUEST_METHOD']) {
			case 'POST': 
				static::post();
				break;
			case 'PUT':
				static::put();
				break;
			case 'DELETE':
				static::delete();
				break;
			default:
				static::get();
				break;
		}
	}

	protected static function get() {
		echo 'GET method not implemented!';
	}

	protected static function post() {
		echo 'POST method not implemented!';
	}

	protected static function put() {
		echo 'PUT method not implemented!';
	}

	protected static function delete() {
		echo 'DELETE method not implemented!';
	}
}
