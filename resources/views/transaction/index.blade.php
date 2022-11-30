@extends('layout.main')
@section('content')
<div class="section-header">
    <div class="aligns-items-center d-inline-block">
        <h1>{{ $title }}</h1>
    </div>
</div>

<style>
    .zoom {
        transition: transform .2s; /* Animation */
        margin: 0 auto;
    }

    .zoom:hover {
        transform: scale(2.5); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
    }
</style>

@if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ $message }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if ($message = Session::get('failed'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ $message }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<div class="section-body">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="dataTable" class="table-bordered table-md table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Receipt</th>
                            <th style="width: 15%">Museum</th>
                            <th>Nama</th>
                            <th>Total Price</th>
                            <th width="3%">Qty</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $key => $tran)
                        <tr>
                            <td>{{ $tran->id }}</td>
                            @if(!is_null($tran->receipt))

                                    <td><img class="zoom" src="{{ $tran->receipt }}" alt="" width="120px"></td>

                            @else
                                <td>-</td>
                            @endif
                            <td style="width: 15%">{{ $tran->museum->name }}</td>
                            <td>{{ $tran->user->name }}</td>
                            <td>{{ 'Rp' . number_format($tran->total_price, 2, ',', '.') }}</td>
                            <td width="3%">{{ $tran->qty }}</td>
                            @if ($tran->status == 'Paid')
                                <td class="badge badge-success" style="margin: 10%">{{ $tran->status }}</td>
                            @elseif ($tran->status == 'Waiting Payment')
                                <td class="badge badge-secondary" style="margin: 10%">{{ $tran->status }}</td>
                            @elseif ($tran->status == 'Waiting Verification')
                                <td class="badge badge-warning" style="margin: 10%">{{ $tran->status }}</td>
                            @else
                                <td class="badge badge-danger" style="margin: 10%">{{ $tran->status }}</td>
                            @endif
                            <td>
                                @if ($tran->status == 'Paid')
                                    <a href="/transaction/{{ $tran->id }}" class="btn btn-primary">Detail</a>
                                @elseif ($tran->status != 'Paid' && $tran->status != 'Cancelled')
                                    <a href="/transaction_verification/{{ $tran->id }}" class="btn btn-primary">Verifikasi</a>
                                @else
                                    <button href="#" class="btn btn-outline-primary" disabled>Dibatalkan</button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
