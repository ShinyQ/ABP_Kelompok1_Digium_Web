@extends('layout.main')
@section('content')
    <div class="section-header">
        <div class="aligns-items-center d-inline-block">
            <a href="{{ url('museum') }}">
                <i class="h5 fa fa-arrow-left"></i>
            </a> &nbsp; &nbsp;
            <h1>{{ $title }}</h1>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger" style="padding-bottom: 2px">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <form action="{{ url('museum/' . $data->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="section-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5>Upload Background Museum</h5>
                        </div>
                        <div class="card-body d-flex justify-content-center">
                            @if (substr($data->background, 0, 4) == 'http')
                                <div id="image-preview" class="image-preview" style="height: 250px; background-image: url('{{ $data->background }}'); background-size: cover; background-position: center center;">
                                    <label for="image-upload" id="image-label">Choose File</label>
                                    <input type="file" accept="image/*" name="background" id="image-upload" />
                                </div>
                            @else
                                <div id="image-preview" class="image-preview" style="height: 250px; background-image: url('{{ asset('assets/images/museum/' . $data->background) }}'); background-size: cover; background-position: center center;">
                                    <label for="image-upload" id="image-label">Choose File</label>
                                    <input type="file" accept="image/*" name="background" id="image-upload" />
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5>Pilih Lokasi Museum</h5>
                        </div>
                        <div class="card-body">
                            <div id="map" style="width: 100%; height: 260px"></div><br>
                            <input type="text" class="form-control" name="coordinate" id="coordinate" value="{{ $coordinate_str }}">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5>Masukkan Form Data Museum</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="name" value="{{ $data->name }}">
                            </div>

                            <div class="form-group">
                                <label>Kontak</label>
                                <input type="string" class="form-control" name="phone" value="{{ $data->phone }}">
                            </div>

                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea class="form-control h-25" rows="4" name="description">{{ $data->description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control h-25" rows="3" name="address">{{ $data->address }}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Harga Tiket</label>
                                <input type="number" min="1" class="form-control" name="price" value="{{ $data->price }}">
                            </div>

                            <div class="form-group">
                                <label>Tanggal Dibuka</label>
                                <input type="date" class="form-control" name="year_built" value="{{ date('Y-m-d', strtotime($data->year_built)) }}">
                            </div>

                            <button class="btn btn-primary float-right">Edit Data</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="card">
        <div class="card-header">
            <h5>Galeri Foto Museum</h5>
        </div>
        <div class="card-body">
            <a href="#" class="btn btn-icon icon-left btn-primary mb-4" data-toggle="modal" data-target="#addModal">
                <i class="fa fa-plus"></i>
                &nbsp; Tambah Data Galeri
            </a>
            <div class="row">
                @forelse($gallery as $item)
                    <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                        <article class="article">
                            <div class="article-header">
                                @if (substr($item->photo, 0, 4) == 'http')
                                    <div class="article-image gallery-item" data-background="{{ $item->photo }}" style='background-image: url("{{ $item->photo }}");'>
                                        <div class="galery-overlay"></div>
                                        <a href="#" data-id="{{ $item->id }}" class="btn btn-danger btn-gallery-delete" data-toggle="modal" data-target="#deleteModal">Hapus</a>
                                    </div>
                                @else
                                    <div class="article-image gallery-item" data-background="{{ asset('assets/images/gallery/' . $data->id . '/' . $item->photo) }}" style='background-image: url("{{ asset('assets/images/museum/' . $item->id . '/' . $item->photo) }}");'>
                                        <div class="galery-overlay"></div>
                                        <a href="#" data-id="{{ $item->id }}" class="btn btn-danger btn-gallery-delete" data-toggle="modal" data-target="#deleteModal">Hapus</a>
                                    </div>
                                @endif
                            </div>
                        </article>
                    </div>
                @empty
                    <center>
                        <h3>Belum Ada Data Galeri</h3>
                    </center>
                @endforelse
            </div>
        </div>
    </div>
@endsection

<div class="modal modal-danger fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="Delete" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header mb-3">
                <h5 class="modal-title" id="museum_name">Hapus Galeri</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="deleteForm" method="post">
                @csrf
                @method('DELETE')
                <p style="font-size: 16px" class="mt-4 mb-5 text-center">
                    Apakah Anda Yakin Ingin Menghapus Galeri Ini?
                </p>
                <div class="modal-footer" style="padding-top: 5px">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Ya</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="addForm" action="{{ url('gallery') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header mb-3">
                    <h5 class="modal-title" id="museum_name">Tambah Galeri</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <input type="hidden" name="museum_id" value="{{ $data->id }}">
                <div id="image-preview" class="image-preview">
                    <label for="image-upload" id="image-label">Choose File</label>
                    <input type="file" accept="image/*" name="photo" id="image-upload" />
                </div>

                <div class="modal-footer" style="padding-top: 5px">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-info">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

@push('scripts')
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.7.0/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.7.0/mapbox-gl.css' rel='stylesheet' />

    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.css" type="text/css">
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.min.js"></script>

    <script>
        mapboxgl.accessToken = 'pk.eyJ1Ijoic2hpbnlxMTEiLCJhIjoiY2ptY3d3OGxsMTA1dDNsbnl4OXJ1cHpkeCJ9.7fp_UEinaxDc5l8kOT6nBw';
        const map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/satellite-streets-v11',
            center: @json($coordinate),
            zoom: 15
        });

        const geocoder = new MapboxGeocoder({
            accessToken: mapboxgl.accessToken,
            mapboxgl: mapboxgl,
            marker: false,
            placeholder: 'Masukan kata kunci...',
            zoom: 15
        });

        map.addControl(geocoder);

        let marker = new mapboxgl.Marker()
            .setLngLat(@json($coordinate))
            .addTo(map);

        map.on('click', function(e) {
            if (marker == null) {
                marker = new mapboxgl.Marker()
                    .setLngLat(e.lngLat)
                    .addTo(map);
            } else {
                marker.setLngLat(e.lngLat)
            }

            lk = e.lngLat
            document.getElementById("coordinate").value = e.lngLat.lat + "," + e.lngLat.lng;
        });
    </script>

    <script>
        $("select").selectric();
        $.uploadPreview({
            input_field: "#image-upload", // Default: .image-upload
            preview_box: "#image-preview", // Default: .image-preview
            label_field: "#image-label", // Default: .image-label
            label_default: "Choose File", // Default: Choose File
            label_selected: "Change File", // Default: Change File
            no_label: false, // Default: false
            success_callback: null // Default: null
        });
        $(".inputtags").tagsinput('items');
        $(document).on('click', '.btn-gallery-delete', function() {
            let id = $(this).attr('data-id');
            $('#deleteForm').attr('action', '/gallery/' + id);
        });
    </script>
@endpush
