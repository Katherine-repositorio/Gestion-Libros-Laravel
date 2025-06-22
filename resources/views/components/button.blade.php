@props([
    'type' => 'primary',
    'text' => 'Botón',
    'size' => ''
])

<button {{ $attributes->merge(['class' => "btn btn-$type $size"]) }}>
    {{ $text }}
</button>
