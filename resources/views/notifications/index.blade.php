@extends('master')
@section('title', 'Notifications - CutlerTech')
@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1>Notifications</h1>
                @if(auth()->user()->unreadNotifications->count() > 0 || $notifications->count() > 0)
                    <div>
                        @if(auth()->user()->unreadNotifications->count() > 0)
                            <span class="badge badge-primary mr-2">{{auth()->user()->unreadNotifications->count()}} unread</span>
                            <a href="{{route('notifications.mark-all-read')}}" class="btn btn-sm btn-outline-primary mr-2">Mark All as Read</a>
                        @endif
                        @if($notifications->count() > 0)
                            <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#deleteAllModal">
                                <i class="fas fa-trash">Delete All</i>
                            </button>
                        @endif
                    </div>
                @endif
            </div>
            
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                </div>
            @endif
            
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                </div>
            @endif

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
                                        <button type="button" class="btn btn-sm btn-outline-danger ml-1" onclick="confirmDelete('{{$notification->id}}')">
                                            <i class="fas fa-trash">Delete</i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-center mt-4">{{$notifications->links()}}</div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-bell fa-3x text-muted mb-3"></i>
                    <h3 class="text-muted">No notifications yet</h3>
                    <p class="text-muted">When new requests come in, you'll see them here.</p>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Delete Single Notification Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Notification</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this notification? This action cannot be undone.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <form id="deleteForm" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete All Notifications Modal -->
<div class="modal fade" id="deleteAllModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete All Notifications</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete all notifications? This action cannot be undone.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <form method="POST" action="{{route('notifications.delete-all')}}" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete All</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function confirmDelete(notificationId) {
    const deleteForm = document.getElementById('deleteForm');
    deleteForm.action = '/notifications/' + notificationId;
    $('#deleteModal').modal('show');
}
</script>

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