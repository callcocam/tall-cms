@props(['name','style'=>'outline'])
<x-dynamic-component component="tall-icons.{{ $style }}.{{ $name }}" {{ $attributes->class('h-5 w-5') }} />