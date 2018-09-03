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

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputTitle">Title <span class="tw-text-red">*</span></label>
                            <input type="text" class="form-control @error('title', 'is-invalid')" id="inputTitle" placeholder="A brief of your issue ticket">
                            @error('title')
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputCategories">Category <span class="tw-text-red">*</span></label>

                            <select @input('category') id="inputCategories" class="form-control @error('category', 'is-invalid')">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @if (old('category') === $category->name) selected @endif>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>

                            @error('category')
                        </div>
                    </div>

                    @if (auth()->user()->hasRole('admin')) {{-- Admin options --}}
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputPriority">Priority <span class="tw-text-red">*</span></label>

                                <select @input('priority') id="inputPriority"></select>
                            </div>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="contentArea">Description <span class="tw-text-red">*</span></label>
                        <textarea id="contentArea" @input('content') class="@error('title', 'is-invalid')" placeholder="Describe where u need support."></textarea>
                        @error('content')
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