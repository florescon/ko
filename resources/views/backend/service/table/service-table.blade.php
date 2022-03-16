<div class="main-content">

  @if($status != 'deleted')
  <div class="row mb-4 justify-content-md-center">
    <div class="col-9">
      <div class="input-group">
        <input wire:model.debounce.350ms="searchTerm" class="input-search" type="text" placeholder="{{ __('Search service by name or code') }}..." />
          <span class="border-input-search"></span>
      </div>
    </div>
      @if($searchTerm !== '')
      <div class="input-group-append">
        <button type="button" wire:click="clear" class="close" aria-label="Close">
          <span aria-hidden="true"> &nbsp; &times; &nbsp;</span>
        </button>

      </div>
      @endif
  </div>
  @endif

  <div class="container">

  @include('backend.service.show')
  @include('backend.service.update')

    @if($services->count())
      <div class="row">
        @foreach($services as $service)
          <div class="col-sm-6 col-md-6 col-lg-4">
            <div class="card bg-white p-3 mb-4 shadow">
              <div class="d-flex justify-content-between mb-4">
                <div class="user-info">
                  <div class="user-info__img">
                    <a href="#" class="avatar rounded-circle mr-3">
                      {{ $service->first_character_name }}
                    </a>
                  </div>
                  <div class="user-info__basic">
                    <h5 class="mb-0">{{ $service->name }}</h5>
                    <p class="text-muted mb-0">
                      {!! $service->code ?: '<span class="badge badge-secondary">'.__('undefined code').'</span>' !!}
                    </p>
                  </div>
                </div>

                @if ($logged_in_user->hasAllAccess() || $logged_in_user->can('admin.access.service.delete'))
                  <div class="dropdown">
                    <a class="btn btn-icon-only text-primary" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v"></i>
                    </a>
                    @if(!$service->trashed())
                      <div class="dropdown-menu ">
                        <a class="dropdown-item" wire:click="delete({{ $service->id }})"><i class="fa fa-trash mr-1"> @lang('Delete')</i></a>
                      </div>
                    @else
                      <div class="dropdown-menu ">
                        <a class="dropdown-item" wire:click="restore({{ $service->id }})">@lang('Restore')</a>
                      </div>
                    @endif
                  </div>
                @endif

              </div>
              <h6 class="mb-0">{{ $service->price ? '$'.$service->price : 'undefined price' }}</h6>
              <a href="#!" data-toggle="modal" data-target="#showModal" wire:click="show({{ $service->id }})"><small>@lang('Details')</small></a>
              <div class="d-flex justify-content-between mt-4">
                @if ($logged_in_user->hasAllAccess() || $logged_in_user->can('admin.access.service.modify'))
                  <div>
                    <h5 class="mb-0"> <a href="#!" type="button" data-toggle="modal" data-target="#updateModal" wire:click="edit({{ $service->id }})"><em class="text-primary">@lang('Edit')</em></a>
                      <small class="ml-1">{{ $service->date_for_humans }}</small>
                    </h5>
                  </div>
                @endif
                <span class="text-success font-weight-bold">@lang('Records')</span>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    @endif

    <div class="row mt-4">
      <div class="col">
          @if($services->count())
          <div class="row">
            <div class="col">
              <nav>
                {{ $services->onEachSide(1)->links() }}
              </nav>
            </div>
                <div class="col-sm-3 text-muted text-right">
                  Mostrando {{ $services->firstItem() }} - {{ $services->lastItem() }} de {{ $services->total() }} resultados
                </div>
          </div>

          @else
            @lang('No search results') 
            @if($searchTerm)
              "{{ $searchTerm }}" 
            @endif

            @if($page > 1)
              {{ __('in the page').' '.$page }}
            @endif
          @endif

      </div>
    </div>

    @if($services->count() && $status != 'deleted')
      <footer class="footer mt-3">
          <div class="row align-items-center justify-content-xl-between">
            <div class="col-xl-6 m-auto text-center">
              <div>
                <p> 
                  <a href="{{ route('admin.service.records') }}">Ir a registros de servicios realizados en órdenes/ventas</a>
                </p>
              </div>
            </div>
          </div>
      </footer>
    @endif

  </div>

</div>

