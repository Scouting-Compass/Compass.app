@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">Helpdesk</h1>
            <div class="page-subtitle">Dashboard</div>

            <div class="page-options d-flex">
                <a href="{{ route('helpdesk.categories.index') }}" class="btn btn-outline-primary">
                    <i class="fe fe-sliders mr-1"></i> Configuration
                </a>

                <a href="" class="ml-2 btn btn-outline-primary">
                    <i class="fe fe-file-plus mr-1"></i> Create ticket
                </a>
            </div>
        </div>
    </div>

    <div class="container py-3">
        <div class="row">
            <div class="col-sm-6 col-lg-3">
                <div class="card tw-shadow p-2">
                    <div class="d-flex align-items-center">
                        <a href="">
                            <span class="stamp stamp-md tw-shadow bg-blue mr-3">
                                <i class="fe fe-file"></i>
                            </span>
                        </a>

                        <div>
                            <h6 class="m-0">0 <small>Total tickets</small></h6>
                            <small class="text-muted">0 created today</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="card tw-shadow p-2">
                    <div class="d-flex align-items-center">
                        <a href="">
                            <span class="stamp stamp-md tw-shadow bg-blue mr-3">
                                <i class="fe fe-activity"></i>
                            </span>
                        </a>

                        <div>
                            <h6 class="m-0">0 <small>Assigned tickets</small></h6>
                            <small class="text-muted">0 assigned today</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="card tw-shadow p-2">
                    <div class="d-flex align-items-center">
                        <a href="">
                            <span class="stamp stamp-md tw-shadow bg-red mr-3">
                                <i class="fe fe-thumbs-down"></i>
                            </span>
                        </a>

                        <div>
                            <h6 class="m-0">0 <small>Open tickets</small></h6>
                            <small class="text-muted">0 opened today</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="card tw-shadow p-2">
                    <div class="d-flex align-items-center">
                        <a href="">
                            <span class="stamp stamp-md tw-shadow bg-green mr-3">
                                <i class="fe fe-thumbs-up"></i>
                            </span>
                        </a>

                        <div>
                            <h6 class="m-0">0 <small>Closed tickets</small></h6>
                            <small class="text-muted">0 closed today</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection