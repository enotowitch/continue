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
		<!--  -->
		<div class="dropdown header__icon">
			<button class="dropbtn">Post</button>
			<div class="dropdown-content">
				<a href="post-job.php">Job</a>
				<a href="post-portfolio.php">Portfolio</a>
			</div>
		 </div>
		<!--  -->
		
		<a class="header__icon" href="messages.php">Messages</a>
		
		<a class="header__icon" href="profile.php">Profile</a>
		<div class="header__icon search-icon">Search</div>
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