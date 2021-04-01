<?php
include_once("DB.php");

/**
 * A class, mainly for holding the static DB class intance. You can also get your model id from here.
 */
abstract class DBModel {
	/** 
	 * Used ONLY for gotten values form the database. Must not be assigned to, since it is AUTO_INCREMENT.
	 * The id column is set by default in the DB class.
	 */
	public int $id;

	protected static DB $DB;

	public static function __constructStatic() {
		self::$DB = new DB();
	}
}

DBModel::__constructStatic();
