@extends('layout.main')
@section('content')
    <div class="section-header">
        <h1>{{ $title }}</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div style="width: 100%; height: 350px" id='myDiv'></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div style="width: 100%; height: 350px" id='myDiv2'></div>
                </div>
            </div>
        </div>

        <style>
            .zoom {
                transition: transform .2s;
                margin: 0 auto;
            }

            .zoom:hover {
                transform: scale(2);
            }
        </style>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-2 mb-4">Verifikasi Transaksi Terkini</h4>
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
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($transaction as $key => $tran)
                                    <tr>
                                        <td>{{ $tran->id }}</td>
                                        @if(substr($tran->receipt, 0, 4) == 'http')
                                            <td><img class="zoom" src="{{ $tran->receipt }}" alt="" width="180px"></td>
                                        @else
                                            <td><img class="zoom" src="{{ asset('assets/images/transaction/'. $tran->id .'/'. $tran->receipt) }}" alt="" width="180px"></td>
                                        @endif
                                        <td style="width: 15%">{{ $tran->museum->name }} <br> ({{ 'Rp' . number_format($tran->museum->price, 2, ',', '.') }})</td>
                                        <td>{{ $tran->user->name }}</td>
                                        <td>{{ 'Rp' . number_format($tran->total_price, 2, ',', '.') }}</td>
                                        <td width="3%">{{ $tran->qty }}</td>
                                        <td>
                                            @if ($tran->status != 'Paid' && $tran->status != 'Cancelled')
                                                <a href="/transaction_verification/{{ $tran->id }}" class="btn btn-primary">Verifikasi</a>
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

    <script src='https://cdn.plot.ly/plotly-2.8.3.min.js'></script>

    <script>
        let total_transaction = @json($get_transaction);

        const trace0 = {
            x: @json($get_date),
            y: @json($get_transaction),
            type: 'line',
            name: 'Peminjaman',
            line: {
                color: '#18C5FA',
                width: 2
            },
            marker: {
                color: '#FCB42A'
            }
        };

        const data = [trace0];
        const layout = {
            title: 'Grafik Transaksi Harian',
            xaxis: {
                title: 'Tanggal'
            },
            yaxis: {
                title: 'Jumlah'
            },
        };

        Plotly.newPlot('myDiv', data, layout);
    </script>

    <script>
        let total = @json($get_total);

        const trace2 = {
            x: @json($get_museum),
            y: @json($get_total),
            type: 'bar',
            name: 'Grafik Peminjaman',
            text: total.map(String),
            textposition: 'auto',
            marker:{
                color: ['#18C5FA', '#18C5FA', '#18C5FA']
            },
        };
        const data1 = [trace2];

        const layout1 = {
            title: 'Grafik Transaksi Top 3 Tiket Museum',
            xaxis: {
                title: 'Nama Museum'
            },
            yaxis: {
                title: 'Jumlah'
            }
        };

        Plotly.newPlot('myDiv2', data1, layout1);
    </script>
@endsection
