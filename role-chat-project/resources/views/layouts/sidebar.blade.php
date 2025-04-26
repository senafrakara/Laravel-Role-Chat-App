<div class="list-group">
    <a href="{{ route('home') }}"
        class="list-group-item list-group-item-action {{ request()->is('home') ? 'active' : '' }}">
        Home
    </a>
    <a href="{{ route('chat.index') }}"
        class="list-group-item list-group-item-action {{ request()->is('chat') ? 'active' : '' }}">
        Messages
    </a>

    @if (auth()->user()->hasRole('admin'))
        <div class="my-3">
            <a href="{{ route('users.index') }}"
                class="list-group-item list-group-item-action {{ request()->is('users*') ? 'active' : '' }}">
                Users
            </a>
            <a href="{{ route('roles.index') }}"
                class="list-group-item list-group-item-action {{ request()->is('roles*') ? 'active' : '' }}">
                Roles
            </a>
            <a href="{{ route('permissions.index') }}"
                class="list-group-item list-group-item-action {{ request()->is('permissions*') ? 'active' : '' }}">
                Permissions
            </a>
            <a href="{{ route('chat.all') }}"
                class="list-group-item list-group-item-action {{ request()->is('chat/all') ? 'active' : '' }}">
                All Messages
            </a>
        </div>
    @endif
</div>
