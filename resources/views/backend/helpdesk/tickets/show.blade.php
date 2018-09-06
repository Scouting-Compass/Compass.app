@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">Helpdesk ticket</h1>

            <div class="page-options d-flex">
                <a href="" class="btn btn-outline-primary">
                    <i class="fe fe-file-text mr-1"></i> My tickets
                </a>
            </div>
        </div>
    </div>

    <div class="container py-3">
        <div class="row">
            <div class="col-md-8"> {{-- ticket content --}}
                <div class="card card-body">
                    <h6 class="border-bottom border-gray pb-1 mb-3">
                        {{ ucfirst($ticket->title) }}
                        <span class="float-right"><strong><code>#{{ $ticket->id }}</code></strong></span>
                    </h6>

                    {{ ucfirst($ticket->content) }}
                </div>

                <hr class="mt-2 mb-2">

                <form action="" class="card card-body" method="POST"> {{-- Comment form --}}
                    @csrf {{-- Form field protection --}}

                    <div class="media">
                        <img class="mr-3 rounded tw-shadow" src="{{ Avatar::create(auth()->user()->name)->toBase64() }}" alt="{{ auth()->user()->name }}">
                        <div class="media-body">
                            <div class="form-group">
                                <textarea @input('comment') placeholder="Leave a comment" rows="5" class="form-control @error('comment', 'is-invalid')"></textarea>
                                @error('comment')
                            </div>

                            <div class="form-group mb-0">
                                <button type="submit" class="rounded btn btn-light">Close ticket</button>
                                <button type="submit" class="rounded btn btn-success" value="delete">Comment</button>
                            </div>
                        </div>
                    </div>
                </form> {{-- /// Comment form --}}
            </div> {{-- // Ticket content --}}

            <div class="col-md-4"> {{-- Sidebar --}}
                <div class="card p-2 card-body">
                    <table class="table mb-0 table-hover table-sm">
                        <thead>
                            <tr>
                                <th class="border-top-0">&nbsp;</th>
                                <th class="border-top-0">
                                    <span class="tw-text-grey-darker float-right">Ticket information</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Creator:</strong></td>
                                <td><span class="float-right">{{ $ticket->creator->name }}</span></td>
                            </tr>
                            <tr>
                                <td><strong>Assigned to:</strong></td>
                                <td><span class="float-right">{{ $ticket->assigned->name }}</span></td>
                            </tr>
                            <tr>
                                <td><strong>Category</strong></td>
                                <td><span class="float-right" style="{{ $ticket->category->color }}">{{ $ticket->category->name }}</span></td>
                            </tr>
                            <tr>
                                <td><strong>Priority</strong></td>
                                <td><span class="float-right">{{ $ticket->priority->name }}</span></td>
                            </tr>
                            <tr>
                                <td><strong>Created at:</strong></td>
                                <td><span class="float-right">{{ $ticket->created_at->diffForHumans() }}</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div> {{-- /// Information sidebar --}}
        </div>
    </div>
@endsection