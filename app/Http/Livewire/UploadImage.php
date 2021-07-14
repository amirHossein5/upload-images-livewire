<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class UploadImage extends Component
{
    use WithFileUploads;

    public $pictures = [];

    public function updatedPictures()
    {
        $this->validate(
            ['pictures.*' => 'required|image'],
            [
                'image' => 'The pictures must be an image.',
                'required'=>'picture is required'
            ]
        );
    }

    public function delete($i)
    {
        array_splice($this->pictures, $i, 1);
    }

    public function save()
    {
        $this->validate(
            ['pictures.*' => 'image|max:1024'],
            [
                'max' => 'The pictures must not be greater than 1024 kilobytes.',
                'image' => 'The pictures must be an image.'
            ]
        );

        if (count($this->pictures) !== 0) {
            foreach ($this->pictures as $picture) {
                $picture->store('pictures');
                $this->pictures = [];
                session()->flash('succses', 'stored');
            }
        } else {
            session()->flash('fail', 'is required');
        }
    }

    public function render()
    {
        return view('livewire.upload-image');
    }
}
