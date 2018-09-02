@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">Helpdesk</h1>
            <div class="page-subtitle">New support ticket</div>

            <div class="page-options d-flex">
                <a href="" class="btn btn-outline-primary">
                    <i class="fe fe-file-text mr-1"></i> My tickets
                </a>
            </div>
        </div>
    </div>

    <div class="container py-3"> {{-- Page content --}}
        <form method="POST" action class="card card-body">
            @csrf {{-- Form field protection --}}
        </form>
    </div> {{-- /// Page content --}}
@endsection