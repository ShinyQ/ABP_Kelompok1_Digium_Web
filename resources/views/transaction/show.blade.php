@extends('layout.main')
@section('content')
    <div class="section-header">
        <div class="aligns-items-center d-inline-block">
            <a href="{{ url('transaction') }}">
                <i class="h5 fa fa-arrow-left"></i>
            </a> &nbsp; &nbsp;
            <h1>{{ $title }}</h1>
        </div>
    </div>

    <div class="section-body">
        <div class="row mt-sm-4">
            @forelse ($data as $key => $item)
                <div class="col-4">
                    <div class="card ">
                        <div class="card-header">
                            <h4>Transaction Item ID #{{ $item->id }}</h4>
                        </div>
                        <div class="row card-body">
                            <div class="col-md-4">
                                @if($item->qr_code)
                                    <img src="{{ asset('assets/images/transaction/'. $item->transaction_id .'/'. $item->qr_code) }}" width="100px" alt="">
                                @else
                                    <img src="{{ asset('assets/images/qr-code.png') }}" width="100px" alt="">

                                @endif
                            </div>
                            <div class="col-md-8">
                                <p style="font-size: 14px" class="mt-4">
                                    <b>Nama</b> : {{ $item->name }} <br>
                                    <b>Status</b> : {{ $item->status }}
                                </p>
                            </div>
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
