@extends('dashboard.template.home')
@section('subjudul', 'Complaints')

@section('content')

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

    @if ($auth == 1)
        <a href="{{ route('complaint.create') }}" class="btn btn-success mb-3 btn-md">Add Bill</a>
    @endif

    <div class="card mb-4">
        <h2>BILLS</h2>
    </div>
    
@endsection

@section('add-script')

@endsection
