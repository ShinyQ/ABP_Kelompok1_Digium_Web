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
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <a href="{{ url('museum/create') }}" class="btn btn-icon icon-left btn-primary">
                <i class="fa fa-plus"></i>
                &nbsp; Tambah Data Museum
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="dataTable" class="table-bordered table-md table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Photo</th>
                            <th style="width: 20%">Name</th>
                            <th style="width: 14%">Phone</th>
                            <th>Harga Tiket</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($museums as $key => $museum)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                                <td><img class="zoom" src="{{ $museum->background }}" alt="" width="250px"></td>
                            <td style="width: 20%">{{ $museum->name }}</td>
                            <td style="width: 14%">{{ $museum->phone }}</td>
                            <td>{{ 'Rp' . number_format($museum->price, 2, ',', '.') }}</td>
                            <td>
                                <a href="#" data-id="{{ $museum->id }}" class="detail btn btn-outline-primary">
                                    Detail
                                </a>
                                <a href="museum/{{ $museum->id }}/edit" class="btn btn-primary">
                                    Edit
                                </a>
                                <a
                                    href="#" data-id="{{ $museum->id }}"
                                    data-name="{{ $museum->name }}"
                                    class="btn btn-danger delete"
                                    data-toggle="modal"
                                    data-target="#deleteModal">Hapus
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).on('click','.delete',function(){
        let id = $(this).attr('data-id');
        let museum_name = $(this).attr('data-name');

        $('#deleteForm').attr('action', '/museum/' + id);
        $('#museum_name').text('Hapus ' + museum_name + '?');
    });
</script>
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
                    <label class="col-sm-2 col-form-label">Provinsi</label>
                    <div class="col-sm-10">
                        <input id="province" type="text" name="province" class="form-control" disabled>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-sm-2 col-form-label">Kota</label>
                    <div class="col-sm-10">
                        <input id="city" type="text" name="city" class="form-control" disabled>
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

<div class="modal modal-danger fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="Delete" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header mb-3">
                <h5 class="modal-title" id="museum_name"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="deleteForm" method="post">
                @csrf
                @method('DELETE')
                <p style="font-size: 16px" class="text-center mt-4 mb-5">
                    Apakah Anda Yakin Ingin Menghapus Museum Ini?
                </p>

                <div class="modal-footer" style="padding-top: 5px">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Ya</button>
                </div>
            </form>
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
                        $('#province').val(res.data.province);
                        $('#city').val(res.data.city);
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
