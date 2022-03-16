<?php

namespace App\Http\Livewire\Backend\Line;

use App\Models\Line;
use Livewire\Component;
use App\Events\Line\LineCreated;

class CreateLine extends Component
{
    public $name;

    protected $listeners = ['createmodal'];

    protected $rules = [
        'name' => 'required|min:3|max:15',
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

        $line = Line::create($validatedData);

        $this->resetInputFields();
        $this->emit('lineStore');

        event(new LineCreated($line));

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
