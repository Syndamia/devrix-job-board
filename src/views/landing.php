<p>Landing page!</p>

<?php
	foreach($jobs as $job) {
		echo "{$job->id} {$job->title}<br>";
	}
?>
