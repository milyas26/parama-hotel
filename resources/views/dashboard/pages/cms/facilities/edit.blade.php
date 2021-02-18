@extends('dashboard.template.home')
@section('subjudul', 'Update Facility')

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

    <form action="{{ route('facilities.update', $facilities->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group">
        <label for="">Thumbnail</label>
        <br>
        <img src="{{ url($facilities->image) }}" alt="thumbnail" style="max-width: 200px">
        <br>
        <br>
        <label>Image</label>
        <input type="file" name="image" id="image" class="form-control" required>
        </div>
        {{-- <div id="added"></div>  --}}
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $facilities->title }}" required>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" id="description" class="form-control" cols="30" rows="10" required style="height: 120px">{{ $facilities->description }}</textarea>
        </div>
        
        <div class="form-group">
            <button class="btn btn-primary btn-block">Update Facility</button>
        </div>
    </form>
@endsection
