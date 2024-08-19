@props([
    'items' => [], 
    'groupName' => '',
    'disabled' => false,
    'canPut' => false,
    'canPull' => false
])

<Draggable
    :items='@json($items)'
    :group="{
        name: '{{ $groupName }}',
        put: {{ $canPut ? 'true' : 'false' }},
        pull: {{ $canPull ? 'true' : 'false' }}
    }"
    :disabled="{{ $disabled ? 'true' : 'false' }}"
>
    {{ $slot }}
</Draggable>