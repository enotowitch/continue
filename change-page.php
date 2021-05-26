<div class="change-page">
	<a class="search__topic <? if_page('/index.php', "search__topic_active brand"); ?>" href="
	<? if_page('/portfolios.php', '/'); ?>
	<? if_page('/port-del.php', '/jobs-del.php'); ?>
	<? if_page('/port-like.php', '/jobs-like.php'); ?>
	<? if_page('/port-mes.php', '/jobs-mes.php'); ?>
	">JOBS</a>
	<a class="search__topic <? if_page('/portfolios.php', "search__topic_active brand") ?>" href="
	<? if_page('/index.php', 'portfolios.php'); ?>
	<? if_page('/jobs-del.php', '/port-del.php'); ?>
	<? if_page('/jobs-like.php', '/port-like.php'); ?>
	<? if_page('/jobs-mes.php', '/port-mes.php'); ?>
	">PORTFOLIOS</a>
</div>