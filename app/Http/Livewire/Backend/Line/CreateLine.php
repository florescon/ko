<?php

namespace App\Http\Livewire\Backend\Line;

use App\Models\Line;
use Livewire\Component;
use App\Events\Line\LineCreated;
use Livewire\WithFileUploads;
use App\File;

class CreateLine extends Component
{
    use WithFileUploads;

    public $name;

    public $file_name;

    protected $listeners = ['createmodal'];

    protected $rules = [
        'name' => 'required|min:3|max:15',
        'file_name' => 'sometimes|image|nullable|max:2048',
    ];

    private function resetInputFields()
    {
        $this->name = '';
    }

    public function createmodal()
    {
        $this->resetInputFields();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {

        $validatedData = $this->validate();

        $date = date("Y-m-d");
        $categoryModel = new Line;
        $file_name = $this->file_name ? $this->file_name->store("categories/".$date,'public') : null;

        $categoryModel->name = $this->name;
        $categoryModel->file_name = $this->file_name ? $file_name : null;
        $categoryModel->save();

        $this->emit('swal:alert', [
            'icon' => 'success',
            'title'   => __('Created'), 
        ]);

        $this->resetInputFields();
        $this->emit('lineStore');

        event(new LineCreated($categoryModel));

		$this->emit('swal:alert', [
		    'icon' => 'success',
		    'title'   => __('Created'), 
		]);

    	$this->emitTo('backend.line.line-table', 'triggerRefresh');
    }

    public function render()
    {
        return view('backend.line.create-line');
    }
}
