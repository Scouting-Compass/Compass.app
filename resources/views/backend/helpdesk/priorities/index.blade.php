@extends('layouts.app')

@section('content')
    @include ('backend.helpdesk.partials.page-header', ['title' => 'Helpdesk', 'subTitle' => 'Priority configuration'])

    <div class="container py-3">
        <div class="row">
            <div class="col-md-3">
                @include ('backend.helpdesk.partials.config-sidenav')
            </div>

            <div class="col-md-9">
                <div class="card card-body">
                    <h6 class="border-bottom border-gray pb-1 mb-3">
                        Helpdesk priorities
                        <small class="float-right"><a href="{{ route('helpdesk.priorities.create') }}">Create Priority</a></small>
                    </h6>

                    <div class="table-responsive">
                        <table class="table table-sm @if (count($priorities) > 0) table-hover @endif">
                            <thead>
                                <tr>
                                    <th scope="col" class="border-top-0">#</th>
                                    <th scope="col" class="border-top-0">Creator</th>
                                    <th scope="col" class="border-top-0">Name</th>
                                    <th scope="col" class="border-top-0">Type</th>
                                    <th scope="col" class="border-top-0">Created at</th>
    
                                    <th scope="col" class="border-top-0">&nbsp;</th> {{-- Table header for the functions --}}
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($priorities as $priority) {{-- There are helpdesk priorities --}}
                                @empty {{-- No helpdesk priorities are found --}}
                                    <tr>
                                        <td colspan="6"><i><small class="text-muted">No priorities found for the helpdesk.</small></i></td>
                                    </tr>
                                @endforelse {{-- End priority loop --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection