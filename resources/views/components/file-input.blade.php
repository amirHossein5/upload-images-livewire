<div>
    <input
        x-ref="photo"
        type="file"
        class="hidden"
        wire:model="pictures"
        x-on:change="
                const files = $refs.photo.files;

                for(let index=0  ; index<files.length; index++){
                    if(
                        (files.length < 20) && (files.length > 0) && (files[index].type.search('image') === 0) && (files[index].size/ 1000000 < 5)
                    ){
                        return true;
                    }else{
                        validationImages($refs.photo);
                    }
                }
                " multiple>
</div>

    {{-- validation number of images --}}
    <script>
        function validationImages(photo) {
            photo.value = null;
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'must be correct image under 20 items!',
            })
            setTimeout(() => {
                window.location.reload();
            }, 500);
        }
    </script>
