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
                            <td>{{ "Rp" . number_format($museum->price,2,',','.') }}</td>
                            <td>
                                <a href="#" data-id="{{ $museum->id }}" data-toggle="modal" data-target="#detailModal" class="detail btn btn-primary">
                                    Detail
                                </a>
                                <a href="museum/{{ $museum->id }}/edit" class="btn btn-outline-primary">
                                    Edit
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <h3 class="text-center mt-4 mb-3">Edit Obat</h3>
                    <div class="modal-body" style="padding-bottom: 5px">
                        <div class="form-group row mb-4">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Kode</label>
                            <div class="col-sm-10">
                                <input id="Kode" type="text" name="Kode" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input id="Nama" type="text" name="Nama" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-10">
                                <textarea id="Deskripsi" name="Deskripsi" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Tipe</label>
                            <div class="col-sm-10 Tipe">
                                <select id="Tipe" class="form-control" name="Tipe">
                                    <option value="Tablet">Tablet</option>
                                    <option value="Kapsul">Kapsul</option>
                                    <option value="Sirup">Sirup</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Jumlah</label>
                            <div class="col-sm-10">
                                <input id="Jumlah" name="Jumlah" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Harga Satuan</label>
                            <div class="col-sm-10">
                                <input id="HargaSatuan" type="text" name="HargaSatuan" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-1">
                                <input class="btn btn-success text-center mb-3" type="submit" value="Simpan">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $(document).on('click','.detail', function(event){
                event.preventDefault();
                const id = $(this).data('id');
                $.get('/museum/' + id, function (data) {
                    $('#name').val(data.data["name"]);
                    $('#description').val(data.data["description"]);
                    $('#Deskripsi').val(data.data["Deskripsi"]);
                    $('#Jumlah').val(data.data["Jumlah"])
                    $('#HargaSatuan').val(data.data["Harga Satuan"]);
                    $('#Tipe').val(data.data["Tipe"]).change();
                    $('#editForm').attr('action', '/obat/' + id);
                })
            });
        });
    </script>
</div>
@endsection
