@extends('layout.main')
@section('content')
    <div class="section-header">
        <div class="aligns-items-center d-inline-block">
            <a href="{{ url('dashboard') }}">
                <i class="h5 fa fa-arrow-left"></i>
            </a> &nbsp; &nbsp;
            <h1>{{ $title }}</h1>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-3">
                <div class="card ">
                    <div class="card-header">
                        @if(!$user->photo)
                            <img class="rounded-circle profile-widget-picture img-fluid mx-auto" width="200"
                                 src="{{ 'https://i.pravatar.cc/300?nocache='. microtime() }}" alt="Photo Profile">
                        @else
                            <img class="rounded-circle profile-widget-picture img-fluid mx-auto" width="200"
                                 src="{{ $user->photo }}" alt="Photo {{ $user->name }}">
                        @endif
                    </div>
                    <div class="card-body" >
                        <label>Name</label>
                        <p>{{ $user->name }}</p>
                        <label>Email</label>
                        <p>{{ $user->email }}</p>
                        <label>Role</label>
                        <p>{{ $user->role }}</p>
                    </div>
                </div>
            </div>

            <div class="col-9">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-4">List Transaksi</h4>
                        <div class="table-responsive">
                            <table id="dataTable" class="table-bordered table-md table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Museum</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($data as $key => $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->museum->name }}</td>
                                        <td>{{ $item->total_price }}</td>
                                        <td>{{ $item->qty }}</td>
                                        @if ($item->status == 'Paid')
                                            <td class="badge badge-success" style="margin: 10%">{{ $item->status }}</td>
                                        @elseif ($item->status == 'Waiting Payment')
                                            <td class="badge badge-secondary" style="margin: 10%">{{ $item->status }}</td>
                                        @elseif ($item->status == 'Waiting Verification')
                                            <td class="badge badge-warning" style="margin: 10%">{{ $item->status }}</td>
                                        @else
                                            <td class="badge badge-danger" style="margin: 10%">{{ $item->status }}</td>
                                        @endif

                                        <td>
                                            @if ($item->status == 'Paid')
                                                <a href="/transaction/{{ $item->id }}" class="btn btn-primary">Detail</a>
                                            @elseif ($item->status != 'Paid' && $item->status != 'Cancelled')
                                                <a href="/transaction_verification/{{ $item->id }}" class="btn btn-primary">Verifikasi</a>
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
        </div>
    </div>
@endsection
