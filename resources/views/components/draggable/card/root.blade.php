@props(['key', 'title', 'content'])

<Card
    :key="{{ $key }}"
    :title="'{{ $title }}'"
    :content="'{{ $content }}'"
></Card>
