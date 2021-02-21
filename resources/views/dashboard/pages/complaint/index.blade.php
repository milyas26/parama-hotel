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

    @if ($auth > 1)
        <a href="{{ route('complaint.create') }}" class="btn btn-success mb-3 btn-md">Add Complaint</a>
    @endif

    <div class="card mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Complain List</h6>
        </div>
        @if ($auth == 1)
        <div class="card-body">
            @forelse ($complain as $item)
            <a href="{{route('complaint.show',$item->id)}}" style="text-decoration : none">
                <div class="card my-2">
                    <div class="card-body">
                        <div class="media">
                            <img src="{{url('backend/img/user.svg')}}" class="mr-3 img-profile rounded-circle" style="width:5%;" alt="icon user">
                            <div class="media-body">
                                <h5 class="m-0 text-dark">{{$item->user->name}} : {{$item->title}}</h5>
                                <small class="text-gray-500">{{$item->created_at->diffForHumans()}}</small>
                                <p class="mt-2 text-muted">
                                    {{$item->content_complain}}
                                </p>
                            </div>
                            @if (auth()->user()->role_id == 1)
                            <form action="{{route('complaint.destroy',$item->id)}}" method="post">
                              @csrf
                              @method('delete')
                              <button type="submit" class="btn btn-danger">Hapus</i></button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
            </a>
            @empty
            <div class="alert alert-warning">No complaints yet</div>
            @endforelse
        </div>
    @else
        <div class="card-body">
            @forelse ($complain_user as $item)
            <a href="{{route('complaint.show',$item->id)}}" style="text-decoration : none">
                <div class="card my-2">
                    <div class="card-body">
                        <div class="media">
                            <img src="{{url('backend/img/user.svg')}}" class="mr-3 img-profile rounded-circle" style="width:5%;" alt="icon user">
                            <div class="media-body">
                                <h5 class="m-0 text-dark">{{$item->user->name}} : {{$item->title}}</h5>
                                <small class="text-gray-500">{{$item->created_at->diffForHumans()}}</small>
                                <p class="mt-2 text-muted">
                                    {{$item->content_complain}}
                                </p>
                            </div>
                            @if (auth()->user()->role_id == 1)
                            <form action="{{route('complaint.destroy',$item->id)}}" method="post">
                              @csrf
                              @method('delete')
                              <button type="submit" class="btn btn-danger">Hapus</i></button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
            </a>
            @empty
            <div class="alert alert-warning">No complaints yet</div>
            @endforelse
        </div>
    @endif
    </div>
    
@endsection

@section('add-script')

@endsection
