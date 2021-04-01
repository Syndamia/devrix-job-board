<p>Hello World!</p>
<?php
	include_once("models/JobOffer.php");

	$jb = new JobOffer("Test", "A test", "TheTest", 11);
	JobOffer::insertInDB($jb);
	foreach(JobOffer::getAll() as $key => $obj) {
		echo "{$obj->id} {$obj->title}<br>";
	}
?>
