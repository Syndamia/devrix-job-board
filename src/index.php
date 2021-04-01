<p>Hello World!</p>
<?php
	include_once("models/JobOffer.php");

	$jb = new JobOffer("Test", "A test", "TheTest", 11);
	// JobOffer::insertInDB($jb);
	foreach(JobOffer::getAllFromDB() as $key => $obj) {
		echo "{$obj->id} {$obj->title}<br>";
	}
	echo "<br>";

	$gottenjb = JobOffer::getFromDBById(1);
	echo $gottenjb->title;

	$gottenjb->title = "Something even newer";
	echo $gottenjb->title;
	JobOffer::updateFromDB($gottenjb);
	$secgot = JobOffer::getFromDBById(1);
	echo $secgot->title;

	JobOffer::deleteFromDB(3);
?>
