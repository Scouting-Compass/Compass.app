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
                <token-create-form></token-create-form>
                <token-listing></token-listing>
            </div>
        </div>
    </div>
@endsection