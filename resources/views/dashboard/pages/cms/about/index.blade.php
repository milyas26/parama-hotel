@extends('dashboard.template.home')
@section('subjudul', 'About')

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

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
                {{ session('error') }}
            </div>
        </div>
    @endif

    <a href="{{ route('about.create') }}" class="btn btn-success mb-3 btn-md">Add About</a>

    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Image</th>
                <th>Title</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($about as $result => $hasil)
                <tr>
                    <td class="text-center">{{ $no++ }}</td>
                    <td><img src="{{ url($hasil->image) }}" alt="image" style="max-width: 200px"></td>
                    <td>{{ $hasil->title }}</td>
                    <td>{{ $hasil->description }}</td>
                    <td>
                        <form action="{{ route('about.destroy', $hasil->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <a href="{{ route('about.edit', $hasil->id) }}"
                                class="btn btn-warning btn-sm">Edit</a>
                            <button type="submit" href="" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('add-script')
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });

    </script>
@endsection
