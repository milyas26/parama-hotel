@extends('dashboard.template.home')
@section('subjudul', 'Youtube')

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

    <a href="{{ route('youtube.create') }}" class="btn btn-success mb-3 btn-md">Add Youtube</a>

    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Url Video</th>
                <th>Url Thumbnail</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($youtube as $result => $hasil)
                <tr>
                    <td class="text-center">{{ $no++ }}</td>
                    <td>{{ $hasil->title }}</td>
                    <td>{{ $hasil->url }}</td>
                    <td><img src="{{ url($hasil->url_thumbnail) }}" alt="" style="max-width: 200px"></td>
                    <td>
                        <form action="{{ route('youtube.destroy', $hasil->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <a href="{{ route('youtube.edit', $hasil->id) }}" class="btn btn-warning btn-sm">Edit</a>
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
