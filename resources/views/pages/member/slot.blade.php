@extends('layouts.master')

@section('title', 'Slot Parkir')

@section('content')
<div class="page-title">
	<div>
		<h1><i class="fa fa-check-square-o"></i> View Slot Parkir</h1>
		<p style="padding-top: 2px">Slot parkir</p>
	</div>
	<div>
		<ul class="breadcrumb">
			<li><i class="fa fa-home fa-lg"></i></li>
			<li><a href="{{ url('/member') }}">Member</a></li>
			<li><a href="{{ Request::url() }}">Slot</a></li>
		</ul>
	</div>
</div>
<div class="row">
	<div class="col-md-3">
		<div id="sortTotal" class="widget-small info"><i class="icon fa fa-car fa-3x"></i>
			<div class="info">
				<h4>Total Slot</h4>
				<p><b>{{ $free_slot }}</b></p>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div id="sortFree" class="widget-small primary"><i class="icon fa fa-car fa-3x"></i>
			<div class="info">
				<h4>Free Slot</h4>
				<p><b>{{ $empty_slot }}</b></p>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div id="sortBooked" class="widget-small warning"><i class="icon fa fa-car fa-3x"></i>
			<div class="info">
				<h4>Booked Slot</h4>
				<p><b>{{ $reserved_slot }}</b></p>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div id="sortFilled" class="widget-small danger"><i class="icon fa fa-car fa-3x"></i>
			<div class="info">
				<h4>Filled Slot</h4>
				<p><b>{{ $filled_slot }}</b></p>
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
	<div class="col-md-4">
		<div class="card">
			<input type="text" name="slotID" value="" class="hidden">
			<h4 class="card-title">Slot Information</h4>
			<div id="slot-view" style="text-align: center">
				<span id="ttl" style="font-size: 15px" class="label label-success"></span>
				<p class="lead"></p>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div id="main-slot" class="card">
			<h4 class="card-title">Slot Parkir</h4>
			<ul class="list-inline" style="text-align: right">
				{{ csrf_field() }}
			</ul>
		</div>
	</div>
