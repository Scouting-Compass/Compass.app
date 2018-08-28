@extends('layouts.app')

@section('content')
    @include ('backend.helpdesk.partials.page-header', ['title' => 'Helpdesk', 'subTitle' => 'Category configuration'])

    <div class="container py-3">
        <div class="row">
            <div class="col-md-3">
                @include ('backend.helpdesk.partials.config-sidenav')
            </div>

            <div class="col-md-9">
                <div class="card card-body">
                    <h6 class="border-bottom border-gray pb-1 mb-3">
                        Helpdesk categories
                        <small class="float-right"><a href="{{ route('helpdesk.categories.create') }}">Create category</a></small>
                    </h6>

                    <div class="table-responsive">
                        <table class="table table-sm @if (count($categories) > 0) table-hover @endif">
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
                                @forelse ($categories as $category) {{-- Loop through the categories --}}
                                    <tr>
                                        <td><strong>#{{ $category->id }}</strong></td>
                                        <td>{{ $category->creator->name }}</td>
                                        <td><span style="color: {{ $category->color }};">{{ $category->name }}</span></td>
                                        <td>{{ $category->type }}</td>
                                        <td>{{ $category->created_at->diffForHumans() }}</td>

                                        <td> {{-- Options --}}
                                            <span class="pull-right">
                                                <a href="{{ route('helpdesk.categories.edit', $category) }}" class="tw-text-grey no-underline">
                                                    <i class="fe fe-edit mr-1"></i>
                                                </a>

                                                <a href="" class="text-danger no-underline">
                                                    <i class="fe fe-x-circle"></i>
                                                </a>
                                            </span>
                                        </td> {{-- // Options --}}
                                    </tr>
                                @empty {{-- No categories are found --}}
                                    <tr>
                                        <td colspan="6"><i><small class="text-muted">No categories found for the helpdesk.</small></i></td>
                                    </tr>
                                @endforelse {{-- END category loop --}}
                            </tbody>
                        </table>
                    </div>

                    {{ $categories->links() }} {{-- Pagination view instance --}}
                </div>
            </div>
        </div>
    </div>
@endsection