<div>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title" style="float: left;">Add New Categories</h5>
                         <a href="{{ route('admin.categories') }}" class="btn btn-sm btn-primary" style="float: right;">All
                            Categories</a>
                    </div>
                    <div class="card-body">
                        @if (session()->has('message'))
                            <div class="alert alert-success text-center">{{ session('message') }}</div>
                        @endif



                        <form wire:submit.prevent="addCategories">
                            {{-- titulo --}}
                            <div class="form-group">
                                <label  for="">Title</label>
                                <input id="" type="text" class="form-control" placeholder="Enter title"
                                wire:model="title" wire:keyup='generateSlug' />
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


                            {{-- Text Color --}}
                            <div class="form-group">
                                <label for="">Text color</label>
                                <div wire:ignore>
                                    <select wire:model="selectedColor" id="id_color" class="custom-select">
                                        <option  selected>Open this select menu</option>
                                        <option >blue</option>
                                        <option >indigo</option>
                                        <option >purple</option>
                                        <option >pink</option>
                                        <option >orange</option>
                                        <option >yellow</option>
                                        <option >teal</option>
                                        <option >cyan</option>
                                        <option >white</option>
                                        <option >gray</option>
                                        <option >red</option>
                                      </select>
                                </div>
                                @error('selectedColor')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                              {{-- bg Color --}}
                              <div class="form-group">
                                <label for="">Fondo Color</label>
                                <div wire:ignore>
                                    <select wire:model="selectedbg" id="id_bg" class="custom-select">
                                        <option  selected>Open this select menu</option>
                                        <option >blue</option>
                                        <option >indigo</option>
                                        <option >purple</option>
                                        <option >pink</option>
                                        <option >orange</option>
                                        <option >yellow</option>
                                        <option >teal</option>
                                        <option >cyan</option>
                                        <option >white</option>
                                        <option >gray</option>
                                        <option >red</option>
                                      </select>
                                </div>
                                @error('selectedbg')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>



                            <div class="form-group text-center">
                                <button class="btn btn-sm btn-primary">Grabar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


   {{--  @push('js') --}}
    <script type="module">
        $('#selectedColor').on('change' , function(){
            var valor=this.value;
            var texto =$(this).find('option:selected').text();
            alert(valor);
        });

    </script>
{{-- @endpush --}}


</div>

