<div>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title" style="float: left;">Editar Post</h5>
                        <a href="{{ route('admin.posts') }}" class="btn btn-sm btn-primary" style="float: right;">All
                            Post</a>
                    </div>
                    <div class="card-body">
                        @if (session()->has('message'))
                            <div class="alert alert-success text-center">{{ session('message') }}</div>
                        @endif

                        <form wire:submit.prevent="updatePost">
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" class="form-control" placeholder="Enter title"
                                    wire:model="title" wire:keyup='generateSlug'/>
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- slug --}}
                            <div class="form-group">
                                <label for="">Slug</label>
                                <input id="" type="text" class="form-control" placeholder="Enter slug"
                                wire:model="slug" readonly="readonly"/>
                                @error('slug')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Body</label>
                                <div wire:ignore>
                                    <textarea class="form-control" id='body' wire:model='body'></textarea>
                                </div>
                                @error('body')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="appointmentDate">Fecha de Publicacion</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                        </div>
                                        <x-datepicker wire:model.defer="state.date" id="appointmentDate"  :error="'date'" />
                                        @error('date')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label class="flex items-center">
                                    <input wire:model ="state.featured" type="checkbox" />
                                    Publicado
                                </label>
                                {{--  show datos: {{ var_export($is_finished) }} --}}
                            </div>

                            {{-- <div class="form-group">
                                <div class="w-full">
                                    <div class="flex">
                                        @if ($images)
                                            Photo Preview:
                                            <div class="flex bg-blue-200 p-4 rounded-lg">
                                                @foreach ($images as $image)
                                                    <img class="img-fluid img-thumbnail" style="width: 150px;"
                                                        src="{{ $image->temporaryUrl() }}">
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <label for="">Images</label>
                                <input type="file" class="form-control" style="padding: 3px; font-size: 12px;"
                                    wire:model="images" multiple />
                                @error('images')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                                <br>

                                @foreach ($postImages as $pimage)
                                    <img src="{{ asset('imagenes') }}/{{ $pimage->image }}" height="70px"
                                        width="70px" alt="">
                                    <a href="#" wire:click.prevent='deleteImage({{ $pimage->id }})'><i
                                            class="fa fa-times text-danger mr-2"></i></a>
                                @endforeach
                            </div> --}}

                            <div class="form-group">
                                <label for="">Images</label>
                                <input type="file" class="form-control" style="padding: 3px; font-size: 12px;"
                                    wire:model="images" multiple />
                                @error('images')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <br>
                                @foreach ($postImages as $pimage)
                                        <img src="{{ asset('imagenes') }}/{{ $pimage->image }}"  style="height:70px;
                                            width:70px" alt=""/>
                                        <a href="#" wire:click.prevent='deleteImage({{ $pimage->id }})'><i
                                                class="fa fa-times text-danger mr-2"></i></a>
                                @endforeach
                            </div>

                            <div class="form-group text-center">
                                <button class="btn btn-sm btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $(function() {
            $('#body').summernote({
                placeholder: 'Enter Body',
                height: 300,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                callbacks: {
                    onChange: function(contents, $editable) {
                        @this.set('body', contents);
                    }
                }
            });
        });
    </script>


@endpush
