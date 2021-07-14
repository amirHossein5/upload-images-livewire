@props(['loop','picture'])

<div>
    <span
        class="btn-delete-sm"
        wire:click="delete({{ $loop }})">
        delete
    </span>
    <img src="{{ $picture }}" alt="" class="p-2 w-full">
</div>
