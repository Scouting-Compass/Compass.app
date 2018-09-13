@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">Notifications</h1>
        </div>
    </div>

    <div class="container py-3">
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <a href="" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        Unread notifications <span class="badge-pill badge badge-primary">{{ $notificationCounter }}</span>
                    </a>
                    
                    <a href="" class="list-group-item list-group-item-action">
                        All notifications
                    </a>
                </div>
            </div>

            <div class="col-md-9">
                @if ($notificationCounter > 0)
                    <div class="card card-body">
                        <h6 class="border-bottom border-gray pb-1 mb-3">
                            @if ($type === 'read')
                                All notications
                            @else 
                                Unread notifications
                                <small class="float-right"><a href="">Read all</a></small>
                            @endif
                        </h6>

                        @foreach ($notifications as $notification) {{-- Notification loop --}}
                            <div class="media text-muted pt-0">
                                <img data-src="holder.js/32x32?theme=thumb&amp;bg=007bff&amp;fg=007bff&amp;size=1" alt="32x32" class="mr-2 rounded" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2232%22%20height%3D%2232%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2032%2032%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_165d3c6a309%20text%20%7B%20fill%3A%23007bff%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A2pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_165d3c6a309%22%3E%3Crect%20width%3D%2232%22%20height%3D%2232%22%20fill%3D%22%23007bff%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2212.5234375%22%20y%3D%2216.8390625%22%3E32x32%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="width: 32px; height: 32px;">
                                
                                <p class="media-body pb-1 mb-0 small lh-125 border-bottom border-gray">
                                    <span class="d-block text-gray-dark">
                                        <strong>Tim Joosten - A day ago </strong>
                                        <a href="" class="no-underline text-grey-dark float-right"><i class="fe fe-eye"></i> Read</a>
                                    </span>
                                    
                                    Heeft gereageerd op een helpdesk ticket
                                </p>
                            </div>
                        @endforeach {{-- /// End notifications loop --}}

                    </div>
                @else {{-- User has no notifications --}}
                    <div class="blankslate tw-shadow">
                        <h3>No notifications</h3>
                        <p>
                            @if ($type === 'read')
                                Looks like that we currently have no notifications for u!
                            @else 
                                Looks like that you've read all your notifications.
                            @endif
                        </p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection