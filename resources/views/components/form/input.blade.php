@props(['name'])
<div class="mb-6">
    <x-form.lable name="{{ $name }}" />

    <input class="border border-gray-200 p-2 w-full rounded" name="{{ $name }}"
        id="{{ $name }}" value="{{ old($name) }}" {{$attributes}}  required>

    <x-form.error name="{{ $name }}" />
</div>
