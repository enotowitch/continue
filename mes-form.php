<?
session_start();
require_once "DB.php";

// ! $difference bw forms mes.php & mes-form.php
$user_to_id = $_POST['user_to_id'];

// to show mail
$user_owner = R::find('user', 'id = ?', [$_POST['user_to_id']]);



?>

<? foreach($user_owner as $user_owner): ?>

	<div>Message to: <? echo strtok($user_owner->user_mail, '@'); ?></div>

	<div>Message from: (YOU) <? echo $_SESSION['user']['mail']; ?> </div>

<? include "mes-form-form.php"; ?>

<? endforeach; ?>