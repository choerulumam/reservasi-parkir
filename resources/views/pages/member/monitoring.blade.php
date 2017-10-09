@extends('layouts.master')

@section('title', 'Monitoring')

@section('content')
<link href="http://vjs.zencdn.net/6.2.7/video-js.css" rel="stylesheet">
<div class="page-title">
	<div>
		<h1><i class="fa fa-dashboard"></i> Monitoring</h1>
		<p style="padding-top: 2px">Monitoring CCTV</p>
	</div>
	<div>
		<ul class="breadcrumb">
			<li><i class="fa fa-home fa-lg"></i></li>
			<li><a href="{{ Request::url() }}">Monitoring</a></li>
		</ul>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<video id="my-video" class="video-js vjs-default-skin vjs-16-9" controls preload="auto" width="1028" height="768" data-setup="{}">
				<source src="{{ asset('video/video.mp4') }}" type='video/mp4'>
			</video>
		</div>
	</div>
</div>
<script src="http://vjs.zencdn.net/6.2.7/video.js"></script>
@endsection
