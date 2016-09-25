@extends('layouts.dashboardlayout')

@section('content')
	<h3>Analytical View</h3>
	<!--  <div class="dropdown-menu">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="#">CHF</a></li>
    <li><a href="#">HKD</a></li>
    <li><a href="#">INR</a></li>
    <li><a href="#">EURO</a></li>
    <li><a href="#">USD</a></li>
    <li><a href="#">GBP</a></li>
  </ul>
</div>
 -->

	<form class="form-horizontal" role="form" method="GET" action="{{ url('/graph') }}">
	{{ csrf_field() }}
	<div class="select-style">
	<select id="currency1" name="currency1">
		<option value="1"><a href="">CHF</a></option>
		<option value="2"><a href="">HKD</a></option>
		<option value="3"><a href="">INR</a></option>
		<option value="4"><a href="">EURO</a></option>
		<option value="5"><a href="">USD</a></option>
		<option value="6"><a href="">GBP</a></option>
	</select>
	</div>
	<div class="select-style">	
	<select id="currency2" name="currency2">
		<option value="1">CHF</option>
		<option value="2">HKD</option>
		<option value="3">INR</option>
		<option value="4">EURO</option>
		<option value="5">USD</option>
		<option value="6">GBP</option>
	</select>
	</div>
	<button type="submit" class="btn btn-primary">Compare</button>
	</form>
<!-- </div> -->

	<div id="xxx"></div>
	<?php 	
				if(isset($_GET['currency2']))
			echo \Lava::render('AreaChart', 'Currency', 'xxx') ?>
@endsection
