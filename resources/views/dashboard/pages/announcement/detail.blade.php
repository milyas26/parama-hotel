@extends('dashboard.template.home')
@section('subjudul', 'Announcement')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    @if (Session::get('role_id') == 1)
    <a href="{{route('announcement.create')}}" class="btn btn-outline-info py-2 px-3 mb-3">
        Add New Announcement
    </a>
    @endif
    @if (session('error'))
      <div class="alert alert-danger">
        {{session('error')}}
      </div>
    @endif
    @if (session('add'))
      <div class="alert alert-success">
        {{session('add')}}
      </div>
    @endif
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body p-5">
            @if ($announcement->image == null)
            <img src="{{url('backend/img/default-news.svg')}}" class="card-img-top mx-auto" style="max-height: 500px;" alt="">
            @else
            <img src="{{url($announcement->image)}}" class="card-img-top mx-auto" style="max-height: 400px;" alt="">
            @endif
            <p class="mt-3">{{$announcement->created_at}}</p>
            <h3 class="text-primary">{{$announcement->title}}</h3>
            <div class="content">{!!$announcement->description!!}</div>
        </div>
    </div>

  </div>
@endsection
@section('add-script')
<script>
</script>
@endsection