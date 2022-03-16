<?php

namespace App\Http\Livewire\Backend\Size;

use App\Models\Size;
use Livewire\Component;
use Illuminate\Validation\Rule;
use App\Events\Size\SizeUpdated;

class EditSize extends Component
{
    public $selected_id, $name, $short_name, $slug, $sort;

    protected $listeners = ['edit'];

    public function edit($id)
    {
        $this->resetInputFields();

        $record = Size::withTrashed()->findOrFail($id);
        $this->selected_id = $id;
        $this->name = $record->name;
        $this->short_name = $record->short_name;
        $this->slug = $record->slug;
        $this->sort = $record->sort;
    }

    private function resetInputFields()
    {
        $this->resetValidation();
        $this->name = '';
        $this->short_name = '';
        $this->sort = '';
    }

    public function update()
    {
        $this->validate([
            'selected_id' => 'required|numeric',
            'name' => 'required|min:1|max:20',
            'short_name' => ['required', 'min:1', 'max:4', 'regex:/^\S*$/u', Rule::unique('sizes')->ignore($this->selected_id)],
            'sort' => 'sometimes|integer|min:0',
        ]);
        if ($this->selected_id) {
            $size = Size::find($this->selected_id);
            $size->update([
                'name' => $this->name,
                'short_name' => $this->short_name,
                'sort'=> $this->sort,
            ]);
            // $this->resetInputFields();
        }

        event(new SizeUpdated($size));

        $this->emit('sizeUpdate');
        $this->emitTo('backend.size.size-table', 'triggerRefresh');

        $this->emit('swal:alert', [
            'icon' => 'success',
            'title'   => __('Actualizado'), 
        ]);
    }

    public function render()
    {
        return view('backend.size.edit-size');
    }
}