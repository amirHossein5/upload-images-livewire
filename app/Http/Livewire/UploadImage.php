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
            ['pictures.*' => 'required|image|file'],
            [
                'required' => 'picture is required'
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
            ['pictures.*' => 'required|image|file'],
            [
                'required' => 'picture is required'
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
