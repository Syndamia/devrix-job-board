<div class="job-card">
	<form class="centered-form blocky-form-items" method="post">
		<label for="username">Username</label>
		<input type="text" name="username">
		<label for="password">Password</label>
		<input type="password" name="password">
		<br>
		<?php
			echo self::$message;
		?>
		<input type="submit" value="Login">
	</form>
</div>
