<div>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title" style="float: left;">Hay {{ $posts->count() }} -posts</h5>
                        <a href="{{ route('admin.posts') }}" class="btn btn-sm btn-primary" style="float: right;">Lista de
                            Posts</a>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                @if (session()->has('message'))
                                    <div class="alert alert-success text-center">{{ session('message') }}</div>
                                @endif
                            </div>
                        </div>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">Post ID</th>
                                    <th>Title</th>
                                    <th style="width: 40%;">Body</th>
                                    <th style="text-align: center;">Images</th>
                                    <th style="text-align: center;">Created At</th>
                                    <th style="text-align: center;">Updated At</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if ($posts->count() > 0)
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td style="text-align: center;">{{ $post->id }}</td>
                                            <td>{{ $post->title }}</td>
                                            <td>{!! $post->body !!}</td>
                                            <td style="text-align: center;">
                                                @php
                                                    $images = App\Models\Image::where('post_id', $post->id)->get();
                                                @endphp

                                                @foreach ($images as $item)
                                                    {{-- <img src="{{ asset('imagenes') }}/{{ $item->name }}" style="height: 50px; width: 50px;" alt=""> --}}
                                                    {{-- <img src="{{ $item->image_url }}" style="height: 50px; width: 50px;" alt=""> --}}
                                                    <img src="{{ asset('imagenes') }}/{{ $item->image }}" style="height: 50px; width: 50px;" alt="">
                                                @endforeach
                                            </td> {{-- Termina las imagenes --}}
                                            <td> {{ $post->created_at }} </td>
                                            <td> {{ $post->updated_at }} </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6" style="text-align: center;">No posts found!</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <div class="row">
        @if ($posts->count() > 0)
            @foreach ($posts as $post)
                <div class="col-md-4 bm-5">
                    <div class="card" style="width:18rem;">
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
                                    <div class="carousel-item active"> {{-- storage\app\public\imagenes --}}
                                        <img class="d-block w-100" src="{{ asset('imagenes/default.jpeg') }}"
                                            alt="Post Images" style="width:100%; height:13rem;">
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="card-body">
                            <h5 class="card-title mb-5"> {{ $post->title }}</h5>
                            <p class="card-text mb-5">{{$post->body}} </p>
                        </div>
                    </div>

                </div>
            @endforeach
        @endif
    </div>

</div>
