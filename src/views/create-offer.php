<p>Works</p>

<form method="post">
	<label for="title">Job Title: </label>
	<input type="text" name="title">
	<br>
	<label for="description">Job Description: </label>
	<textarea type="text" name="description"></textarea>
	<br>
	<label for="company">Company: </label>
	<select name="company">
		<option>Test</option>
	</select>
	<br>
	<label for="salary">Salary: </label>
	<input type="number" name="salary" min="1" placeholder="1">
	<br>
	<input type="submit" value="Submit">
</form>
