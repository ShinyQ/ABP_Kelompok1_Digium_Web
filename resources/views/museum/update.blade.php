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

<div class="section-body">
    <div class="row">
        <div class="col-10 mx-auto">
            <div class="card ">
                <div class="card-body">
                    <form action="/museum/{{ $data->id }}" method="post">
                        @csrf
                        @method('put')
                        <h3 style="margin-bottom: 3rem; margin-top:1rem;">Ubah Data Museum</h3>
                        <div class="form-group row mb-4">
                            <label class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input id="nama" type="text" name="name" class="form-control" value="{{ $data->name }}">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-sm-2 col-form-label">Background</label>
                            <div class="col-sm-10">
                                <input id="background" type="text" name="background" class="form-control"
                                    value="{{ $data->background }}">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-sm-2 col-form-label">Phone</label>
                            <div class="col-sm-10">
                                <input id="phone" type="text" name="phone" class="form-control"
                                    value="{{ $data->phone }}">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-sm-2 col-form-label">Tahun Berdiri</label>
                            <div class="col-sm-10">
                                <input id="year_built" type="text" name="year_built" class="form-control"
                                    value="{{ $data->year_built }}">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <textarea id="alamat" name="address" class="form-control"
                                    style="height: 80px">{{ $data->address }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-10">
                                <textarea id="deskripsi" name="description" class="form-control"
                                    style="height: 80px">{{ $data->description }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-sm-2 col-form-label">Panorama</label>
                            <div class="col-sm-10">
                                <input id="panorama" type="text" name="panorama" class="form-control"
                                    value="{{ $data->panorama }}">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-sm-2 col-form-label">Harga Satuan</label>
                            <div class="col-sm-10">
                                <input id="harga" type="text" name="price" class="form-control"
                                    value="{{ $data->price }}">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-sm-2 col-form-label">Lokasi</label>
                            <div class="col-sm-10">
                                {{-- <div id='map' style='width: 100%; height: 200px;'></div> --}}
                                <input id="latitude" type="text" name="latitude" class="form-control"
                                    value="{{ $data->latitude }}">
                                <input id="longitude" type="text" name="longitude" class="form-control"
                                    value="{{ $data->longitude }}">
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection