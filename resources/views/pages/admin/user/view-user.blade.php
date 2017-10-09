@extends('layouts.master')

@section('title', 'User Management')

@section('content')
{{ csrf_field() }}
<div class="page-title">
	<div>
		<h1><i class="fa fa-user"></i> Management User</h1>
		<p></p>
	</div>
	<div>
		<ul class="breadcrumb">
			<li><i class="fa fa-home fa-lg"></i></li>
			<li><a href="{{ url('/admin') }}">Admin</a></li>
			<li><a href="{{ Request::url() }}"> Management User</a></li>
		</ul>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-title-w-btn">
				<h3 class="title">All Items</h3>
				<button class="add-modal btn btn-info"><i class="fa fa-plus" aria-hidden="true"></i> Add New User</button>
			</div>
			<div class="card-body">
				<table class="table table-responsive" id="table">
			    	<thead>
			        	<tr>
				            <th>ID</th>
				            <th>ID Tags</th>
				            <th>NIP</th>
				            <th>Name</th>
				            <th>Email</th>
				            <th>Mac Address</th>
				            <th>Actions</th>
			        	</tr>
			    	</thead>
			    	<tbody>
			    		@foreach($data as $user)
			    		<tr class="user{{$user->id}}">
			    			<td>{{ $user->id }}</td>
			    			<td>{{ $user->id_tags }}</td>
			    			<td>{{ $user->nip }}</td>
			    			<td>{{ $user->name }}</td>
			    			<td>{{ $user->email }}</td>
			    			<td>{{ $user->mac_address }}</td>
			    			<td>
			    				<button class="edit-modal btn btn-info" data-info="{{$user->id}},{{$user->id_tags}},{{$user->nip}},{{$user->name}},{{$user->email}},{{$user->mac_address}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
			    				<button class="delete-modal btn btn-danger" data-info="{{$user->id}},{{$user->id_tags}},{{$user->nip}},{{$user->name}},{{$user->email}},{{$user->mac_address}}"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
			    			</td>
			    		</tr>
			    		@endforeach
			    	</tbody>
			    </table>
			    <a href="{{ url('/admin/user/export') }}"><button  class="btn btn-info"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Export</button></a>
			    <div id="myModal" class="modal fade" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title"></h4>
							</div>
							<div class="modal-body">
								<form class="form-horizontal" role="form">
									<div class="form-group">
										<label class="control-label col-sm-2" for="Mid">ID</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="Mid" disabled>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-2" for="Midtags">ID Tags</label>
										<div class="col-sm-10">
											<input type="name" class="form-control" id="Midtags">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-2" for="Mnip">NIP / NIM</label>
										<div class="col-sm-10">
											<input type="name" class="form-control" id="Mnip">
										</div>
									</div>
									<p class="Mnip_error error text-center alert alert-danger hidden"></p>
									<div class="form-group">
										<label class="control-label col-sm-2" for="Mname">Name</label>
										<div class="col-sm-10">
											<input type="name" class="form-control" id="Mname">
										</div>
									</div>
									<p class="Mname_error error text-center alert alert-danger hidden"></p>
									<div class="form-group">
										<label class="control-label col-sm-2" for="Memail">Email</label>
										<div class="col-sm-10">
											<input type="email" class="form-control" id="Memail">
										</div>
									</div>
									<p class="Memail_error error text-center alert alert-danger hidden"></p>
									<div class="form-group">
										<label class="control-label col-sm-2" for="Mmac">Mac Address</label>
										<div class="col-sm-10">
											<input type="name" class="form-control" id="Mmac">
										</div>
									</div>
									<p class="Mmac_error error text-center alert alert-danger hidden"></p>
									<div id="Mpassword" class="form-group hidden">
										<label class="control-label col-sm-2" for="Mpass">Password</label>
										<div class="col-sm-10">
											<input type="name" class="form-control" id="Mpass">
										</div>
									</div>
									<p class="Mpass_error error text-center alert alert-danger hidden"></p>
								</form>
								<div class="deleteContent"> Are you Sure you want to delete <span class="dname"></span> ? <span class="hidden did"></span>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn actionBtn" data-dismiss="modal">
										<span id="footer_action_button" class="fa"></span>
									</button>
									<button type="button" class="btn btn-warning" data-dismiss="modal">
										<span class="fa fa-sign-out"></span> Close
									</button>
								</div>
							</div>	
						</div>
					</div>
				</div>
			</div>
        </div>
	</div>
</div>
<script src="{{ asset('js/plugins/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/plugins/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('js/plugins/bootstrap-notify.min.js') }}"></script>
<script src="{{ asset('js/plugins/sweetalert.min.js') }}"></script>

<script>
	$(document).ready(function() {
		$('#table').DataTable();
	});
</script>

