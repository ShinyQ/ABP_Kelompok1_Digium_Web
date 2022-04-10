@extends('layout.main')
@section('content')
<div class="section-header">
    <div class="aligns-items-center d-inline-block">
        <h1>{{ $title }}</h1>
    </div>
</div>

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

                            @if ($tran->status =='Paid')
                                <td class="badge badge-success">{{ $tran->status }}</td>
                            @elseif ($tran->status == 'Waiting Payment')
                                <td class="badge badge-warning">{{ $tran->status }}</td>
                            @else
                                <td class="badge badge-danger">{{ $tran->status }}</td>
                            @endif

                            <td>
                                <a href="transaction/{{ $tran->id }}"
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
