<ul class="jobs-listing">
<?php
	foreach($jobs as $job) {
		echo '<li class="job-card">
				<div class="job-primary">
					<h2 class="job-title"><a href="#">' . $job->title . '</a></h2>
					<div class="job-meta">
						<a class="meta-company" href="#">' . self::$companies[$job->companyId] . '</a>
						<span class="meta-date">' . round($job->salary, 2) . ' lev/month</span>
					</div>
				</div>
				<div class="job-edit">
					<form method="post">
						<input type="hidden" name="_method" value="get">
						<input type="hidden" name="jobId" value="' . $job->id . '">
						<input type="submit" value="Edit" class="anchor-btn">
					</form>
					<form method="post">
						<input type="hidden" name="_method" value="delete">
						<input type="hidden" name="jobId" value="' . $job->id . '">
						<input type="submit" value="Delete" class="anchor-btn">
					</form>
				</div>
			</li>';
	}
?>
</ul>
