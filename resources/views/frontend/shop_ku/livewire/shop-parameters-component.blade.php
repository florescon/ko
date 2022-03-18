<div>								
	<div class="prt_04 mb-2">
		<p class="d-flex align-items-center mb-0 text-dark ft-medium">Color:</p>
		<div class="text-left">
			@foreach($attributes->children->unique('color_id')->sortBy('color.name') as $children)
				<div class="form-check form-option form-check-inline mb-1">
					<input class="form-check-input" type="radio" name="color-{{ $children->color_id }}" id="color-{{ $children->color_id }}">
					<label class="form-option-label rounded-circle" for="color-{{ $children->color_id }}"><span class="form-option-color rounded-circle" style=" color: {{ optional($children->color)->secondary_color ?  optional($children->color)->secondary_color .';'. 'border: 6px solid;' : 'black; border: 1px solid;' }} background-color: {{ optional($children->color)->color }};"></span></label>
				</div>

			@endforeach
		</div>
	</div>
	
	<div class="prt_04 mb-4">
		<p class="d-flex align-items-center mb-0 text-dark ft-medium">@lang('Size_'):</p>
		<div class="text-left pb-0 pt-2">
			@foreach($attributes->children->unique('size_id')->sortBy('size.sort') as $children) 
				<div class="form-check size-option form-option form-check-inline mb-2">
					<input class="form-check-input" wire:model="size_id" type="radio" value="{{ $children->size_id }}" name="size" id="size-{{ $children->size_id }}" checked="">
					<label class="form-option-label" for="size-{{ $children->size_id }}">{{ optional($children->size)->short_name ?: optional($children->size)->name }}</label>
				</div>
			@endforeach
		</div>
	</div>
</div>