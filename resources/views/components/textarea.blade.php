@props(['name', 'wire' => false])
<link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
<script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>

<input id="{{ $name }}" type="hidden" name="{{ $name }}" {{ $attributes->merge($wire ? ['wire:model' => $name, 'value' => old($name)] : ['value' => old($name)]) }}>
<trix-editor input="{{ $name }}"></trix-editor>
