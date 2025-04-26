@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('layouts.sidebar')
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h4>Welcome {{ auth()->user()->name }}</h4>

                        <div class="row mt-4">
                            @if (auth()->user()->hasRole('admin'))
                                <div class="col-md-3 mb-3">
                                    <div class="card bg-primary text-white">
                                        <div class="card-body text-center">
                                            <h5>Users</h5>
                                            <h2>{{ $stats['users'] }}</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card bg-success text-white">
                                        <div class="card-body text-center">
                                            <h5>Roles</h5>
                                            <h2>{{ $stats['roles'] }}</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card bg-info text-white">
                                        <div class="card-body text-center">
                                            <h5>Permissions</h5>
                                            <h2>{{ $stats['permissions'] }}</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card bg-danger text-white">
                                        <div class="card-body text-center">
                                            <h5>Messages</h5>
                                            <h2>{{ $stats['messages'] }}</h2>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="col-md-6 mb-3">
                                    <div class="card bg-primary text-white">
                                        <div class="card-body text-center">
                                            <h5>Sent Messages</h5>
                                            <h2>{{ $stats['sent_messages'] }}</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="card bg-success text-white">
                                        <div class="card-body text-center">
                                            <h5>Received Messages</h5>
                                            <h2>{{ $stats['received_messages'] }}</h2>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
