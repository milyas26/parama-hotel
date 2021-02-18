@extends('dashboard.template.home')
@section('subjudul', 'Users')

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
        <a href="{{ route('user.create') }}" class="btn btn-success mb-3 btn-md">Add User</a>
    @endif
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($users as $result => $hasil)
                <tr>
                    <td class="text-center">{{ $no++ }}</td>
                    <td>{{ $hasil->name }}</td>
                    <td>{{ $hasil->phone }}</td>
                    <td>{{ $hasil->email }}</td>
                    <td>{{ $hasil->role->name_role }}</td>
                    <td>
                        <form action="{{ route('user.destroy', $hasil->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <a href="{{ route('user.edit', $hasil->id) }}" class="btn btn-warning btn-sm">Edit</a>
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
