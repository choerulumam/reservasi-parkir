@extends('layouts.master')

@section('title', 'Home Admin')

@section('content')
@php use Carbon\Carbon; use App\SlotParkir; @endphp
<div class="page-title">
	<div>
		<h1><i class="fa fa-dashboard"></i> Dashboard</h1>
		<p style="padding-top: 2px">Welcome Back, {{ Auth::user()->name }} </p>
	</div>
	<div>
		<ul class="breadcrumb">
			<li><i class="fa fa-home fa-lg"></i></li>
			<li><a href="{{ Request::url() }}"> Dashboard</a></li>
		</ul>
	</div>
</div>
<div class="row">
	<div class="col-md-3">
		<div class="widget-small primary"><i class="icon fa fa-users fa-3x"></i>
			<div class="info">
				<h4>Users</h4>
				<p><b>25</b></p>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="widget-small info"><i class="icon fa fa-car fa-3x"></i>
			<div class="info">
				<h4>Free Slot</h4>
				<p><b>{{ SlotParkir::where('status', 'kosong')->count() }}</b></p>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="widget-small warning"><i class="icon fa fa-car fa-3x"></i>
			<div class="info">
				<h4>Booked Slot</h4>
				<p><b>{{ SlotParkir::where('status', 'dipesan')->count() }}</b></p>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="widget-small danger"><i class="icon fa fa-car fa-3x"></i>
			<div class="info">
				<h4>Filled Slot</h4>
				<p><b>{{ SlotParkir::where('status', 'terisi')->count() }}</b></p>
            </div>
        </div>
    </div>
	<div class="clearfix"></div>
	<div class="col-md-6">
		<div class="card">
			<h3 class="card-title">List User Active</h3>
		</div>
	</div>
</div>
@endsection
