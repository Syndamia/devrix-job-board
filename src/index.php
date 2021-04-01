<?php require "document-top.php"; ?>

<?php
include_once("controllers/LandingController.php");

/* The landing page practically acts as our page router 
 * Thanks https://www.taniarascia.com/the-simplest-php-router/
 */

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
	case "":
	case "/":
		LandingController::invoke();
		break;
	default:
		http_response_code(404);
		break;
}
?>

<?php require "document-bot.php"; ?>
