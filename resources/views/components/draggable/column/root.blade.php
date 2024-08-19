@props(['title'])

<Column 
    :title="`{{ $title }}`"
>
    {{ $slot }}
</Column>