<script>
	$(document).on('click', '.add-modal', function() {
        $('#footer_action_button').text("Submit");
        $('#footer_action_button').addClass('fa fa-check-square-o');
        $('#footer_action_button').removeClass('fa fa-trash-o');
        $('.actionBtn').addClass('btn-success');
        $('.actionBtn').removeClass('btn-danger');
        $('.actionBtn').removeClass('delete');
        $('.actionBtn').addClass('add');
        $('.modal-title').text('Add User');
        $('#Midtags').val('');
        $('#Mnip').val('');
        $('#Memail').val('');
        $('#Mmac').val('');
        $('#Mpassword').removeClass('hidden');
        $('.deleteContent').hide();
        $('.form-horizontal').show();
        $('#Mid').val({{ $data->count() + 1 }});
        $('#myModal').modal('show');
    });

    $('.modal-footer').on('click', '.add', function() {
        $.ajax({
        	type: 'post',
            url: '/admin/user/create',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $("#Mid").val(),
                'id_tags': $('#Midtags').val(),
                'nip': $('#Mnip').val(),
                'name': $('#Mname').val(),
                'email': $('#Memail').val(),
                'mac_address': $('#Mmac').val(),
                'password' : $('#Mpass').val(),
            },
            success: function(data) {
            	$(document).ajaxSuccess(function(){
            		swal({
            			title: "Success",
            			text: "New User Have Been Created updated",
            			type: "success",
    					timer: 1000
    				});		
  				});
	         	$('#table > tbody:last-child').append("<tr class='user" + data.id + "'><td>" + data.id + "</td><td>" + data.id_tags + "</td><td>" + data.nip + "</td><td>" + data.name + "</td><td>" + data.email + "</td><td>" + data.mac_address + "</td><td><button class='edit-modal btn btn-info' data-info='" + data.id+","+data.id_tags+","+data.nip+","+data.name+","+data.email+","+data.mac_address+"'><span class='fa fa-pencil-square-o'></span> Edit</button> <button class='delete-modal btn btn-danger' data-info='" + data.id+","+data.id_tags+","+data.nip+","+data.name+","+data.email+","+data.mac_address+"'><span class='fa fa-trash-o'></span> Delete</button></td></tr>");
            }
        });
    });
   
	$(document).on('click', '.edit-modal', function() {
        $('#footer_action_button').text(" Update");
        $('#footer_action_button').addClass('fa fa-pencil-square-o');
        $('#footer_action_button').removeClass('fa-trash-o');
        $('.actionBtn').addClass('btn-success');
        $('.actionBtn').removeClass('btn-danger');
        $('.actionBtn').removeClass('delete');
        $('.actionBtn').addClass('edit');
        $('.modal-title').text('Edit');
        $('.deleteContent').hide();
        $('.form-horizontal').show();
        var stuff = $(this).data('info').split(',');
        fillmodalData(stuff)
        $('#myModal').modal('show');
    });

    function fillmodalData(details){
    	$('#Mid').val(details[0]);
    	$('#Midtags').val(details[1]);
    	$('#Mnip').val(details[2]);
    	$('#Mname').val(details[3]);
    	$('#Memail').val(details[4]);
    	$('#Mmac').val(details[5]);
    }

    $('.modal-footer').on('click', '.edit', function() {
        $.ajax({
        	type: 'post',
            url: '/admin/user/update',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $("#Mid").val(),
                'id_tags': $('#Midtags').val(),
                'nip': $('#Mnip').val(),
                'name': $('#Mname').val(),
                'email': $('#Memail').val(),
                'mac_address': $('#Mmac').val(),
            },
            success: function(data) {
            	$(document).ajaxSuccess(function(){
            		swal({
            			title: "Update Success",
            			text: "Your record have been updated",
            			type: "success",
    					timer: 1000
    				});		
  				});
	         	$('.user' + data.id).replaceWith("<tr class='user" + data.id + "'><td>" + data.id + "</td><td>" + data.id_tags + "</td><td>" + data.nip + "</td><td>" + data.name + "</td><td>" + data.email + "</td><td>" + data.mac_address + "</td><td><button class='edit-modal btn btn-info' data-info='" + data.id+","+data.id_tags+","+data.nip+","+data.name+","+data.email+","+data.mac_address+"'><span class='fa fa-pencil-square-o'></span> Edit</button> <button class='delete-modal btn btn-danger' data-info='" + data.id+","+data.id_tags+","+data.nip+","+data.name+","+data.email+","+data.mac_address+"'><span class='fa fa-trash-o'></span> Delete</button></td></tr>");
            }
        });
    });

  		$(document).ajaxError(function(){
    		swal({
    			title: "Update Error",
    			text: "Your record haven't been updated",
    			type: "warning",
    			timer: 1000
    		});		
  		});

    $(document).on('click', '.delete-modal', function() {
        $('#footer_action_button').text(" Delete");
        $('#footer_action_button').removeClass('fa-pencil-square-o');
        $('#footer_action_button').addClass('fa-trash-o');
        $('.actionBtn').removeClass('btn-success');
        $('.actionBtn').addClass('btn-danger');
        $('.actionBtn').addClass('delete');
        $('.modal-title').text('Delete');
        $('.did').text($(this).data('id'));
        $('.deleteContent').show();
        $('.form-horizontal').hide();
        $('.dname').html($(this).data('name'));
        $('#myModal').modal('show');
    });

    $(document).on('click', '.delete-modal', function() {
	    $('#footer_action_button').text(" Delete");
	    $('#footer_action_button').removeClass('fa-check-square-o');
	    $('#footer_action_button').addClass('fa-pencil-square-o');
	    $('.actionBtn').removeClass('btn-success');
	    $('.actionBtn').addClass('btn-danger');
	    $('.actionBtn').removeClass('edit');
	    $('.actionBtn').addClass('delete');
	    $('.modal-title').text('Delete');
	    $('.deleteContent').show();
	    $('.form-horizontal').hide();
	    var stuff = $(this).data('info').split(',');
	    $('.did').text(stuff[0]);
	    $('.dname').html(stuff[3]);
	    $('#myModal').modal('show');
    });
    
    $('.modal-footer').on('click', '.delete', function() {
    	$.ajax({
	        type: 'post',
	        url: '/admin/user/delete',
	        data: {
	            '_token': $('input[name=_token]').val(),
	            'id': $('.did').text()
	        },
	        success: function(data) {
	            $('.user' + $('.did').text()).remove();
	        }
    	});
	});
</script>

@endsection
