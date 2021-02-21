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

    <div class="card mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Complain</h6>
        </div>
        <div class="card-body">
            <div class="media">
                <img src="{{url('backend/img/user.svg')}}" class="mr-3 img-profile rounded-circle" style="width:5%;" alt="icon user">
                <div class="media-body">
                    <h5 class="m-0 text-dark">{{$complain->user->name}} : {{$complain->title}}</h5>
                    <small class="text-gray-500">{{$complain->created_at->diffForHumans()}}</small>
                    <p class="mt-2 text-muted">
                        {{$complain->content_complain}}
                    </p>
                </div>
            </div>
            <div id="form-comment">
                <form action="{{route('comment.store')}}" method="post">
                    @csrf
                    <input type="text" name="complain_id" id="" value="{{$complain->id}}" class="form-control d-none">
                    <div class="form-group">
                        <label>Reply Complain</label>
                        <textarea name="comment" id="comment" class="form-control" placeholder="Reply this complain ..." cols="30" rows="10" style="height: 150px"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Reply</button>
                    </div>
                </form>
                <hr>
            </div>
            @forelse ($comment as $comments)
            <div class="px-5 py-3">
                <div class="media">
                    <img src="{{url('backend/img/user.svg')}}" class="mr-3 img-profile rounded-circle" style="width:5%;" alt="icon user">
                    <div class="media-body">
                        <h5 class="m-0 text-dark">{{$comments->user->name}}</h5>
                        <small class="text-gray-500">{{$comments->created_at->diffForHumans()}}</small>
                        <p class="mt-2 text-muted">
                            {{$comments->comment}}
                        </p>
                    </div>
                </div>
            </div>
            <hr>
            @empty
            <div class="alert alert-info">Comments are still empty</div>
            @endforelse
        </div>
    </div>
    
@endsection

@section('add-script')

@endsection
