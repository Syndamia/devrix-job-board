<p>Landing page!</p>

<?php
	foreach($jobs as $job) {
		echo "{$job->title} {$job->description} " . self::$companies[$job->companyId] . " {$job->salary}<br>";
	}
?>

<a href="/CreateOffer">Create a new Job Offer</a>
<a href="/Dashboard">Dashboard</a>
