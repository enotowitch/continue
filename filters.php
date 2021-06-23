<div class="sort-flex">
	<form class="filter-form">
		<!-- ! hidden tags -->
		<select hidden name="tags"></select>
		<!-- ? hidden tags -->

	<select class="switch-size">
		<option value="change size">change size</option>
		<option value="w_small">small</option>
		<option value="w100">big</option>
	</select>


		<select class="filter" name="filter">
			<option value="filter">filter</option>
			<option value="liked">liked</option>
			<option value="hidden">hidden</option>
			<option value="messaged">messaged</option>
		</select>


<!-- ! search title -->
		<input class="search-word" name="word" type="text" placeholder="search title">

<!-- ! search company -->
		<input class="search-company" name="company" type="text" placeholder="search company">

<!-- ! search salary -->

		<select class="search-salary" name="search-salary">
			<option value="salary">salary</option>
			<option value="100-500 USD">100-500 USD</option>
			<option value="500-1000 USD">500-1000 USD</option>
			<option value="1000-1500 USD">1000-1500 USD</option>
		</select>

		<!-- ! search experience -->	
		<select class="search-experience" name="search-experience">
			<option value="experience">experience</option>
			<option value="1 year">1 year</option>
			<option value="2 years">2 years</option>
			<option value="3 years">3 years</option>
			<option value="4 years">4 years</option>
			<option value="5 years">5 years</option>
			<option value="6 years">6 years</option>
			<option value="7 years">7 years</option>
			<option value="8 years">8 years</option>
			<option value="9 years">9 years</option>
			<option value="10+ years">10+ years</option>
		</select>

		<!-- ! search duration -->	
		<select class="search-duration" name="search-duration">
				<option value="duration">duration</option>
				<option value="Permanent">Permanent</option>
				<option value="Temporary">Temporary</option>
				<option value="Time to time">Time to time</option>
		</select>

		<select class="search-location" name="search-location">
<? 
	include "info-select-location.php";
?>
		</select>

</form>
</div>

