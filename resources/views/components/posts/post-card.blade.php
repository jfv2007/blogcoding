@props(['post'])
<div {{ $attributes }}>
    <a wire:navigate href="{{ route('posts.show', $post->slug) }}">
        <div>
            <img class="w-full rounded-xl"
            {{-- src=" {{ Storage::url($post->image)  }}"> --}}
                 src=" {{  asset('imagenes/'. $post->imageurl ) }}">
               {{-- Storage::url($post->image->url) --}}
                 {{-- src="{{ asset('imagenes/default.jpeg') }}"> --}}
                {{-- aqui se va a mostrar la imagen foto_url-- {{ asset('imagenes') }}/{{ $item->image }}--}}
        </div>
    </a>
    <div class="mt-3">
        <div class="flex items-center mb-2 gap-x-2">
            @if ($category = $post->categories()->first())
            <x-posts.category-badge :category="$category" />
            @endif
            <p class="text-gray-500 text-sm">{{ $post->published_at }}</p>
        </div>
        <a  wire:navigate href="{{ route('posts.show', $post->slug) }}"
            class="text-xl font-bold text-gray-900">{{ $post->title }}</a>
    </div>

</div>
