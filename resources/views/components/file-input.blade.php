<div>
    <input
        x-ref="file"
        type="file"
        class="hidden"
        x-on:change="
        {{-- validate size->after -> and lenght --}}
            {{-- const validation = ($refs.file.files.length < 20 ) && ($refs.file.files.length > 0);
($refs.file.files[0].type==='image/png' || $refs.file.files[0].type==='image/jpg')

            if(validation){

                const reader = new FileReader();
                reader.onload = (e) => {
                    console.log(reader);
                    photoPreview = e.target.result;
                    $wire.set('pictures',$refs.file.result);
                    {{-- return true; --}}
                {{-- }
            } --}}
            {{-- return false; --}}

                                                photoName = $refs.file.files[0].name;
                                                {{-- $wire.set('pictures',[$refs.file.files[0].name]); --}}
                                                const reader = new FileReader();
                                                reader.onload = (e) => {
                                                    photoPreview = e.target.result;
                                                    {{-- console.log(photoPreview); --}}

                                        {{-- error = photo is big ; ->show it in page --}}
                                    };
                                    console.log($refs.file.files)
                                    for(file in $refs.file.files){
                                        {{-- reader.readAsDataURL(file); --}}
                                    }
            "
    multiple>
</div>

    {{-- validation number of images
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
    </script> --}}
