<?php
include_once("DB.php");

abstract class DBModel {
	protected static $DB;

	public static function __constructStatic() {
		self::$DB = new DB();
	}
}

DBModel::__constructStatic();
