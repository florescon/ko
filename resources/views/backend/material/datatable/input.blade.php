{{-- <x-forms.patch :action="route('admin.material.updateStock', $material)">

    <input type="number" step="any" name="stock" class="form-control" placeholder="{{ $material->name ? $material->name.'.'  :'' }} Enter para guardar actual">

</x-forms.patch> --}}

<x-actions-modal.edit-icon target="updateStockModal" emitTo="backend.material.modal-stock-material" function="modalUpdateStock" :id="$material->id" />
