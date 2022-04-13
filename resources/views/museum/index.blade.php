@extends('layout.main')
@section('content')
@if(session('msg'))
<div class="alert alert-success alert-dismissible show fade">
    <div class="alert-body">
        <button class="close" data-dismiss="alert">
            <span>×</span>
        </button>
        {{ session('msg') }}
    </div>
</div>
@endif
<div class="section-header">
    <div class="aligns-items-center d-inline-block">
        <h1>{{ $title }}</h1>
    </div>
    <div class="aligns-items-right d-inline-block">
        <a href="museum/create" class="btn btn-primary" style="position: relative; left: 600px;">
            Tambah data
        </a>
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
                            <th>Photo</th>
                            <th style="width: 15%">Name</th>
                            <th style="width: 20%">Address</th>
                            <th>Phone</th>
                            <th>Harga Tiket</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($museums as $key => $museum)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td><img src="{{ $museum->background }}" alt="" width="150px"></td>
                            <td style="width: 15%">{{ $museum->name }}</td>
                            <td style="width: 20%">{{ $museum->address }}</td>
                            <td>{{ $museum->phone }}</td>
                            <td>{{ 'Rp' . number_format($museum->price, 2, ',', '.') }}</td>
                            <td>
                                <a href="#" data-id="{{ $museum->id }}" class="detail btn btn-primary">
                                    Detail
                                </a>
                                <a href="museum/{{ $museum->id }}/edit" class="btn btn-outline-primary">
                                    Edit
                                </a>
                                <form action="museum/{{ $museum->id }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                                </form>
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

<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <h3 class="mt-4 mb-3 text-center" id="titleModal">Detail Museum</h3>
            <div class="modal-body" style="padding-bottom: 5px">
                <div class="form-group row mb-4">
                    <label class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input id="nama" type="text" name="nama" class="form-control" disabled>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-sm-2 col-form-label">Phone</label>
                    <div class="col-sm-10">
                        <input id="phone" type="text" name="phone" class="form-control" disabled>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-sm-2 col-form-label">Tahun Berdiri</label>
                    <div class="col-sm-10">
                        <input id="year_built" type="text" name="year_built" class="form-control" disabled>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <textarea id="alamat" name="alamat" class="form-control" style="height: 80px"
                            disabled></textarea>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                        <textarea id="deskripsi" name="deskripsi" class="form-control" style="height: 80px"
                            disabled></textarea>
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label class="col-sm-2 col-form-label">Harga Satuan</label>
                    <div class="col-sm-10">
                        <input id="harga" type="text" name="harga" class="form-control" disabled>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-sm-2 col-form-label">Lokasi</label>
                    <div class="col-sm-10">
                        <div id='map' style='width: 100%; height: 200px;'></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src='https://api.mapbox.com/mapbox-gl-js/v2.7.0/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v2.7.0/mapbox-gl.css' rel='stylesheet' />

@push('scripts')
<script>
    $(document).ready(function() {
            $(document).on('click', '.detail', function(event) {
                event.preventDefault();
                const id = $(this).data('id');
                $.ajax({
                    type: 'GET',
                    url: `{{ url('museum') }}/${id}`,
                    success: (res) => {
                        const numb = res.data.price
                        const format = numb.toString().split('').reverse().join('');
                        const convert = format.match(/\d{1,3}/g);
                        const rupiah = 'Rp' + convert.join('.').split('').reverse().join('')

                        mapboxgl.accessToken = 'pk.eyJ1Ijoic2hpbnlxMTEiLCJhIjoiY2ptY3d3OGxsMTA1dDNsbnl4OXJ1cHpkeCJ9.7fp_UEinaxDc5l8kOT6nBw';
                        const map = new mapboxgl.Map({
                            container: 'map',
                            style: 'mapbox://styles/mapbox/satellite-streets-v11',
                            center: [res.data.longitude, res.data.latitude],
                            zoom: 16
                        });

                        const marker1 = new mapboxgl.Marker()
                            .setLngLat([res.data.longitude, res.data.latitude])
                            .addTo(map);

                        $('#titleModal').html('Detail Museum')
                        $('#nama').val(res.data.name);
                        $('#deskripsi').val(res.data.description);
                        $('#alamat').val(res.data.address);
                        $('#harga').val(rupiah);
                        $('#phone').val(res.data.phone);
                        $('#year_built').val(res.data.year_built);
                        $('#detailModal').modal('show');
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            });
        });
</script>
@endpush