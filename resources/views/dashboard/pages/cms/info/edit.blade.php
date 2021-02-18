@extends('dashboard.template.home')
@section('subjudul', 'Create Info')

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

    <form action="{{ route('info.update', $info->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group">
            <label>Judul</label>
            <input type="text" class="form-control" name="title" value="{{ $info->title }}">
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control" style="height: 250px; resize: none">{{ $info->description }}</textarea>
        </div>
        <div class="form-group">
            <label>Thumbnail</label>
            <input type="file" class="form-control" name="image">
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-block">Update Info</button>
        </div>
    </form>
@endsection
