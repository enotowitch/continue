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
		<input class="search-word" name="search-word" type="text" placeholder="search title">

<!-- ! search company -->
		<input class="search-company" name="search-company" type="text" placeholder="search company">

<!-- ! search salary -->
		<select class="search-salary" name="search-salary">
			<option value="salary">salary</option>
			<option value="$1-$5/h">$1-$5/h</option>
			<option value="$5-$10/h">$5-$10/h</option>
			<option value="$10-$15/h">$10-$15/h</option>
			<option value="$15-$20/h">$15-$20/h</option>
			<option value="$20-$25/h">$20-$25/h</option>
			<option value="$25-$30/h">$25-$30/h</option>
			<option value="$30-$35/h">$30-$35/h</option>
			<option value="$35-$40/h">$35-$40/h</option>
			<option value="$40-$45/h">$40-$45/h</option>
			<option value="$45-$50/h">$45-$50/h</option>
			<option value="$50-$60/h">$50-$60/h</option>
			<option value="$60-$70/h">$60-$70/h</option>
			<option value="$70-$80/h">$70-$80/h</option>
			<option value="$80-$90/h">$80-$90/h</option>
			<option value="$90-$100/h">$90-$100/h</option>
			<option value="$100-$200/h">$100-$200/h</option>
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
			<option value="10-50 years">10-50 years</option>
		</select>

		<!-- ! search duration -->	
		<select class="search-duration" name="search-duration">
<?
	include "info-select-duration.php";
?>
		</select>

		<select class="search-location" name="search-location">
<? 
	include "info-select-location.php";
?>
		</select>

		<!-- ! search workload -->
		<select class="search-workload" name="search-workload">
			<option value="workload">workload</option>
			<option value="1-40 h/mo">1-40 h/mo</option>
			<option value="40-80 h/mo">40-80 h/mo</option>
			<option value="80-120 h/mo">80-120 h/mo</option>
			<option value="120-160 h/mo">120-160 h/mo</option>
			<option value="160-200 h/mo">160-200 h/mo</option>
			<option value="200-250 h/mo">200-250 h/mo</option>
		</select>

		<!-- ! search posted -->
		<select class="search-posted" name="search-posted">
			<option value="posted">posted</option>
			<option value="today">today</option>
			<option value="today - 3 days ago">today - 3 days ago</option>
			<option value="today - 7 days ago">today - 7 days ago</option>
			<option value="today - 14 days ago">today - 14 days ago</option>
		</select>

		<input type="hidden" name="card_from" value="<? echo $_SERVER['PHP_SELF']; ?>">
</form>
</div>

