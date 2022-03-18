<?php

namespace App\Http\Livewire\Backend\Line;

use App\Models\Line;
use Livewire\Component;
use App\Events\Line\LineUpdated;
use Livewire\WithFileUploads;
use App\File;

class EditLine extends Component
{
    use WithFileUploads;

    public $selected_id, $name, $slug;

    public $file_name;

    public $image;

    protected $listeners = ['edit'];

    public function edit($id)
    {
        $record = Line::withTrashed()->findOrFail($id);
        $this->selected_id = $id;
        $this->name = $record->name;
        $this->slug = $record->slug;
        $this->image = $record->file_name;
    }

    public function update()
    {
        $this->validate([
            'selected_id' => 'required|numeric',
            'name' => 'required|min:3|max:15',
            'file_name' => 'sometimes|image|nullable|max:2048',
        ]);
        if ($this->selected_id) {

            $date = date("Y-m-d");
            $file_name = $this->file_name ? $this->file_name->store("categories/".$date,'public') : null;

            $line = Line::find($this->selected_id);
            $line->update([
                'name' => $this->name,
                'file_name' => $this->file_name ? $file_name : $this->image,
            ]);
            // $this->resetInputFields();
        }

        event(new LineUpdated($line));

        $this->emit('lineUpdate');
        $this->emitTo('backend.line.line-table', 'triggerRefresh');

       $this->emit('swal:alert', [
            'icon' => 'success',
            'title'   => __('Actualizado'), 
        ]);
    }

    public function render()
    {
        return view('backend.line.edit-line');
    }
}