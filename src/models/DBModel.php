<?php
include_once("DB.php");

abstract class DBModel {
	/** 
	 * Used ONLY for gotten values form the database. Mustn't be assigned to, since it's AUTO_INCREMENT.
	 * The id column is set by default in the DB class.
	 */
	public int $id;

	protected static DB $DB;

	public static function __constructStatic() {
		self::$DB = new DB();
	}
}

DBModel::__constructStatic();
