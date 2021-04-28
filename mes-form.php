<?
session_start();
require_once "DB.php";

// ! $difference bw forms mes.php & mes-form.php
$user_to_id = $_POST['user_to_id'];

// to show mail
$user_owner = R::find('user', 'id = ?', [$_POST['user_to_id']]);



?>

<? foreach($user_owner as $user_owner): ?>

	<div class="inter-icons">
	<img class="card-mes-close" src="img/icons/cross.svg" alt="card-mes-close">
	</div>

	<div class="card__title mes-to">Message to: <span class="brand"><? echo strtok($user_owner->user_mail, '@'); ?></span></div>

<? include "mes-form-form.php"; ?>

<? endforeach; ?>


<script>
$('.msg__write').addClass('msg__write_main');
</script>