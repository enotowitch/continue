<form class="card form-card not100">
			<!-- ! user_id -->
			<input class="user_id" name="user_id" type="hidden" value="<? echo $_SESSION["user"]["id"]; ?>">
			<!-- ? user_id -->
			<!-- ! card_from -->
			<input class="card_from" name="card_from" type="hidden" value="<? echo $_SERVER['PHP_SELF'] ?>">
			<!-- ? card_from -->
			<label class="card__logo add-logo" for="fake-logo">
				<div class="add-logo__line"></div>
				<input class="fake-logo" type="file" id="fake-logo">
			</label>

			<div class="title-and-subt">
				<textarea class="card__title" name="title" placeholder="Type in POSITION" maxlength="40"
								minlength="4"></textarea>
							<textarea class="card__subt" name="subt" placeholder="Type in YOUR COMPANY NAME" maxlength="50"
								minlength="2"></textarea>
			</div>
			
			<? 
				require_once "info-select.php"
			?>
			<div class="inter-icons">
				<input class="cross_reset" type="reset" value="">
				<input class="apply ok-gray" type="submit" value="">
			</div>
			<div class="tags">
				<? 
					include "info-select-tags.php"
				?>
			</div>
		</form>