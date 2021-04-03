<form method="post">
	<input type="hidden" name="id" value="<?php echo self::$job->id?>">
	<label for="title">Job Title: </label>
	<input type="text" name="title" value="<?php echo self::$job->title ?>">
	<br>
	<label for="description">Job Description: </label>
	<textarea type="text" name="description"><?php echo self::$job->description ?></textarea>
	<br>
	<label for="company">Company: </label>
	<select name="company" selected="<?php echo self::$job->companyId ?>">
		<?php 
			foreach(self::$companies as $company) {
				echo "<option value=\"{$company->id}\"";
				echo (self::$job->companyId == $company->id ? "selected" : "") . ">{$company->name}</option>";
			}
		?>
	</select>
	<br>
	<label for="salary">Salary: </label>
	<input type="number" name="salary" min="1" placeholder="1" value="<?php echo self::$job->salary ?>">
	<br>
	<input type="hidden" name="_method" value="put">
	<input type="submit" value="Update">
</form>
<a href="/Dashboard">&lt; Back to Dashboard</a>
