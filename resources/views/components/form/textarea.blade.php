@props(['name'])
<div class="mb-6">
    <x-form.lable name="{{ $name }}" />

    <textarea class="border border-gray-400 p-2 w-full" name="{{ $name }}" id="{{ $name }}" required>{{ $slot ?? old($name) }}</textarea>

    <x-form.error name="{{ $name }}" />
</div>
