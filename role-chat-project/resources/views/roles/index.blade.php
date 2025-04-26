@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('layouts.sidebar')
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>Roles</span>
                        <a href="{{ route('roles.create') }}" class="btn btn-primary btn-sm">Create New Role</a>
                    </div>

                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Permissions</th>
                                    <th>Operations</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    <tr>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            @if ($role->permissions->count() > 0)
                                                <span class="badge text-bg-secondary">{{ $role->permissions->count() }}
                                                    izin</span>
                                            @else
                                                <span class="badge badge-warning">No Permission</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('roles.show', $role->id) }}"
                                                class="btn btn-sm btn-info">Show</a>
                                            <a href="{{ route('roles.edit', $role->id) }}"
                                                class="btn btn-sm btn-primary">Edit</a>
                                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure to delete the role?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
