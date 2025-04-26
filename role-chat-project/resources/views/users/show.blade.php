@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('layouts.sidebar')
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <span>User Detail</span>
                            <div>
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{ route('users.index') }}" class="btn btn-secondary btn-sm">Back</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th style="width: 200px;">ID</th>
                                <td>{{ $user->id }}</td>
                            </tr>
                            <tr>
                                <th>Fullname</th>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <th>E-mail</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th>Roles</th>
                                <td>
                                    @foreach ($user->roles as $role)
                                        <span class="badge text-bg-secondary">{{ $role->name }}</span>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th>Permissions</th>
                                <td>
                                    @foreach ($user->getAllPermissions() as $permission)
                                        <span class="badge badge-secondary">{{ $permission->name }}</span>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th>Created Date</th>
                                <td>{{ $user->created_at->format('d.m.Y H:i') }}</td>
                            </tr>
                            <tr>
                                <th>Updated Date</th>
                                <td>{{ $user->updated_at->format('d.m.Y H:i') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
