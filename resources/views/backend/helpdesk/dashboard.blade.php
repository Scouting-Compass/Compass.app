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

                <a href="{{ route('helpdesk.ticket.create') }}" class="ml-2 btn btn-outline-primary">
                    <i class="fe fe-file-plus mr-1"></i> Create ticket
                </a>
            </div>
        </div>
    </div>

    <div class="container py-3">
        <div class="row row-cards">
            <div class="col-sm-6 col-lg-3">
                <div class="card tw-shadow p-2 mb-3">
                    <div class="d-flex align-items-center">
                        <a href="">
                            <span class="stamp stamp-md tw-shadow bg-blue mr-3">
                                <i class="fe fe-file"></i>
                            </span>
                        </a>

                        <div>
                            <h6 class="m-0">{{ $tickets->count() }} <small>Total tickets</small></h6>
                            <small class="text-muted">{{ $tickets->today()->count() }} created today</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="card tw-shadow p-2 mb-3">
                    <div class="d-flex align-items-center">
                        <a href="">
                            <span class="stamp stamp-md tw-shadow bg-blue mr-3">
                                <i class="fe fe-activity"></i>
                            </span>
                        </a>

                        <div>
                            <h6 class="m-0">{{ $tickets->assigned()->count() }} <small>Assigned tickets</small></h6>
                            <small class="text-muted">
                                @empty ($tickets->assigned())
                                    0 assigned today
                                @else
                                    {{ $tickets->today()->assigned()->count() }} assigned today
                                @endempty
                            </small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="card tw-shadow p-2 mb-3">
                    <div class="d-flex align-items-center">
                        <a href="">
                            <span class="stamp stamp-md tw-shadow bg-red mr-3">
                                <i class="fe fe-thumbs-down"></i>
                            </span>
                        </a>

                        <div>
                            <h6 class="m-0">{{ $tickets->isOpen(true)->count() }} <small>Open tickets</small></h6>
                            <small class="text-muted">{{ $tickets->isOpen(true)->today()->count() }} opened today</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="card tw-shadow p-2 mb-3">
                    <div class="d-flex align-items-center">
                        <a href="">
                            <span class="stamp stamp-md tw-shadow bg-green mr-3">
                                <i class="fe fe-thumbs-up"></i>
                            </span>
                        </a>

                        <div>
                            <h6 class="m-0">{{ $tickets->isOpen(false)->count() }} <small>Closed tickets</small></h6>
                            <small class="text-muted">{{ $tickets->isOpen(false)->today()->count() }} closed today</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-body">
            <h6 class="border-bottom border-gray pb-1 mb-3">Recent created tickets</h6>
        </div>
    </div>
@endsection