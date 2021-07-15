<div>
    <input
        x-ref="photo"
        type="file"
        class="hidden"
        x-on:change="
            const files = $refs.photo.files;
            pictures=[]

            for(let index=0  ; index<files.length; index++){

                const reader = new FileReader();
                reader.onload = (e) => {

                    {{-- validation --}}
                    if((files[index].type === 'image/png') && (files[index].size/ 1000000 < 5)){
                        pictures.push(e.target.result);
                    }else{
                        $refs.photo.value = null;
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'fill images correctly!',
                        })
                    }
                };
                reader.readAsDataURL(files[index]);
            };

            {{-- sets pictures --}}
            $wire.set('pictures',pictures);
        " multiple>
</div>
