<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>Document</title>
	<link rel="stylesheet" href="css/norm.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/post-job.css">
	<link rel="stylesheet" href="css/search.css">
	<link rel="stylesheet" href="css/auth.css">
	<link rel="stylesheet" href="css/mes.css">
	<link rel="stylesheet" href="chosen/chosen.css">
	<link rel="stylesheet" href="css/jq-ui.css">
	<script src="js/jquery.js"></script>
</head>

<body>

<header class="header">
		<a href="/"><img class="header__icon header__logo" src="img/header/01.svg" alt="header__logo"></a>
		<a href="post-job.php"><img class="header__icon" src="img/header/02.svg" alt="Post Job"></a>
		<a href="messages.php"><img class="header__icon" src="img/header/03.svg" alt="Messages"></a>
		<a href="post-portfolio.php"><img class="header__icon" src="" alt="Add Portfolio"></a>
		<a href="profile.php"><img class="header__icon" src="" alt="Profile"></a>
		<div class="header__icon search-icon"><img src="img/header/06.svg" alt="Search"></div>
		<!-- ! BURGER-->
		<div class="burger" hidden>
			<div class="burger__button">
				<div class="burger__line"></div>
			</div>
			<div class="burger__menu">
				<a class="header__icon burger__icon" href="post-job.php"><img src="img/burger/02.svg" alt="img/02.svg">Post Job</a>
				<a class="header__icon burger__icon" href="messages.php"><img src="img/burger/03.svg" alt="img/03.svg">Messages</a>
				<a class="header__icon burger__icon" href="post-portfolio.php"><img src="img/burger/04.svg" alt="img/04.svg">Add Portfolio</a>
				<a class="header__icon burger__icon" href="profile.php"><img src="img/burger/05.svg" alt="img/05.svg">Profile</a>
				<div class="header__icon burger__icon search-icon" href="#"><img src="img/burger/06.svg" alt="img/06.svg">Search</div>
			</div>
		</div>
		<!-- ? BURGER-->
	</header>

<?
	require_once "functions.php";
?>

<? 
	require_once "slider.php";
?>