<div x-data="{ isUploading: false, progress: 0, error: false }"
    x-on:livewire-upload-start="isUploading = true"
    x-on:livewire-upload-finish="isUploading = false" x-on:livewire-upload-error="isUploading = false"
    x-on:livewire-upload-error="error = true" x-on:livewire-upload-progress="progress = $event.detail.progress">
    {{ $slot }}
</div>
