<?php require "document-top.php"; ?>

<p>Hello World!</p>
<?php
	include_once("models/JobOffer.php");

	$jb = new JobOffer("Test", "A test", "TheTest", 11);
	// JobOffer::insertInDB($jb);
	foreach(JobOffer::getAllFromDB() as $key => $obj) {
		echo "{$obj->id} {$obj->title}<br>";
	}
	echo "<br>";
?>

<?php require "document-bot.php"; ?>
