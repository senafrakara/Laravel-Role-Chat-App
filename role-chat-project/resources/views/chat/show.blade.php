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
                        Chat with {{ $chatUser->name }}
                    </div>

                    <div class="card-body" id="chat-messages" style="height: 400px; overflow-y: scroll;">
                        @foreach ($messages as $message)
                            <div
                                class="mb-3 d-flex {{ $message->sender_id == auth()->id() ? 'justify-content-end' : 'justify-content-start' }}">
                                <div class="card {{ $message->sender_id == auth()->id() ? 'bg-primary text-white' : 'bg-light' }}"
                                    style="max-width: 70%;">
                                    <div class="card-body py-2 px-3">
                                        <p class="mb-0">{{ $message->message }}</p>
                                        <small class="text-{{ $message->sender_id == auth()->id() ? 'light' : 'muted' }}">
                                            {{ $message->created_at->format('H:i') }}
                                            @if (auth()->user()->hasRole('admin') || auth()->id() === $message->sender_id)
                                                <form action="{{ route('chat.destroy', $message->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-sm btn-link p-0 text-{{ $message->sender_id == auth()->id() ? 'light' : 'danger' }}">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        </small>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="card-footer ml-4">
                        <form action="{{ route('chat.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="receiver_id" value="{{ $chatUser->id }}">
                            <div class="input-group">
                                <input type="text" name="message" class="form-control" placeholder="Mesajınızı yazın..."
                                    required>
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const chatMessages = document.getElementById('chat-messages');
            chatMessages.scrollTop = chatMessages.scrollHeight;
        });
    </script>
@endsection
