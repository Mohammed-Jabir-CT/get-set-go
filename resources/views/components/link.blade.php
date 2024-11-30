@props(['text', 'href' => '#', 'target' => false])

<a href="{{ $href }}" target="{{ $target ? '_blank' : '' }}" class="link text-xs">{{ $text }}</a>
