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
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action class="card card-body">
                    @csrf {{-- Form field protection --}}
                    @include('flash::message') {{-- Flash session view partial --}}

                    <div class="form-group">
                        <label for="inputTitle">Title <span class="tw-text-red">*</span></label>
                        <input type="text" class="form-control @error('title', 'is-invalid')" id="inputTitle" placeholder="A brief of your issue ticket">
                        @error('title')
                    </div>

                    <hr class="mt-0 border-grey">

                    <div class="form-group mb-0">
                        <button class="btn btn-success rounded" type="submit">Submit</button>
                        <button class="btn btn-link rounded" type="reset">Reset</button>
                    </div>

                </form>
            </div> {{-- /// Page content --}}
        </div>
    </div>
@endsection