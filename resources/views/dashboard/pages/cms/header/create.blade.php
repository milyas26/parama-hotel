@extends('dashboard.template.home')
@section('subjudul', 'Create Header')

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

    <form action="{{ route('header.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Main Header</label>
            <input type="text" class="form-control" name="main_title">
        </div>
        <div class="form-group">
            <label>Second Header</label>
            <input type="text" class="form-control" name="second_title">
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-block">Add Header</button>
        </div>
    </form>
@endsection
