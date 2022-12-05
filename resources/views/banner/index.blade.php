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
            <a href="{{ url('banner/create') }}" class="btn btn-icon icon-left btn-primary">
                <i class="fa fa-plus"></i>
                &nbsp; Tambah Data Banner
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="dataTable" class="table-bordered table-md table">
                    <thead>
                        <tr>
                            <th style="width: 5%">#</th>
                            <th style="width: 15%">Gambar</th>
                            <th>Name</th>
                            <th>Link</th>
                            <th style="width: 10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($banners as $key => $banner)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td><img class="zoom" src="{{ $banner->image }}" alt="" width="100%"></td>
                            <td style="width: 20%">{{ $banner->name }}</td>
                            <td style="width: 14%">{{ $banner->link }}</td>
                            <td>
                                <a href="banner/{{ $banner->id }}/edit" class="btn btn-primary">
                                    Edit
                                </a>
                                <a
                                    href="#" data-id="{{ $banner->id }}"
                                    data-name="{{ $banner->name }}"
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
        let banner_name = $(this).attr('data-name');

        $('#deleteForm').attr('action', '/banner/' + id);
        $('#banner_name').text('Hapus ' + banner_name + '?');
    });
</script>
@endsection

<div class="modal modal-danger fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="Delete" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header mb-3">
                <h5 class="modal-title" id="banner_name"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="deleteForm" method="post">
                @csrf
                @method('DELETE')
                <p style="font-size: 16px" class="text-center mt-4 mb-5">
                    Apakah Anda Yakin Ingin Menghapus Banner Ini?
                </p>

                <div class="modal-footer" style="padding-top: 5px">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Ya</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>

</script>
@endpush
