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
                            <span>Role Detail</span>
                            <div>
                                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{ route('roles.index') }}" class="btn btn-secondary btn-sm">Back</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th style="width: 200px;">ID</th>
                                <td>{{ $role->id }}</td>
                            </tr>
                            <tr>
                                <th>Role Name</th>
                                <td>{{ $role->name }}</td>
                            </tr>
                            <tr>
                                <th>Permissions</th>
                                <td>
                                    @if ($role->permissions->count() > 0)
                                        @foreach ($role->permissions as $permission)
                                            <span class="badge text-bg-secondary">{{ $permission->name }}</span>
                                        @endforeach
                                    @else
                                        <span class="badge badge-warning">No Permission</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Created Date</th>
                                <td>{{ $role->created_at->format('d.m.Y H:i') }}</td>
                            </tr>
                            <tr>
                                <th>Updated Date</th>
                                <td>{{ $role->updated_at->format('d.m.Y H:i') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
