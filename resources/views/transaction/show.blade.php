@extends('layout.main')
@section('content')
    <div class="section-header">
        <div class="aligns-items-center d-inline-block">
            <h1>{{ $title }}</h1>
        </div>
    </div>

    <div class="section-body">
        <div class="row mt-sm-4">
            @forelse ($data as $key => $item)
                <div class="col-6">
                    <div class="card ">
                        <div class="card-header ">
                            <h4>Transaction Details</h4>
                        </div>
                        <div class="card-body" style="position:relative; left: 100px;">
                            <p>Nama {{ $item->name }}</p>
                            <p>Transaction ID {{ $item->transaction_id }}</p>
                            <h1>QR YGY</h1>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="card ">
                        <h1>Transaction Items Not Found</h1>
                    </div>
                </div>
        </div>
        @endforelse
    </div>
@endsection