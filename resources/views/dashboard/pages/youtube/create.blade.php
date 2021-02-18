@extends('dashboard.template.home')
@section('subjudul', 'Tambah Youtube')

@section('content')
    @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                    {{ $error }}
                </div>
            </div>
        @endforeach
    @endif

    @if (Session::has('success'))
        <div class="alert alert-primary alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
                {{ Session('success') }}
            </div>
        </div>
    @endif

    <form action="{{ route('youtube.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Judul</label>
            <input type="text" class="form-control" name="title">
        </div>
        <div class="form-group">
            <label>Url Thumbnail</label>
            <input type="text" class="form-control" name="url_thumbnail">
        </div>
        <div class="form-group">
            <label>Url Video</label>
            <input type="text" class="form-control" name="url_video">
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-block">Add Youtube</button>
        </div>
    </form>
@endsection
