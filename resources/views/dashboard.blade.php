@extends('layout.main')
@section('content')
    <div class="section-header">
        <h1>{{ $title }}</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div style="height: 350px" id='myDiv'></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div style="height: 350px" id='myDiv2'></div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">

                </div>
            </div>

        </div>
    </div>
@endsection
