@extends('layout.admin')
@section('title')
Dashboard 
@endsection
@section('content')     
    <!-- Page Wrapper -->
    <div class="page-wrapper">
    
        <div class="content container-fluid">
            
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">ברוכים הבאים {{$user->name}}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">הדשבורד שלך</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="dash-widget-header">
                                <span class="dash-widget-icon text-primary border-primary">
                                    <i class="fe fe-users"></i>
                                </span>
                                <div class="dash-count">
                                    <h3>
                                        0
                                    </h3>
                                </div>
                            </div>
                            <div class="dash-widget-info">
                                <h6 class="text-muted">הכתבות באתר</h6>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-primary w-50"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="dash-widget-header">
                                <span class="dash-widget-icon text-success">
                                    <i class="fe fe-credit-card"></i>
                                </span>
                                <div class="dash-count">
                                    <h3>
                                        0
                                    </h3>
                                </div>
                            </div>
                            <div class="dash-widget-info">
                                
                                <h6 class="text-muted">ניהול מוצרים</h6>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-success w-50"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>          
    </div>
    <!-- /Page Wrapper -->

</div>
<!-- /Main Wrapper -->
@endsection