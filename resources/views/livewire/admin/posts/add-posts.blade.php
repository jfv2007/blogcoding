<div>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title" style="float: left;">Add New Product</h5>
                        <a href="{{ route('admin.posts') }}" class="btn btn-sm btn-primary" style="float: right;">All
                            Posts</a>
                    </div>
                    <div class="card-body">
                        @if (session()->has('message'))
                            <div class="alert alert-success text-center">{{ session('message') }}</div>
                        @endif

                        <form wire:submit.prevent="addPost">
                            {{-- titulo --}}
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" class="form-control" placeholder="Enter title" wire:model="title"
                                    wire:keyup='generateSlug' />
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- slug --}}
                            <div class="form-group">
                                <label for="">Slug</label>
                                <input id="" type="text" class="form-control" placeholder="Enter slug"
                                    wire:model="slug" readonly="readonly" />
                                @error('slug')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Cuerpo --}}
                            <div class="form-group">
                                <label for="">Body</label>
                                <div wire:ignore>
                                    <textarea class="form-control" id='body' wire:model='body'></textarea>
                                </div>
                                @error('body')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- select SLUG --}}
                            <div class="col-md-2">
                                {{--  @if ($selectedCentro != 0 && !is_null($selectedCentro)) --}}
                                <label for=" "class="text-warning">Categoria</label>
                                <select wire:model="selectedCategoria" class="form-select form-select-lg mb-3"
                                    aria-label=".form-select-lg example">
                                    @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->slug }}" class="p-3 mb-2 bg-primary text-white">
                                            {{ $categoria->slug }}
                                        </option>
                                    @endforeach
                                </select>
                                {{-- @endif --}}
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select Team Members</label>
                                    <div
                                        class="@error('members') is-invalid border border-danger rounded custom-error @enderror">
                                        <x-inputs.select2 wire:model="state.members" id="members"
                                            placeholder="select members">
                                            <option>One</option>
                                            <option>Alaska</option>
                                            <option>California</option>
                                            <option>Delaware</option>
                                            <option>Tennessee</option>
                                            <option>Texas</option>
                                            <option>Washington</option>
                                            {{-- @foreach ($categorias as $categoria)
                                                <option value="{{ $categoria->slug }}"
                                                    class="p-3 mb-2 bg-primary text-white">
                                                    {{ $categoria->slug }}
                                                </option>
                                            @endforeach --}}
                                        </x-inputs.select2>
                                    </div>
                                    @error('members')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="appointmentDate">Fecha de Publicacion</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                        </div>
                                        <x-datepicker wire:model.defer="state.date" id="appointmentDate"
                                            :error="'date'" />
                                        @error('date')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1"/>
                                            <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <script type="text/javascript">
                                    $(function () {
                                        $('#datetimepicker1').datetimepicker();
                                    });
                                </script>
                            </div>

                            <div>
                                <label class="flex items-center">
                                    <input wire:model ="state.is_finished" type="checkbox" />
                                    Publicado/Destacado
                                </label>
                                {{--  show datos: {{ var_export($is_finished) }} --}}
                            </div>

                            {{-- tags --}}
                            <div class="col-md-6 offset-md-3 from-group">
                                <h6 class="pt-2">Tags</h6>
                                <select class="tags" class ="form-control" wire:model="state.tags" id="tags"
                                    name="tags[]" multiple="multiple"></select>
                                @error('tags')
                                    <label class="text-danger">{{ $message }}</label>
                                @enderror
                            </div>

                            <div >
                                <select id="testdropdown" name="testdropdown" multiple>
                                    <option value="Apple">Apple</option>
                                    <option value="Samsung">Samsung</option>
                                    <option value="HTC">HTC</option>
                                    <option value="One Plus">One Plus</option>
                                    <option value="Nokia">Nokia</option>
                                </select>
                            </div>

                            {{-- combo tags --}}
                            {{-- <div class="col-md-3">
                                <div wire:ignore>
                                    <label for="" class="text-warning">Tags</label>
                                    <select wire:model="selectedCentro" id="id_centro" class="form-control select2">
                                        @foreach ($centros as $centro)
                                            <option value="{{ $centro->id }}" class="p-3 mb-2 bg-primary text-white">
                                                {{ $centro->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> --}}

                            {{-- Imagenes --}}
                            <div class="form-group">
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
                            </div>

                            <div class="form-group text-center">
                                <button class="btn btn-sm btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{-- @push('scripts') --}}
{{--     <script>
        $('#body').summernote({
            placeholder: 'Enter description',
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


        /*  $(document).ready(function() {
             $('#appointmentDate').datatimepicker({
                 format: 'dd/mm/yyyy',
                 language: 'es',
                 autoclose: true,
             })

             $('#appointmentDate').on("change.datetimepicker", function(e) {
                 alert('here');
             });
         }); */
       /*  $(document).ready(function() {
            jQuery('#datetimepicker').datetimepicker();
        }); */
    </script>
@endpush --}}
@push('js')
    {{--  <script>
        $(document).ready(function() {
            $('.tags').select2({
                placeholder: 'select',
                allowClear: true,
            });

            $('#tags').select2({
                ajax: {
                    url: "{{ route('get-category') }}",
                    type: "post",
                    delay: 250,
                    dataType: 'json',
                    data: function(params) {
                        return {
                            name: params.term,
                            "_token": "{{ csrf_token() }}",
                        };
                    },

                    processResult: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    id: item.id,
                                    text: item.title
                                }
                            })
                        };
                    },
                }
            })

        });
    </script> --}}


        {{-- <script>
            $(document).ready(function() {
                $('#testdropdown').select2();
                $('#testdropdown').on('change', function() {
                    let data = $(this).val();
                    console.log(data);
                    // $wire.set('companies', data, false);
                    // $wire.companies = data;
                    @this.companies = data;
                });
            });
        </script> --}}

@endpush
</div>
