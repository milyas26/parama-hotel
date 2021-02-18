@extends('dashboard.template.home')
@section('subjudul', 'Announcements')

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

    @if ($auth == 1)
        <a href="{{ route('announcement.create') }}" class="btn btn-success mb-3 btn-md">Add Announcement</a>
    @endif

    @if (auth()->user()->role_id == 1)
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Image</th>
                <th>Title</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($announcement as $result => $hasil)
                <tr>
                    <td class="text-center">{{ $no++ }}</td>
                    <td>
                        @if ($hasil->image == null)
                            <img src="{{ url('backend/img/default-news.svg') }}" class="card-img-top mx-auto"
                                style="max-width: 100px;" alt="">
                        @else
                            <img src="{{ url($hasil->image) }}" class="card-img-top mx-auto" style="max-width: 100px;"
                                alt="">
                        @endif
                    </td>
                    <td>{{ $hasil->title }}</td>
                    <td>{{ $hasil->created_at->diffForHumans() }}</td>
                    <td>{{ $hasil->updated_at->diffForHumans() }}</td>
                    <td>
                        <form action="{{ route('announcement.destroy', $hasil->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <a href="{{ route('announcement.edit', $hasil->id) }}"
                                class="btn btn-warning btn-sm">Edit</a>
                            <button type="submit" href="" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @elseif (auth()->user()->role_id > 1)
        <div class="card-body">
            <div class="row">
                @forelse ($announcement as $item)
                <div class="col-xl-4">
                    <div class="card">
                        @if ($item->image == null)
                        <img src="{{url('backend/img/default-news.svg')}}" style="width:100%" class="card-img-top" alt="">
                        @else
                        <img src="{{url($item->image)}}" style="width:100%" class="card-img-top" alt="">
                        @endif
                        <div class="card-body">
                            <h3 class="text-primary">{{$item->title}}</h3>
                            <p class="text-muted contentEditor"></p>
                            <a href="{{route('announcement.show', $item->id)}}" class="btn btn-outline-info">Read more</a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-xl-12">
                    <div class="alert alert-info">Announcement not available yet</div>
                </div>
                @endforelse
            </div>
        </div>
        @endif
@endsection

@section('add-script')
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });

    </script>
@endsection
