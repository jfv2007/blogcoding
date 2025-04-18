<div>
    {{--  <div class="card mb-6" style="width:70%;">
    <div class="row no-gutters">
        <div class="col-md-4">
            <img  src="{{ asset('imagenes/default.jpeg') }}" alt=""
             >
        </div>

    <div class="col-md-8">
        <div class="card body">
            <h5 class="card-title"> Card title</h5>
            <p class="card-text">This is wider card with supporting text</p>
            <p class="card-text"> <small class="text-muted"> last updated 3 minutes ago</small> </p>
        </div>
    </div>
  </div>
</div> --}}


{{--     <div class="cream-bg">
        <div class="container">
            <div class="row g-5 d-flex justify-content-center">
                <div class="col-md-5 col-md-12">
                    <div class="card ">
                        <div class="row g-0">
                            <div class="col-6 col-md-12">
                                @if ($posts->count() > 0)
                                    @foreach ($posts as $post)
                                        <div class="col-md-4 bm-5">
                                            <div class="card" style="width:18rem;">
                                                <div id="{{ $post->id }}" class="carousel slide"
                                                    data-ride="carousel" alt="Card Image" class="img-fluid">
                                                    <div class="carousel-inner">
                                                        @if ($post->image->count() > 0)
                                                            @for ($i = 0; $i < count($images = $post->image()->get()); $i++)
                                                                @if ($i == 0)
                                                                    <div class="carousel-item active">
                                                                        <img class="d-block w-100"
                                                                            src="/imagenes/{{ $images[$i]['image'] }}"
                                                                            alt="Post Images"
                                                                            style="width:100%; height:13rem;">
                                                                    </div>
                                                                @else
                                                                    <div class="carousel-item">
                                                                        <img class="d-block w-100"
                                                                            src="/imagenes/{{ $images[$i]['image'] }}"
                                                                            alt="Post Images"
                                                                            style="width:100%; height:13rem;">
                                                                    </div>
                                                                @endif
                                                            @endfor
                                                        @else
                                                            <img class="d-block w-100"
                                                                src="{{ asset('imagenes/default.jpeg') }}"
                                                                alt="Post Images" style="width:100%; height:13rem;">
                                                    </div>
                                    @endif

                            </div>

                        </div>



                            {{-- <div class="card-body">
                                                        <h5 class="card-title mb-5"> {{ $post->title }}</h5>
                                                        <p class="card-text mb-5">{{$post->body}} </p>
                                                    </div>
                    </div>
                </div>

               <div class="col-md-6 offset-md-4">
                    <div class="card-body d-fex flex-column">

                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural
                                lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>

                    </div>
                </div>
                @endforeach
                @endif
            </div>

        </div>
    </div>
</div>
</div>
</div>
</div> --}}



{{--  <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false" data-bs-interval="false">
        <div class="carousel-inner">
            @foreach ($posts as $key => $post)
          <div class="carousel-item active {{ $key == 0 ? 'active':'' }}">
            @if ($post->image)
            <img src="{{ asset('imagenes') }}/{{ $post->imageurl }}" class="d-block w-100" alt="...">
            @endif

        </div>
          @endforeach

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div> --}}


 {{-- <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="{{ asset('imagenes/default.jpeg') }}" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('imagenes/17197799520.jpg') }}" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('imagenes/17197799522.jpg') }}" class="d-block w-100" alt="...">
          </div>
        </div>
      </div> --}}


   <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
       {{--  <div class="row"> --}}
            @if ($posts->count() > 0)
                @foreach ($posts as $post)
                    <div class="col-md-4 bm-5">
                        <div class="card" style="width:70rem;height:130%; ">
                            <div id="{{ $post->id }}" class="carousel slide" data-ride="carousel"
                                alt="Card Image" class="img-fluid">
                                <div class="carousel-inner">
                                    @if ($post->image->count()> 0)
                                        @for ($i = 0; $i < count($images = $post->image()->get()); $i++)
                                            @if ($i == 0)
                                            {{-- $item->image_url --}}
                                                {{-- <div class="carousel-item active">
                                                    <img class="d-block w-100" src="{{ asset('imagenes') }}/{{ $images[$i]['image'] }}"
                                                        alt="Post Images" style="width:100%; height:13rem;">
                                                </div> --}}
                                                <div class="carousel-item active">
                                                    <img class="d-block w-100" src="/imagenes/{{  $images[$i]['image'] }}"
                                                        alt="Post Images" style="width:100%; height:35rem;">
                                                </div>
                                            @else
                                                <div class="carousel-item">
                                                    <img class="d-block w-100" src="/imagenes/{{ $images[$i]['image'] }}"
                                                        alt="Post Images" style="width:100%; height:13rem;">
                                                </div>
                                            @endif
                                        @endfor

                                        @else
                                        <div class="carousel-item active"> {{-- storage\app\public\imagenes --}}
                                            <img class="d-block w-100" src="{{ asset('imagenes/default.jpeg') }}"
                                                alt="Post Images" style="width:100%; height:13rem;">
                                        </div>
                                    @endif
                                </div>
                            </div>

                           {{--  <div class="card-body">
                                <h5 class="card-title mb-5"> {{ $post->title }}</h5>
                                <p class="card-text mb-5">{{$post->body}} </p>
                            </div> --}}
                            <div class="carousel-caption d-none d-md-block">
                                <h5>{{ $post->title }}</h5>
                                <h5>{{ $post->body }}</h5>
                                <p></p>
                            </div>
                        </div>

                    </div>
                @endforeach
            @endif
       {{--  </div> --}}


            {{-- <div class="carousel-caption d-none d-md-block">
              <h5>First slide label</h5>
              <p>Some representative placeholder content for the first slide.</p>
            </div> --}}

          {{-- </div> active--}}


        </div>  {{-- inner --}}
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>



{{--
      <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="10000">
            <img src="{{ asset('imagenes/default.jpeg') }}" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item" data-bs-interval="2000">
            <img src="{{ asset('imagenes/17197799520.jpg') }}" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('imagenes/17197799522.jpg') }}" class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
 --}}
</div>
