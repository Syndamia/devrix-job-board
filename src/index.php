<p>Hello World!</p>
<?php
	include_once("models/JobOffer.php");

	$jb = new JobOffer("a", "", "", 0);
	foreach(JobOffer::getAll() as $key => $obj) {
		echo $obj->salary . "<br>";
	}
?>
