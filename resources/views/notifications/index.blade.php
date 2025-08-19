@extends('master')
@section('title', 'Notifications - CutlerTech')
@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1>Notifications</h1>
                @if(auth()->user()->unreadNotifications->count() > 0)
                    <div>
                        <span class="badge badge-primary mr-2">{{auth()->user()->unreadNotifications->count()}} unread</span>
                        <a href="{{route('notifications.mark-all-read')}}" class="btn btn-sm btn-outline-primary">Mark All as Read</a>
                    </div>
                @endif
            </div>
            @if($notifications->count() > 0)
                <div class="list-group">
                    @foreach($notifications as $notification)
                        <div class="list-group-item {{$notification->read_at ? 'list-group-item-light' : 'list-group-item-info'}}">
                            <div class="d-flex w-100 justify-content-between">
                                <div class="flex-grow-1">
                                    <h5 class="mb-1">
                                        @if($notification->data['type'] === 'new_project_request')
                                            <i class="fas fa-briefcase">New Project Request Submitted</i>
                                        @else
                                            <i class="fas fa-envelope">New Request</i>
                                        @endif
                                        @if(!$notification->read_at)
                                            <span class="badge badge-primary badge-sm ml-2">New</span>
                                        @endif
                                    </h5>
                                    <p class="mb-1">{{ $notification->data['message'] }}</p>
                                    @if($notification->data['type'] === 'new_project_request')
                                        <div class="small text-muted mt-2">
                                            <strong>Client:</strong> {{$notification->data['client_name']}} ({{$notification->data['client_email']}})<br>
                                            @if(isset($notification->data['company_name']) && $notification->data['company_name'])
                                                <strong>Company:</strong> {{$notification->data['company_name']}}<br>
                                            @endif
                                            <strong>Goal:</strong> {{$notification->data['project_goal']}}
                                            @if(strlen($notification->data['project_goal']) >= 150)...@endif
                                        </div>
                                    @endif
                                </div>
                                <div class="ml-3">
                                    <small class="text-muted">{{$notification->created_at->diffForHumans()}}</small>
                                    <div class="mt-2">
                                        @if(isset($notification->data['action_url']))
                                            <a href="{{$notification->data['action_url']}}" class="btn btn-sm btn-primary">View Details</a>
                                        @endif
                                        @if(!$notification->read_at)
                                            <a href="{{route('notifications.mark-read', $notification->id)}}" class="btn btn-sm btn-outline-secondary ml-1">Mark as Read</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-center mt-4">{{$notifications->links()}}</div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-bell fa-3x text-muted mb-3">🔔</i>
                    <h3 class="text-muted">No notifications yet</h3>
                    <p class="text-muted">When new requests come in, you'll see them here.</p>
                </div>
            @endif
        </div>
    </div>
</div>
<style>
    .list-group-item-info {
        background-color: #e3f2fd;
        border-color: #2196f3;
    }
    .badge-sm {
        font-size: 0.7em;
    }
    .notification-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
    }
    .notification-new {
        background-color: #007bff;
        color: white;
    }
    .notification-read {
        background-color: #6c757d;
        color: white;
    }
</style>
@endsection