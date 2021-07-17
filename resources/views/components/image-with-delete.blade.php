@props(['loop','picture'])

<div>
    <span
        class="btn-delete-sm"
        wire:click="delete({{ $loop }})">
        delete
    </span>
    <img src="{{ $picture->temporaryUrl() }}" alt="" class="p-2 w-full">
</div>
