<section class="w-1/2 mx-auto">
    <span>should be fewer than 20 images</span>
    <form wire:submit.prevent="save" class="text-white">
        <div x-data="{ isUploading: false, progress: 0, error: false }" x-on:livewire-upload-start="isUploading = true"
            x-on:livewire-upload-finish="isUploading = false" x-on:livewire-upload-error="isUploading = false"
            x-on:livewire-upload-error="error = true" x-on:livewire-upload-progress="progress = $event.detail.progress">

            {{-- on loading --}}
            <span wire:loading.flex
                class="justify-center items-center p-4 bg-gray-600 opacity-25 rounded-md">wait......</span>
            <div class="block rounded-md" x-show="isUploading">
                <div class="bg-green-500 rounded-md text-center" x-bind:style="`width: ${progress}%`"
                    x-text="`${progress}%`"></div>
            </div>
            <span wire:loading.remove class="flex justify-center items-center p-4 bg-gray-600 cursor-pointer rounded-md"
                x-on:click="$refs.file.click()">uplaod pictures</span>
            {{-- end on loading --}}

            <div>
                <input x-ref="file" type="file" class="hidden" wire:model="pictures" x-on:change="$event.target.files.length < 20 && $event.target.files.length > 0
                ? null
                : validationImages($event)" multiple>
            </div>

            @if (count($pictures) > 0 and count($errors) === 0)
                <span>{{ count($pictures) }}</span>
            @endif
            @error('pictures.*')
                <div class="text-red-500">{{ $message }}</div>
            @enderror

            <div class="flex flex-wrap -mx-2">
                @if ($pictures and count($errors) === 0)
                    @foreach ($pictures as $picture)
                        <div class="relative w-full md:w-1/2 lg:w-1/3" wire:key='{{ $loop->index }}'>
                            <span class="absolute right-44-p top-44-p rounded-md bg-gray-600 p-2 cursor-pointer"
                                wire:click="delete({{ $loop->index }})">delete</span>
                            <img src="{{ $picture->temporaryUrl() }}" alt="" class="p-2 w-full">
                        </div>
                    @endforeach
                @endif
            </div>

            @if ($pictures and count($errors) === 0)
                <input wire:loading.remove type="submit" value="save"
                    class="flex justify-center w-full items-center p-4 bg-gray-600 cursor-pointer rounded-md">
                <input wire:loading.remove x-on:click="$wire.set('pictures',[])" type="button" value="delete all"
                    class="mt-4 flex justify-center w-full items-center p-4 bg-gray-600 cursor-pointer rounded-md">
                <input wire:loading.flex wire:target='save' type="submit" value="saving...."
                    class="justify-center w-full items-center p-4 bg-gray-600 opacity-25 rounded-md">
            @endif

        </div>
    </form>

    {{-- sweet alert --}}
    @if (session()->has('succses'))
        <script>
            Swal.fire({
                title: @php echo json_encode(session('succses')) @endphp + '!',
                icon: 'success',
            })
        </script>
    @endif
    @if (session()->has('fail'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: @php echo json_encode(session('fail')) @endphp,
            })
        </script>
    @endif

    {{-- validation number of images --}}
    <script>
        function validationImages($event) {
            $event.target.value = null;
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'should be fewer than 20 images!',
            })
            setTimeout(() => {
                window.location.reload();
            }, 500);
        }
    </script>
</section>
