@extends('layout.main')
@section('content')
<div class="section-header">
    <div class="aligns-items-center d-inline-block">
        <h1>{{ $title }}</h1>
    </div>
</div>

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
                            <th>#</th>
                            <th>User Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $key => $tran)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $tran->user->name }}</td>
                            <td>{{ $tran->total_price }}</td>
                            <td>{{ $tran->qty }}</td>
                            @if ($tran->status==='Paid')
                            <td class="badge rounded-pill bg-success text-light">{{ $tran->status }}</td>
                            @elseif ($tran->status==='Waiting Payment')
                            <td class="badge rounded-pill bg-warning text-dark">{{ $tran->status }}</td>
                            @else
                            <td class="badge rounded-pill bg-danger text-light">{{ $tran->status }}</td>
                            @endif
                            <td>
                                <a href="transactiondetail?id={{ $tran->id }}"
                                    class="btn btn-outline-primary">Detail</a>
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