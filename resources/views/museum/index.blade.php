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
                                    <td>{{ 'Rp' . number_format($museum->price, 2, ',', '.') }}</td>
                                    <td>
                                        <a href="#" data-id="{{ $museum->id }}" class="detail btn btn-primary">
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
                        <input id="nama" type="text" name="nama" class="form-control">
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-sm-2 col-form-label">Phone</label>
                    <div class="col-sm-10">
                        <input id="phone" type="text" name="phone" class="form-control">
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-sm-2 col-form-label">Tahun Berdiri</label>
                    <div class="col-sm-10">
                        <input id="yearBuilt" type="text" name="yearBuilt" class="form-control">
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <textarea id="alamat" name="alamat" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                        <textarea id="deskripsi" name="deskripsi" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-sm-2 col-form-label">Harga Satuan</label>
                    <div class="col-sm-10">
                        <input id="harga" type="text" name="harga" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-1">
                        <input class="btn btn-success mb-3 text-center" type="submit" value="Simpan">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
                        console.log(res.data)
                        $('#titleModal').html('Detail Museum')
                        $('#nama').val(res.data.name);
                        $('#deskripsi').val(res.data.description);
                        $('#alamat').val(res.data.address);
                        $('#harga').val(res.data.price);
                        $('#phone').val(res.data.phone);
                        $('#yearBuilt').val(res.data.yearBuilt);
                        //$('#editForm').attr('action', '/obat/' + id);
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
