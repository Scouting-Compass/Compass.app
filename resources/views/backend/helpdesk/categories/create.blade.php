@extends('layouts.app')

@section('content')
    @include ('backend.helpdesk.partials.page-header', ['title' => 'Helpdesk', 'subTitle' => 'New helpdesk category'])

    <div class="container py-3">
        <div class="row">
            <div class="col-md-3">
                @include ('backend.helpdesk.partials.config-sidenav')
            </div>

            <div class="col-md-9">
                <form method="POST" action="{{ route('helpdesk.categories.store') }}" class="card card-body">
                    @csrf {{-- Form field protection --}}

                    <h6 class="border-bottom border-gray pb-1 mb-3">
                        Add new helpdesk category
                        <small class="float-right"><a href="{{ route('helpdesk.categories.index') }}">Category overview</a></small>
                    </h6>

                    @include('flash::message') {{-- Flash session view partial --}}

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputName">Category name <span class="tw-text-red">*</span></label>
                            <input type="text" class="form-control @error('name', 'is-invalid')" id="inputName" placeholder="Category name" @input('name')>
                            @error('name')
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputColor">Category color <span class="tw-text-red">*</span></label>
                            <input type="color" class="form-control @error('color', 'is-invalid')" id="inputColor" @input('color') placeholder="HEX value only supported">
                            @error('color')
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputType">Category type <span class="tw-text-red">*</span></label>

                        <select class="form-control @error('type', 'has-error')" id="inputType" @input('type')>
                            @options($types, 'type', 'draft')
                        </select>

                        @error('type')
                    </div>

                    <hr class="mt-0 border-grey">

                    <div class="form-group mb-0">
                        <button class="btn btn-success rounded" type="submit">Create</button>
                        <a href="{{ route('helpdesk.categories.index') }}" class="btn btn-link">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection