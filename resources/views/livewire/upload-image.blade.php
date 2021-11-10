<section class="w-1/2 pt-3 mx-auto">
    <form wire:submit.prevent="save" class="text-white">
        <x-upload-with-options>

            {{-- upload pictures button --}}
            <span
                wire:loading.flex
                class="rounded-md opacity-25 btn">
                wait......
            </span>
            <span
                wire:loading.remove
                class="flex rounded-md cursor-pointer btn"
                x-on:click="$refs.photo.click()">
                uplaod pictures
            </span>
            {{-- upload pictures button --}}

            <div class="block rounded-md" x-show="isUploading">
                <x-progress/>
            </div>
            <div>
                <x-file-input/>
            </div>

            {{-- number of images --}}
            @if (count($pictures) > 0 and count($errors) === 0)
                <span>{{ count($pictures) }}</span>
            @endif
            @error('pictures.*')
                <div class="text-red-500">{{ $message }}</div>
            @enderror

            {{-- images --}}
            <div class="flex flex-wrap -mx-2">
                @if ($pictures and count($errors) === 0)
                    @foreach ($pictures as $picture)
                        <div class="relative w-full md:w-1/2 lg:w-1/3" wire:key='{{ $loop->index }}'>

                            <x-image-with-delete
                                :picture="$picture"
                                :loop="$loop->index"
                            />

                        </div>
                    @endforeach
                @endif
            </div>

            @if ($pictures and count($errors) === 0)
                <input
                    wire:loading.attr="disabled"
                    wire:loading.class="opacity-25"
                    wire:loading.class.remove="cursor-pointer"
                    type="submit"
                    value="save"
                    class="flex rounded-md cursor-pointer btn">

                <input
                    wire:loading.attr="disabled"
                    wire:loading.class="opacity-25"
                    wire:loading.class.remove="cursor-pointer"
                    x-on:click="$wire.set('pictures',[])"
                    type="button"
                    value="delete all"
                    class="flex mt-4 rounded-md cursor-pointer btn">

                <input
                    wire:loading.flex
                    wire:target='save'
                    type="submit"
                    value="saving...."
                    class="rounded-md opacity-25 btn">
            @endif

        </x-upload-with-options>
    </form>

    {{-- sweet alert --}}
    @if (session()->has('succses'))
        <script>
            Swal.fire({
                title: @php echo json_encode(session('succses')) @endphp + '!',
                icon: 'success',
            });
            setTimeout(() => {
                window.location.reload();
            }, 1000);
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

</section>
