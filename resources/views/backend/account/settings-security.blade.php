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

                <form class="card card-body tw-shadow" action="{{ route('profile.settings.security') }}" method="POST">
                    @csrf                   {{-- Form fied protection --}}
                    @method('PATCH')        {{-- HTTP method spoofing --}}

                    <h6 class="border-bottom border-gray pb-1 mb-3">Account security</h6>

                    <div class="form-group">
                        <label for="inputPassword">New password <span class="tw-text-red">*</span></label>
                        <input type="password" class="form-control @error('password', 'is-invalid')" placeholder="Your new password" @input('password')>
                        @error('password')
                    </div>

                    <div class="form-group">
                        <label for="passwordConfirmation">Repeat password <span class="tw-text-red">*</span></label>
                        <input type="password" class="form-control" placeholder="Repeat password" @input('password_confirmation')>
                    </div>

                    <hr class="mt-0 border-grey">

                    <div class="form-group mb-0">
                        <button type="submit" class="btn btn-success rounded">Update password</button>
                        <button type="reset" class="btn btn-link rounded">Reset</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection