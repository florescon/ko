@props(['function' => 'delete', 'id' => null, 'textExtra' => ''])

<div class="dropdown">
  <a class="btn btn-icon-only " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="cil-options"></i>
  </a>
  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
    <a class="dropdown-item" wire:click="{{ $function }}({{ $id }})">@lang('Delete') <em>{{ $textExtra }}</em> </a>
  </div>
</div>
