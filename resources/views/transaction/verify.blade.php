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
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="section-body">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6" style="text-align: center;margin-bottom: 20px;">
                    <div class="card">
                        <div class="card-body">
                            <div style="width: 500; height: 800 " id="reader" style="display: inline-block;"></div>
                            <div class="empty"></div>
                            <div id="scanned-result"></div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                    <form action="verify" method="post">
                        <div class="card">
                            <div class="card-body">
                                @csrf
                                <input type="hidden" name="code" value="" id="code">
                                <div class="form-group">
                                    <label>Ticket ID</label>
                                    <input type="text" class="form-control" id="ticketID" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Ticket</label>
                                    <input type="text" class="form-control" id="ticket" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <input type="text" class="form-control" id="ticketStatus" name="status" readonly>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <script>
        function onScanSuccess(decodedText, decodedResult) {
            html5QrcodeScanner.pause(true)
            $.ajax({
                type: 'GET',
                url: `{{ url('verify') }}/${decodedText}`,
                success: (res) => {
                    $('#ticketID').val(res.data.id)
                    $('#ticket').val(res.data.name)
                    $('#ticketStatus').val(res.data.status)
                    $('#code').val(decodedText)
                },
                error: function(data) {
                    console.log(data);
                }
            });

        }

        let html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", {
                fps: 10,
                qrbox: {
                    width: 1000,
                    height: 1000
                }
            },
            /* verbose= */
            false);
        html5QrcodeScanner.render(onScanSuccess);
    </script>
@endpush
