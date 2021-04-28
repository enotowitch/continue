<? if($_SESSION["user"] == NULL): ?>
			<div class="no-user">
			To <? if_page('/post-job.php', 'post jobs'); ?><? if_page('/post-portfolio.php', 'add portfolios'); ?><? if_page('/messages.php', 'use messages'); ?>, please <a href="login.php"><nobr>SIGN IN</a> or <a href="reg.php">SIGN UP</nobr></a>
			</div>
			<script>
				$(document).ready(function(){
					$('.card').addClass('op05');
					$('input, textarea, select, label').prop('disabled', true);
				})
			</script>
			
		<? endif; ?>