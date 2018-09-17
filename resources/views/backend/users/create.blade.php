@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">Users</h1>
            <div class="page-subtitle">Create new user</div>

            <div class="page-options d-flex">
                <a href="{{ route('users.index') }}" class="btn btn-outline-primary">
                    <i class="fe fe-users mr-1"></i> Users overview
                </a>
            </div>
        </div>
    </div>

    <div class="container py-3">
        <form method="POST" action="{{ route('users.store') }}" class="card card-body">
            @csrf {{-- Form field protection --}}
            @include('flash::message') {{-- Flash session view partial --}}

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="labelName">Username <span class="tw-text-red">*</span></label>
                    <input type="text" @input('name') class="form-control @error('name', 'is-invalid')" id="inputName" placeholder="The username for the account">
                    @error('name')
                </div>

                <div class="form-group col-md-12">
                    <label for="labelEmail">E-mail address <span class="tw-text-red">*</span></label>
                    <input type="text" @input('email') class="form-control @error('email', 'is-invalid')" id="labelEmail" placeholder="Email address from the user.">
                    @error('email')
                </div>
            </div>

            <div class="form-group">
                <label for="labelRole">Permission role <span class="tw-text-red">*</span></label>
                
                <select class="form-control @error('role', 'is-invalid')" @input('role')>
                    @options($roles, 'role')
                </select>

                @error('role')
            </div>

            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" @checkbox('email_verified_at')>
                    <label class="form-check-label" for="defaultCheck1">
                        User needs to verify his account
                    </label>
                </div>
            </div>

            <hr class="mt-0 border-grey">

            <div class="form-group mb-0">
                <button class="btn btn-success rounded" type="submit">Submit</button>
                <button class="btn btn-light rounded" type="reset">Reset</button>
            </div>
        </form>
    </div>
@endsection