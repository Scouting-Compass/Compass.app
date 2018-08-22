@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">Users</h1>
            <div class="page-subtitle">Management panel</div>

            <div class="page-options d-flex">
                <div class="btn-group">
                    <button type="button" class="btn tw-rounded btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fe mr-1 fe-filter"></i> Filter
                    </button>
                            
                    <div class="dropdown-menu">
                        <a class="dropdown-item">All users</a>
                        <a class="dropdown-item" href="#">Administrators</a>
                        <a class="dropdown-item" href="#">Recent users</a>
                        <a class="dropdown-item" href="#">Deactivated users</a>
                        <a class="dropdown-item" href="#">Deleted users</a>
                    </div>
                </div>
                    
                <form class="ml-2">
                    <input type="text" class="form-control" placeholder="Search user">
                </form>
            </div>
        </div>
    </div>

    <div class="container py-3">
        <div class="card card-body tw-shadow">
        </div>
    </div>
@endsection