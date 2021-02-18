@extends('dashboard.template.home')
@section('subjudul', 'Dashboard')

@section('content')
    <div class="content_dashboard" style="display: flex">
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card card-primary">
                <div class="card-header justify-content-center">
                    <i class="fa fa-users" style="font-size: 80px; color: #36b9cc"></i>
                </div>
                <div class="card-body" style="text-align: center">
                    <h4>Users</h4>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card card-primary">
                <div class="card-header justify-content-center">
                    <i class="fas fa-newspaper" style="font-size: 80px; color: #1cc88a"></i>
                </div>
                <div class="card-body" style="text-align: center">
                    <h4>Announcements</h4>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card card-primary">
                <div class="card-header justify-content-center">
                    <i class="fa fa-money-bill-wave" style="font-size: 80px; color: #f6c23e "></i>
                </div>
                <div class="card-body" style="text-align: center">
                    <h4>Bills</h4>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card card-primary">
                <div class="card-header justify-content-center">
                    <i class="fa fa-question-circle" style="font-size: 80px; color: #e74a3b"></i>
                </div>
                <div class="card-body" style="text-align: center">
                    <h4>Complaints</h4>
                </div>
            </div>
        </div>
    </div>
@endsection