</div>
<script src="{{ asset('js/plugins/sweetalert.min.js') }} "></script>
<script src="{{ asset('js/socket.io.js') }}"></script>
<script>
	var socket = io('http://localhost:3000');
	var data = {!! $data_slot !!};
	var nip_user = {{ Auth::user()->nip }};
	$(document).ready(function(){
		var nip_user = {{ Auth::user()->nip }};
		$.ajax({
	    	type: 'get',
	        url: '/member/slot/api/',
	        datatype : 'json',
	        data: {
	        	'_token': $('input[name=_token]').val(),
	        	'id': nip_user,
	        },
	        success: function(response){
	        	$(document).ajaxSuccess(function(){
	        		var jsonData = JSON.stringify(response);
	        		$('#main-slot ul li').remove();
	        		for (var i = 0; i < data.length; i++) {
	        			if (data[i].status === "kosong" ){
	        				$('#main-slot ul').append('<li style="margin-bottom: 5px"><button id="' + data[i].name + '" class="btn btn-primary slot-cl" style="width: 90px;"><i class="fa fa-car"></i>' + data[i].name + '</button></li>');
	        				if(jsonData != "[]"){
	        					$('#' + data[i].name).prop("disabled",true);
	        					console.log('success disabled kosong');
	        				};
	        			} else if (data[i].status === "terisi"){
	        				$('#main-slot ul').append('<li style="margin-bottom: 5px"><button id="' + data[i].name + '" class="btn btn-danger slot-cl" style="width: 90px;"><i class="fa fa-car"></i>' + data[i].name + '</button></li>');
	        			} else {
	        				$('#main-slot ul').append('<li style="margin-bottom: 5px"><button id="' + data[i].name + '" class="btn btn-warning slot-cl" style="width: 90px;"><i class="fa fa-car"></i>' + data[i].name + '</button></li>');
	        			};
	        		};
				});
	        }
	    });
	});

	$(document).on('click', '.slot-cl', function() {
		var id = this.id; //Get button ID    
	    $('#slot-view #ttl').text(id);
	    $('input[name=slotID]').attr('value', id);
	    $('#slot-view #ttl').removeClass("label-warning");
	    $('#slot-view #ttl').removeClass("label-danger");
	    $('#slot-view #ttl').addClass("label-success");
	    $.ajax({
	    	type: 'get',
	        url: '/member/slot/api/',
	        dataType : 'json',
	        data: {
	        	'_token': $('input[name=_token]').val(),
	        	'id': nip_user,
	        },
	        success: function(response){
	        	var jsonData = JSON.stringify(response);
	        	console.log("jsonData = " + jsonData);
	        	console.log("response = " + response);
	        	if (jsonData != "[]") {
	        		$('#slot-view .lead').removeClass('label');
	        		$('#slot-view  button').remove();
	        		$('#slot-view .lead').html('<br><span class="label label-success">You Have Been Booked This Slot</span>');
	        		$('<button id="cancel-booking" class="btn btn-warning" style="width: 90px;"><i class="fa fa-car"></i>cancel</button>').insertAfter(".lead");
	        	} else {
	        		$('#'+id).text(id);
	        		$('#slot-view .lead span').remove();
	        		$('#slot-view  button').remove();
	        		for (var i = data.length - 1; i >= 0; i--) {
	        			if(data[i].status == "kosong"){
	        				$('#slot-view .lead').html('<br><span class="label label-success ready_booking">This Slot is Free </span>');
	        			} else if (data[i].status == "dipesan") {
	        				$('#slot-view .lead').html('<br><span class="label label-warning">This Slot is booked </span>');
	        			} else {
	        				$('#slot-view .lead').html('<br><span class="label label-danger">This Slot is filled </span>');
	        			}
	        		}
	        		var ch = $('#slot-view .lead span').hasClass('ready_booking');
	        		if(ch){
	        			$('<button id="req-booking" class="btn btn-primary" style="width: 90px;">Booking</button>').insertAfter(".lead");
	        		}
	        	};
	        }
	    });
	});

	$(document).on('click', '#req-booking', function () {
		swal({
	        title: "Booking Confirmation",
	        text: "You will booking this slot",
	        type: "info",
	        timer: 3000,
	        showCancelButton: true,
	        confirmButtonColor: "#DD6B55",
	        confirmButtonText: "Yes, Booking it!",
	        closeOnConfirm: false
	    }, function (isConfirm) {
	        if (!isConfirm) return;
	        $.ajax({
		    	type: 'post',
		        url: '/member/slot/api/booking',
		        data: {
		            '_token': $('input[name=_token]').val(),
		            'name': $('input[name=slotID]').val(),
		            'user_id': nip_user,
		        },
	            dataType: "JSON",
	            success: function () {
  					socket.emit('event', nip_user);
	                swal({
	                	title: "Done!", 
	                	text: "It was succesfully Booked!", 
	                	type: "success", 
	                	timer: 3000 
	                });
	                location.reload(true);
	            },
	            error: function (xhr, ajaxOptions, thrownError) {
	                swal("Error Booking!", "Please try again", "error");
	            }
	        });
	    });
	});

	$(document).on('click', '#cancel-booking', function() {
	    swal({
	        title: "Are you sure?",
	        text: "You will not be able to recover this booking request!",
	        type: "warning",
	        timer: 3000,
	        showCancelButton: true,
	        confirmButtonColor: "#DD6B55",
	        confirmButtonText: "Yes, cancel it!",
	        closeOnConfirm: false
	    }, function (isConfirm) {
	        if (!isConfirm) return;
	        $.ajax({
	            url: "/member/slot/api/booking/delete",
	            type: "POST",
	            data: {
	            	'_token': $('input[name=_token]').val(),
	                'id': nip_user,
	            },
	            dataType: "JSON",
	            success: function () {
	            	socket.emit('cancelled', nip_user);
	                swal("Done!", "It was succesfully Cancelled!", "success");
	                location.reload(true);
	            },
	            error: function (xhr, ajaxOptions, thrownError) {
	                swal("Error Cancelled!", "Please try again", "error");
	            }
	        });
	    });

		$('#slot-view .lead').removeClass('span');
		$('#slot-view .lead').html('<br><span class="label label-success">Cancelled</span>');
	});



</script>
@endsection
