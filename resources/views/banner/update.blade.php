@extends('layout.main')
@section('content')
    <div class="section-header">
        <div class="aligns-items-center d-inline-block">
            <a href="{{ url('banner') }}">
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

    <form action="{{ url('banner/' . $data->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="section-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5>Upload Gambar Banner</h5>
                        </div>
                        <div class="card-body d-flex justify-content-center">
                            @php
                                $value = $data->image;

                                if (empty($value)){
                                    $value = "";
                                }else if(str_starts_with($value, 'http')) {
                                    $value = $value;
                                } else {
                                    $value = Storage::disk('s3')->temporaryUrl(
                                        $value, Carbon::now()->addMinutes(60)
                                    );
                                }
                            @endphp
                            <div id="image-preview" class="image-preview" style="height: 250px; background-image: url('{{ $value }}'); background-size: cover; background-position: center center;">
                                <label for="image-upload" id="image-label">Choose File</label>
                                <input type="file" accept="image/*" name="image" id="image-upload" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5>Masukkan Form Data Banner</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="name" value="{{ $data->name }}">
                            </div>

                            <div class="form-group">
                                <label>Link</label>
                                <input type="url" class="form-control" name="link" value="{{ $data->link }}">
                            </div>
                            <button class="btn btn-primary float-right">Edit Data</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
@endsection

@push('scripts')
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
    </script>
@endpush
