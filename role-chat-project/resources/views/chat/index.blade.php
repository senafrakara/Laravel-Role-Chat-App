@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('layouts.sidebar')
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Message List</div>

                    <div class="card-body">
                        <div class="list-group">
                            @foreach ($users as $user)
                                <a href="{{ route('chat.show', $user->id) }}" class="list-group-item list-group-item-action">
                                    {{ $user->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
