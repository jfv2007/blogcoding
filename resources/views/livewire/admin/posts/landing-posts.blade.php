<div>
    <div class="row">
        @if (count($posts) > 0)
            @foreach ($posts as $post)
                <div class="card-wrapper col-md-6">
                    {{-- Empieza card --}}
                    <div class="card">
                        @if ($post->image()->count() > 0)
                            <?php $images = $post->image()->get();
                            /* dd($images); */
                            ?>
                            {{-- <div class="carousel-item active"> --}}
                            <img src="/imagenes/{{  $images[0]['image'] }}" alt="From Img" class="card__img">
                            {{-- </div> --}}
                        @else
                            <img src="{{ asset('imagenes/default.jpeg') }}" alt="From Img" class="card__img">
                        @endif

                        <h1 class="card__title">{{ $post->title }}</h1>
                        <button type="button" class="card__btn slide-toggle" id="{{ $post->id }}">
                            <i class="fa fa-chevron-right"></i>
                        </button>
                    </div>{{-- Fin de Card --}}

                    <div class="content {{ $post->id }}" style="display: none;">
                        <div class="content__box">
                            <p class="heading__secondary content__box--title">
                                {{ $post->title }}
                            </p>
                            <div class="d-flex justify-content-between mb-2">
                                <p class="content__box--author"> Escrito por :{{ $post->user->name }}</p>
                                <p class="content__box--date">{{ $post->created_at->diffForHumans() }}</p>
                            </div>
                            <p class="content__box--body">
                                {{ $post->body }}
                            </p>
                            <a href="#" class="read-more">Read More <span>&#8594</span></a>
                        </div>
                    </div> {{-- Contenido --}}
                </div> {{-- card wrapper --}}
            @endforeach
            @else
                <h1 class="m-5">No hay posts por el momento</h1>
        @endif
    </div>
</div>
