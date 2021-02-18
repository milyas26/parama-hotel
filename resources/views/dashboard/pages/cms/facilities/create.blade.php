@extends('dashboard.template.home')
@section('subjudul', 'Create Facility')

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

    <form action="{{ route('facilities.create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
        <label>Image</label>
        <input type="file" name="image" id="image" class="form-control" required>
        </div>
        {{-- <div id="added"></div>  --}}
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" id="description" class="form-control" cols="30" rows="10" required style="height: 120px"></textarea>
        </div>
        <div class="form-group">
            <label>Category</label>
            <select name="category" id="category" class="custom-select">
                <option value="0" disabled>-- Choose Category --</option>
                <option value="fasilitas/kolam_renang">Kolam Renang</option>
                <option value="fasilitas/sauna">Sauna</option>
                <option value="fasilitas/gym">Tempat Fitnes</option>
                <option value="fasilitas/tenis">Lapangan Tenis</option>
                <option value="fasilitas/parkiran">Tempat Parkir</option>
            </select>
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-block">Add Facility</button>
        </div>
    </form>
@endsection
