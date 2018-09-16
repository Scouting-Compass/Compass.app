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

                @if (count($comments) > 0)
                    <hr class="mt-2 mb-2">

                    <div class="card card-body mt-2">
                        @foreach ($comments as $comment) 
                            <div class="media text-muted pt-0">
                                <img src="{{ Avatar::create($comment->commentator->name)->toBase64() }}" alt="{{ $comment->commentator->name }}" class="mr-2 rounded" style="width: 32px; height: 32px;">
                                
                                <p class="media-body pb-1 mb-2 small lh-125 border-bottom border-gray">
                                    <span class="d-block text-gray-dark">
                                        <strong>{{ $comment->commentator->name }} replied {{ $comment->created_at->diffForHumans() }} </strong>
                                    
                                        @can ('destroy', $comment) {{-- User needs to be the author from the comment. --}}
                                            <span class="float-right">
                                                <a href="{{ route('comment.delete', $comment) }}" class="text-danger">
                                                    <i class="fe fe-trash-2"></i>
                                                </a>
                                            </span>
                                        @endcan 
                                    </span>
                                    
                                    {{ $comment->comment }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                @endif

                <hr class="mt-2 mb-2">

                <form action="{{ route('helpdesk.ticket.comment', $ticket) }}" class="card card-body" id="comment" method="POST"> {{-- Comment form --}}
                    @csrf {{-- Form field protection --}}

                    <div class="media">
                        <img class="mr-3 rounded tw-shadow" src="{{ Avatar::create(auth()->user()->name)->toBase64() }}" alt="{{ auth()->user()->name }}">
                        <div class="media-body">
                            <div class="form-group">
                                <textarea @input('comment') placeholder="Leave a comment" rows="5" class="form-control @error('comment', 'is-invalid')"></textarea>
                                @error('comment')
                            </div>

                            <div class="form-group mb-0">
                                <a href="" class="rounded btn light">Close ticket</a>
                                <button type="submit" form="comment" class="rounded btn btn-success">Comment</button>
                            </div>
                        </div>
                    </div>
                </form> {{-- /// Comment form --}}
            </div> {{-- // Ticket content --}}

            <div class="col-md-4"> {{-- Sidebar --}}
                <div class="card p-2 card-body">
                    <table class="table table-borderless mb-0 table-hover table-sm">
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