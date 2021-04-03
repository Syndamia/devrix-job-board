<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Jobs</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">

	<link rel="stylesheet" href="/css/master.css">
	<link rel="stylesheet" href="/css/prog.css">
	<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
	<div class="site-wrapper">
		<header class="site-header">
			<h1 class="site-title"><a href="/">Job Offers</a></h2>
		</header>

		<?php
			include_once("controllers/LandingController.php");
			include_once("controllers/CreateOfferController.php");
			include_once("controllers/DashboardLoginController.php");
			
			/* The landing page practically acts as our page router.
			 * All request get redirected to here (look at the devrix-job-board.conf) 
			 * Thanks https://www.taniarascia.com/the-simplest-php-router/
			 */
			
			$request = $_SERVER['REQUEST_URI'];
			
			switch ($request) {
				case "":
				case "/":
					LandingController::invoke();
					break;
				case "/CreateOffer":
				case "/CreateOffer/":
					CreateOfferController::invoke();
					break;
				case "/Dashboard":
				case "/Dashboard/":
					DashboardLoginController::invoke();
					break;
				default:
					http_response_code(404);
					break;
			}
		?>

		<footer class="site-footer">
			<p>Copyright 2020 | Developer links: 
				<a href="/Dashboard">Dashboard</a>,
				<a href="/">Home</a>,
				<a href="/single.html">Single</a>
			</p>
		</footer>
	</div>

</body>
</html>
