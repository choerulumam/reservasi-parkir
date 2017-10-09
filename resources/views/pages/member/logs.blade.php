@extends('layouts.master')

@section('title', 'User Management')

@section('content')
{{ csrf_field() }}
<div class="page-title">
	<div>
		<h1><i class="fa fa-user"></i> Booking History</h1>
		<p></p>
	</div>
	<div>
		<ul class="breadcrumb">
			<li><i class="fa fa-home fa-lg"></i></li>
			<li><a href="{{ url('/member') }}">Member</a></li>
			<li><a href="{{ Request::url() }}"> History Booking</a></li>
		</ul>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-title-w-btn">
				<h3 class="title">History Booking Data</h3>
			</div>
			<div class="card-body">
				<table class="table table-responsive" id="table">
			    	<thead>
			        	<tr>
				            <th>ID</th>
				            <th>NIP</th>
				            <th>Username</th>
				            <th>Booking Slot</th>
				            <th>Events</th>
				            <th>created_at</th>
			        	</tr>
			    	</thead>
			    </table>
			</div>
        </div>
	</div>
</div>
<script src="{{ asset('js/plugins/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/plugins/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('js/plugins/bootstrap-notify.min.js') }}"></script>
<script src="{{ asset('js/plugins/sweetalert.min.js') }}"></script>
<script>
	var user_id = {!! Auth::user()->nip !!};
 	$(document).ready(function() {
		$('#table').DataTable({
			"ajax": {
				"url" : "/member/slot/logs/data",
				"type" : "GET",
				"data" : {
					"id" : user_id,
				}
			},
			"columns": [
				{ "data": "id" },
				{ "data": "nip" },
				{ "data": "username" },
				{ "data": "Booking_slot" },
				{ "data": "actions" },
				{ "data": "created_at" }
			]
		});
	});
</script>
@endsection
