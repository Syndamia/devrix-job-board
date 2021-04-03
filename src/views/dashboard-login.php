<form method="post">
	<label for="username">Username: </label>
	<input type="text" name="username">
	<br>
	<label for="password">Password</label>
	<input type="password" name="password">
	<br>
	<input type="submit" value="Login">
</form>
<?php
	echo self::$message;
?>
<a href="/">&lt; Back</a>
