<div class="job-card">
	<form class="centered-form blocky-form-items" method="post">
		<input type="hidden" name="id" value="<?php echo self::$job->id?>">

		<label for="title">Job Title</label>
		<input type="text" name="title" value="<?php echo self::$job->title ?>">

		<label for="description">Job Description</label>
		<textarea type="text" name="description"><?php echo self::$job->description ?></textarea>

		<label for="company">Company</label>
		<select name="company" selected="<?php echo self::$job->companyId ?>">
			<?php 
				foreach(self::$companies as $company) {
					echo "<option value=\"{$company->id}\"";
					echo (self::$job->companyId == $company->id ? 'selected' : '') . '>{$company->name}</option>';
				}
			?>
		</select>

		<label for="salary">Salary (lev/month)</label>
		<input type="number" name="salary" min="1" placeholder="1" value="<?php echo self::$job->salary ?>">

		<br>
		<input type="hidden" name="_method" value="put">
		<input type="submit" value="Update">
	</form>
</div>
