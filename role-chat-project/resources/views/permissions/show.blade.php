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
                            <span>Permission Detail</span>
                            <div>
                                <a href="{{ route('permissions.edit', $permission->id) }}"
                                    class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{ route('permissions.index') }}" class="btn btn-secondary btn-sm">Back</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th style="width: 200px;">ID</th>
                                <td>{{ $permission->id }}</td>
                            </tr>
                            <tr>
                                <th>Permission Name</th>
                                <td>{{ $permission->name }}</td>
                            </tr>
                            <tr>
                                <th>Created Date</th>
                                <td>{{ $permission->created_at->format('d.m.Y H:i') }}</td>
                            </tr>
                            <tr>
                                <th>Updated Date</th>
                                <td>{{ $permission->updated_at->format('d.m.Y H:i') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
