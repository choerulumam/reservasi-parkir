@extends('layouts.master')

@section('title', 'Home User')

@section('content')
<div class="page-title">
	<div>
		<h1><i class="fa fa-dashboard"></i> Dashboard</h1>
		<p style="padding-top: 2px">Welcome Back {{ Auth::user()->name }} </p>
	</div>
	<div>
		<ul class="breadcrumb">
			<li><i class="fa fa-home fa-lg"></i></li>
			<li><a href="{{ Request::url() }}">Member</a></li>
		</ul>
	</div>
</div>
<div class="row">
	<div class="col-md-4">
		<div class="card">
			<h3 class="card-title">Hello</h3>
			<p>Welcome back {{ Auth::user()->name }}</p>
		</div>
		<div class="card">
			<div class="widget-small primary" style="background-color:#46BFBD"><i class="icon fa fa-car fa-3x"></i>
				<div class="info">
					<h4>Free Slot</h4>
					<p><b>{{ $empty_slot }}</b></p>
				</div>
			</div>
			<div class="widget-small warning" style="background-color:#e67e22"><i class="icon fa fa-car fa-3x"></i>
				<div class="info">
					<h4>Reserverd Slot</h4>
					<p><b>{{ $reserved_slot }}</b></p>
				</div>
			</div>
			<div class="widget-small danger" style="background-color:#e74c3c"><i class="icon fa fa-car fa-3x"></i>
				<div class="info">
					<h4>Filled Slot</h4>
					<p><b>{{ $filled_slot }}</b></p>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="card">
			<h3 class="card-title">Parking Slot Statistic</h3>
			<div class="embed-responsive embed-responsive-16by9">
				<canvas class="embed-responsive-item" id="pieChartDemo"></canvas>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{ asset('js/plugins/chart.js') }}"></script>
<script type="text/javascript">
	var empty = {{ $empty_slot }};
	var filled = {{ $filled_slot }};
	var reserved = {{ $reserved_slot }};
	var pdata = [
      	{
      		value: empty,
      		color: "#46BFBD",
      		highlight: "#5AD3D1",
      		label: "Empty Slot"
      	},
      	{
      		value: reserved,
      		color: "#d35400",
      		highlight:"#e67e22",
      		label: "Reserved Slot"
      	},
      	{
      		value: filled,
      		color: "#c0392b",
      		highlight: "#e74c3c",
      		label: "Filled Slot"
      	}
      ];

      var ctxp = $("#pieChartDemo").get(0).getContext("2d");
      var barChart = new Chart(ctxp).Doughnut(pdata);
</script>
@endsection
