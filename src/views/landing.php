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
					<div class="job-details">
						'. $job->description . '
					</div>
				</div>
				<div class="job-logo">
					<div class="job-logo-box">
						<img src="https://i.imgur.com/ZbILm3F.png" alt="">
					</div>
				</div>
			</li>';
	}
?>
</ul>
