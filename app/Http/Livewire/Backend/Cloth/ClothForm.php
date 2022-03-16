<?php

namespace App\Http\Livewire\Backend\Cloth;

use App\Models\Cloth;
use Livewire\Component;
use App\Events\Cloth\ClothCreated;

class ClothForm extends Component
{
    public $name;

    protected $listeners = ['createmodal'];

    protected $rules = [
        'name' => 'required|min:2|max:20',
    ];

    public $count = 0;

    public function increment()
    {
        $this->count++;
    }

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

        $cloth = Cloth::create($validatedData);

        event(new ClothCreated($cloth));

        $this->resetInputFields();
        $this->emit('clothStore');

		$this->emit('swal:alert', [
		    'icon' => 'success',
		    'title'   => __('Created'), 
		]);

    	$this->emitTo('backend.cloth.cloth-table', 'triggerRefresh');
    }

    public function render()
    {
        return view('backend.cloth.create');
    }
}
