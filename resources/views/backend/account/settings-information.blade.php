@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">Account settings</h1>
        </div>
    </div>

    <div class="container py-3">
        <div class="row">
            <div class="col-md-3">
                @include ('backend.account.partials.sidenav')
            </div>

            <div class="col-md-9">

                <form class="card card-body tw-shadow" action="{{ route('profile.settings.info') }}" method="POST">
                    @csrf                   {{-- Form fied protection --}}
                    @form(Auth::user())     {{-- Bind data to the view. --}}
                    @method('PATCH')        {{-- HTTP method spoofing --}}

                    <h6 class="border-bottom border-gray pb-1 mb-3">Account information</h6>

                    <div class="form-group">
                        <label for="inputName">Your name <span class="tw-text-red">*</span></label>
                        <input type="text" class="form-control @error('name', 'is-invalid')" id="inputName" placeholder="Enter name" @input('name')>
                        @error('name')
                    </div>

                    <div class="form-group">
                        <label for="inputEmail">Email address <span class="tw-text-red">*</label>
                        <input type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp" placeholder="Enter email" @input('email')>
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>

                    <hr class="mt-0 border-grey">

                    <div class="form-group mb-0">
                        <button type="submit" class="btn btn-success rounded">Update profile</button>
                        <button type="reset" class="btn btn-link rounded">Reset</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection