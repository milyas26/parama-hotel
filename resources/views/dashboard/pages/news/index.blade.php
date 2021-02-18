@extends('dashboard.template.home')
@section('subjudul', 'News')

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
        <a href="{{ route('news.create') }}" class="btn btn-success mb-3 btn-md">Add News</a>
    @endif
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Thumbnail</th>
                <th>Created</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($news as $result => $hasil)
                <tr>
                    <td class="text-center">{{ $no++ }}</td>
                    <td>{{ $hasil->title }}</td>
                    <td><img src="{{ $hasil->image }}" alt="Image" style="width: 100px"></td>
                    <td>{{ $hasil->created_at }}</td>
                    <td>
                        <form action="{{ route('news.destroy', $hasil->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <a href="{{ route('news.edit', $hasil->id) }}" class="btn btn-warning btn-sm">Edit</a>
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
