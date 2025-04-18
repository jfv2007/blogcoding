<div class=" px-3 lg:px-7 py-6">
    <div class="flex justify-between items-center border-b border-gray-100">
        <div class="text-gray-600">
            @if ($this->activeCategory || $search)
                <button class="gray-500 text-xs mr-3" wire:click="clearFilters()">X</button>
            @endif

            @if ($this->activeCategory)

                <x-badge wire:navigate href="{{ route('posts.index', ['category' => $this->activeCategory->slug]) }}"
                    :textColor="$this->activeCategory->text_color" :bgColor="$this->activeCategory->bg_color">
                    {{ $this->activeCategory->title }}
                </x-badge>
            @endif

            @if ($search)
                <span class="ml-2">
                    Containing :  <strong>{{ $search }}</strong>
                </span>
            @endif.
        </div>
        <div class="flex items-center space-x-4 font-light ">
            <button class="{{ $sort === 'desc' ? 'text-gray-900 border-b border-gray-700' : 'text-gray-500' }} py-4"
                wire:click="setSort('desc')">Latest</button>
            <button class="{{ $sort === 'asc' ? 'text-gray-900 border-b border-gray-700' : 'text-gray-500' }} py-4"
                wire:click="setSort('asc')">Oldest</button>
        </div>
    </div>


    <div class="py-4">
        @foreach ($this->posts as $post)
            <x-posts.post-item :post="$post" />
        @endforeach






   {{--      @if ($this->posts->count() > 0)
            @foreach ($this->posts as $post)
                <div class="col-md-4 bm-5">
                    <div class="card" style="width:18rem;">
                        <div id="{{ $post->id }}" class="carousel slide" data-ride="carousel" alt="Card Image"
                            class="img-fluid">
                            <div class="carousel-inner">
                                @if ($post->image->count() > 0)
                                    @for ($i = 0; $i < count($images = $post->image()->get()); $i++)
                                        @if ($i == 0)
                                            <div class="carousel-item active">
                                                <img class="d-block w-100" src="/imagenes/{{ $images[$i]['image'] }}"
                                                    alt="Post Images" style="width:100%; height:13rem;">
                                            </div>
                                        @else
                                            <div class="carousel-item">
                                                <img class="d-block w-100" src="/imagenes/{{ $images[$i]['image'] }}"
                                                    alt="Post Images" style="width:100%; height:13rem;">
                                            </div>
                                        @endif
                                    @endfor
                                @else
                                    <img class="d-block w-100" src="{{ asset('imagenes/default.jpeg') }}"
                                        alt="Post Images" style="width:100%; height:13rem;">
                            </div>
            @endif
    </div>
</div>


<div class="card-body">
    <span class="text-gray-500 text-xs">{{ $post->author->name }}</span>
    <h5 class="col-shpan-8"> {{ $post->title }}</h5>
</div>
</div>
</div>
@endforeach
@endif--}}
</div>


<div class="my-3">
    {{ $this->posts->onEachSide(1)->links() }}
</div>
</div>
