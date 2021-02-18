@extends('dashboard.template.home')
@section('subjudul', 'Edit Youtube')

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

    <form action="{{ route('youtube.update', $youtube->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="form-group">
            <label>Judul</label>
            <input type="text" class="form-control" name="title" value="{{ $youtube->title }}">
        </div>
        <div class="form-group">
            <label>Url Thumbnail</label>
            <input type="text" class="form-control" name="url_thumbnail" value="{{ $youtube->url_thumbnail }}">
        </div>
        <div class="form-group">
            <label>Url Video</label>
            <input type="text" class="form-control" name="url_video" value="{{ $youtube->url }}">
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-block">Update Youtube</button>
        </div>
    </form>
@endsection
