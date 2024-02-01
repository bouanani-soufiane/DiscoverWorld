@props(["active" => false])

@php
    $classes = "block text-left px-3 py-2 text-sm leading-6 hover:bg-[#515F08] hover:text-white focus:bg-[#515F08] focus:text-white";
    if($active) $classes .= "bg-[#515F08] text-white"
@endphp

<a
    {{ $attributes([ "class" => "block text-left px-3 py-2 text-sm leading-6 hover:bg-[#515F08] hover:text-white focus:bg-[#515F08] focus:text-white" ]) }}>
    {{ $slot }}
</a>
