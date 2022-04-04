@extends('layout.main')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>{{ $title }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Profile</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row mt-sm-4">

                <div class="col-12">
                    <div class="card ">
                        <div class="card-header ">
                            @if(!$data->photo)
                            <img class="rounded-circle profile-widget-picture img-fluid mx-auto" width="200"
                                src="{{ 'https://i.pravatar.cc/300?nocache='. microtime() }}" alt="Photo Profile">
                            @else
                            <img class="rounded-circle profile-widget-picture img-fluid mx-auto" width="200"
                                src="{{ $data->photo }}" alt="Photo {{ $data->name }}">
                            @endif
                        </div>
                        <div class="card-body" style="position:relative; left: 100px;">
                            <div class="row">

                                <div class="form-group col-md-12 col-12">
                                    <label>Name</label>
                                    <p>{{ $data->name }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12 col-12">
                                    <label>Email</label>
                                    <p>{{ $data->email }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12 col-12">
                                    <label>Role</label>
                                    <p>{{ $data->role }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
</div>
</div>
</section>
</div>
@endsection