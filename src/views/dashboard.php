<?php
	foreach($jobs as $job) {
		echo "{$job->id} {$job->title}
			  <form method=\"post\">
			      <input type=\"hidden\" name=\"_method\" value=\"get\">
			      <input type=\"hidden\" name=\"jobId\" value=\"{$job->id}\">
			      <input type=\"submit\" value=\"Edit\">
			  </form>
			  <form method=\"post\">
			      <input type=\"hidden\" name=\"_method\" value=\"delete\">
			      <input type=\"hidden\" name=\"jobId\" value=\"{$job->id}\">
			      <input type=\"submit\" value=\"Delete\">
			  </form>
			  <br>";
	}
?>
