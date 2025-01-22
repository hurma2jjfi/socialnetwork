@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>Welcome, {{ Auth::user()->name }}!</h1>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="card-header">Quick Actions</div>
                                <div class="card-body">
                                    <a href="{{ route('profile') }}" class="btn btn-primary mb-2 w-100">
                                        View Profile
                                    </a>
                                    <a href="{{ route('channels.index') }}" class="btn btn-secondary mb-2 w-100">
                                        My Channels
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">Recent Activity</div>
                                <div class="card-body">
                                    @if(Auth::user()->recent_activities)
                                        <ul class="list-unstyled">
                                            @foreach(Auth::user()->recent_activities as $activity)
                                                <li>{{ $activity->description }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p>No recent activities</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-header">Account Statistics</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <strong>Joined:</strong> 
                                    {{ Auth::user()->created_at->format('d M Y') }}
                                </div>
                                <div class="col-md-4">
                                    <strong>Channels:</strong> 
                                    {{ Auth::user()->channels->count() }}
                                </div>
                                <div class="col-md-4">
                                    <strong>Last Login:</strong> 
                                    {{ Auth::user()->last_login_at?->diffForHumans() ?? 'First Login' }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
