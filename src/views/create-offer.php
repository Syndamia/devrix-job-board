<div class="job-card">
	<form class="centered-form blocky-form-items" method="post">
		<label for="title">Job Title</label>
		<input type="text" name="title">

		<label for="description">Job Description</label>
		<textarea type="text" name="description"></textarea>

		<label for="company">Company</label>
		<select name="company">
			<?php 
				foreach(self::$companies as $company) {
					echo "<option value=\"{$company->id}\">{$company->name}</option>";
				}
			?>
		</select>

		<label for="salary">Salary (lev/month)</label>
		<input type="number" name="salary" min="300" placeholder="300">

		<br>
		<input type="submit" value="Submit">
	</form>
</div>
