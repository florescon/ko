<div class="btn-group" role="group" aria-label="Basic example">

  <x-actions-modal.show-icon target="showModal" emitTo="backend.unit.show-unit" function="show" :id="$unit->id" />

	@if (!$unit->trashed())
    @if ($logged_in_user->hasAllAccess() || $logged_in_user->can('admin.access.unit.modify'))
  	  <x-actions-modal.edit-icon target="editUnit" emitTo="backend.unit.edit-unit" function="edit" :id="$unit->id" />
	  @endif
    @if ($logged_in_user->hasAllAccess() || $logged_in_user->can('admin.access.unit.delete'))
      <x-actions-modal.delete-icon function="delete" :id="$unit->id" />
    @endif
	@else

    <div class="dropdown">
      <a class="btn btn-icon-only" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-ellipsis-v"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
        <a class="dropdown-item" href="#" wire:click="restore({{ $unit->id }})">
          @lang('Restore')
        </a>
      </div>
    </div>

	@endif
</div>
