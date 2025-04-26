@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('layouts.sidebar')
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Tüm Mesajlar</div>

                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Sender</th>
                                    <th>Receiver</th>
                                    <th>Message</th>
                                    <th>Date</th>
                                    <th>Processes</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($messages as $message)
                                    <tr>
                                        <td>{{ $message->sender->name }}</td>
                                        <td>{{ $message->receiver->name }}</td>
                                        <td>{{ $message->message }}</td>
                                        <td>{{ $message->created_at->format('d.m.Y H:i') }}</td>
                                        <td>
                                            <form action="{{ route('chat.destroy', $message->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-center">
                            {{ $messages->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
