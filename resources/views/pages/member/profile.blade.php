@extends('layouts.master')

@section('title', 'User Management')

@section('content')
<div class="row user">
    <div class="col-md-12">
        <div class="profile">
            <div class="info"><a href="#"><img class="user-img" src="{{ asset('images') . "/" . Auth::user()->images }}"></a>
                <h4>{{ Auth::user()->name }}</h4>
                <p>Member</p>
            </div>
            <div class="cover-image"></div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card p-0">
            <ul class="nav nav-tabs nav-stacked user-tabs">
                <li class="active"><a href="#user-timeline" data-toggle="tab">Timeline</a></li>
                <li><a href="#user-settings" data-toggle="tab">Settings</a></li>
            </ul>
        </div>
    </div>
    <div class="col-md-9">
        <div class="tab-content">
            <div class="tab-pane active" id="user-timeline">
                <div class="timeline">
                    <div class="post">
                        <div class="post-media">
                            <div class="content">
                                <i class="fa fa-bullhorn fa-lg"> Anouncement</i>
                                <p class="text-muted"><small>2 January at 9:30</small></p>
                            </div>
                        </div>
                        <div class="post-content">
                            <p>Selamat datang di website resmi Prodi Teknik Telkom University yang berisikan informasi mengenai garis besar program studi kami. Informasi mengenai kegiatan, pengajaran dan penelitianyang telah dilakukan juga ditampilkan di sini. Untuk pertanyaan maupun saran mengenai program studi kami, silakan disampaikan melalui email resmi kami, komentar pada postingan kami, ataupun dapat langsung mengunjungi prodi kami di Fakultas Ilmu Terapan Telkom University.</p> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="user-settings">
                <div class="card user-settings">
                    <h4 class="line-head">Settings</h4>
                    <form>
                        <div class="row mb-20">
                            <div class="col-md-4">
                                <label>First Name</label>
                                <input class="form-control" type="text">
                            </div>
                            <div class="col-md-4">
                                <label>Last Name</label>
                                <input class="form-control" type="text">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 mb-20">
                                <label>Email</label>
                                <input class="form-control" type="text">
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-8 mb-20">
                                <label>Mobile No</label>
                                <input class="form-control" type="text">
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-8 mb-20">
                                <label>Office Phone</label>
                                <input class="form-control" type="text">
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-8 mb-20">
                                <label>Home Phone</label>
                                <input class="form-control" type="text">
                            </div>
                        </div>
                        <div class="row mb-10">
                            <div class="col-md-12">
                                <button class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i> Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on('click', '.user-img', function(){
        alert("success");
    });
</script>
@endsection