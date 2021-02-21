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

      <div class="card-body">
            <form action="{{route('complaint.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="Enter Title" required>
                </div>
                <div class="form-group">
                    <label>Complain Message</label>
                    <textarea name="content_complaint" id="content_complain" cols="30" rows="10" placeholder="Enter Complain Message ..." class="form-control" required style="height: 150px"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success text-uppercase Poppins py-2 px-4 font-weight-bold">Complain</button>
                </div>
            </form>
      </div>
    </div>
    
@endsection

@section('add-script')

@endsection
