@props([
    'wow_delay' => false,
    'head' => '',
    'wow_direction' => 'Left'
])
<div {{ $attributes->class('section') }}>
    <div class="container pb-0 {{ $wow_delay ? 'wow animate__animated animate__slideIn'.$wow_direction : '' }}" {{ $wow_delay ? 'data-wow-delay='.$wow_delay.'s' : '' }}>
        @if ($head)
            <h1>{{ $head }}</h1>
        @endif
        {{ $slot }}
    </div>
</div>
