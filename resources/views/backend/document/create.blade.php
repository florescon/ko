<!-- Modal -->
<div wire:ignore.self  class="modal fade"  id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">@lang('Create document')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <form wire:submit.prevent="store">
        <div class="modal-body">

          <label>@lang('Title')</label>
          <input wire:model.lazy="title" type="text" class="form-control"/>
          @error('title') <span class="error" style="color: red;"><p>{{ $message }}</p></span> @enderror

          <div class="form-row">
            <div class="form-group col-md-6">
              <label class="mt-4">@lang('File DST')</label>
              <input wire:model="file_dst" type="file" class="form-control-file"/>
              @error('file_dst') <span class="error" style="color: red;"><p>{{ $message }}</p></span> @enderror
            </div>

            <div class="form-group col-md-6">
              @if($file_dst)
                  <div wire:loading.remove wire:target="file_dst" class="mt-4"> 
                      <div class="float-left">
                          <button type="button" wire:click="removeDST" class="btn btn-light">
                              <i class="cil-x-circle"></i> @lang('Delete')
                          </button>
                      </div>
                  </div>
              @endif
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label class="mt-4">@lang('File EMB')</label>
              <input wire:model="file_emb" type="file" class="form-control-file"/>
              @error('file_emb') <span class="error" style="color: red;"><p>{{ $message }}</p></span> @enderror
            </div>

            <div class="form-group col-md-6">
              @if($file_emb)
                  <div wire:loading.remove wire:target="file_emb" class="mt-4"> 
                      <div class="float-left">
                          <button type="button" wire:click="removeEMB" class="btn btn-light">
                              <i class="cil-x-circle"></i> @lang('Delete')
                          </button>
                      </div>
                  </div>
              @endif
            </div>
          </div>

            <div class="form-group row">
                <label for="image" class="col-sm-2 col-form-label">@lang('Image')</label>

                <div class="col-sm-6" >

                    <div class="custom-file">
                      <input type="file" wire:model="image" class="custom-file-input @error('image') is-invalid  @enderror" id="customFileLangHTML">
                      <label class="custom-file-label" for="customFileLangHTML" data-browse="Principal">@lang('Image')</label>
                    </div>

                    <div wire:loading wire:target="image">@lang('Uploading')...</div>
                    @error('image') <span class="text-danger">{{ $message }}</span> @enderror

                    @if ($image)
                        <br><br>
                        @php
                            try {
                               $url = $image->temporaryUrl();
                               $photoStatus = true;
                            }catch (RuntimeException $exception){
                                $this->photoStatus =  false;
                            }
                        @endphp
                        @if($photoStatus)
                            <img class="img-fluid" alt="Responsive image" src="{{ $url }}">
                        @else
                            @lang('Something went wrong while uploading the file.')
                        @endif
                    @endif

                </div>

                @if($image)
                    <div wire:loading.remove wire:target="image"> 
                        <div class="col-sm-3 float-left">
                            <button type="button" wire:click="removeImage" class="btn btn-light">
                                <i class="cil-x-circle"></i>
                            </button>
                        </div>
                    </div>
                @endif

            </div><!--form-group-->


          <label class="mt-4">@lang('Comment')</label>
          <input wire:model.lazy="comment" type="text" class="form-control"/>
          @error('comment') <span class="error" style="color: red;"><p>{{ $message }}</p></span> @enderror

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('Close')</button>
          <button type="submit" class="btn btn-primary">@lang('Save')</button>
        </div>
      </form>
    </div>
  </div>
</div>
