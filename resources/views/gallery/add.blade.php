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

    <form action="{{ url('museum') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="section-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5>Upload Background Museum</h5>
                        </div>
                        <div class="card-body d-flex justify-content-center">
                            <div id="image-preview" class="image-preview" style="height: 250px">
                                <label for="image-upload" id="image-label">Choose File</label>
                                <input type="file" accept="image/*" name="background" id="image-upload" />
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5>Pilih Lokasi Museum</h5>
                        </div>
                        <div class="card-body">
                            <div id="map" style="width: 100%; height: 260px"></div><br>
                            <input type="text" class="form-control" name="coordinate" id="coordinate">
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
                                <input type="text" class="form-control" name="name">
                            </div>

                            <div class="form-group">
                                <label>Kontak</label>
                                <input type="number" class="form-control" name="phone">
                            </div>

                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea class="form-control h-25" rows="4" name="description"></textarea>
                            </div>

                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control h-25" rows="3" name="address"></textarea>
                            </div>

                            <div class="form-group">
                                <label>Harga Tiket</label>
                                <input type="number" min="1" class="form-control" name="price">
                            </div>

                            <div class="form-group">
                                <label>Tanggal Dibuka</label>
                                <input type="date" class="form-control" name="year_built">
                            </div>

                            <button class="btn btn-primary float-right">Tambah Data</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
