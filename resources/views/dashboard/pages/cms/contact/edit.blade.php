@extends('dashboard.template.home')
@section('subjudul', 'Update Contact')

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

    <form action="{{ route('contact.update', $contact->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group">
            <label>Judul</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Masukan judul" value="{{ $contact->title }}">
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="Masukan deskripsi" style="height: 120px">{{ $contact->description }}</textarea>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Masukan email" value="{{ $contact->email }}">
        </div>
        <div class="form-group">
            <label>No Telepone</label>
            <input type="text" name="phone" id="phone" class="form-control" placeholder="Masukan no telepone" value="{{ $contact->phone }}">
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <textarea name="address" id="address" cols="30" rows="10" class="form-control" placeholder="Masukan alamat" style="height: 120px">{{ $contact->address }}</textarea>
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-block">Update Contact</button>
        </div>
    </form>
@endsection
