@if (isset($date) && $date)
    Added: <x-badge type="primary">
        {{ $date }}
    </x-badge>
    &nbsp;
@endif
@if (isset($name) && $name)
    By: <x-badge type="info">{{ $name }}</x-badge>
    &nbsp;
@endif
@if (isset($edited) && $edited)
    Last Edited: <x-badge type="warning">{{ $edited }}</x-badge>
@endif
