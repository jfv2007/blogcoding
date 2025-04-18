<div>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title" style="float: left;">All Posts</h5>
                        <a href="{{ route('admin.posts.add') }}" class="btn btn-sm btn-primary" style="float: right;">Add
                            New Post</a>
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
                                    {{-- <th style="width: 40%;">Body</th> --}}
                                    <th>Slug</th>
                                    {{-- <th>Author</th> --}}
                                    <th>Published</th>
                                   {{--  <th>Presentado</th> --}}
                                    <th style="text-align: center;">Images</th>
                                    <th style="text-align: center;">Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if ($posts->count() > 0)
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td style="text-align: center;">{{ $post->id }}</td>
                                            <td>{{ $post->title }}</td>
                                            {{-- <td>{!! $post->body !!}</td> --}}
                                            <td>{{ $post->slug }}</td>
                                            {{-- <td>{{ $post->Author }}</td> --}}
                                            <td>{{ $post->published_at }}</td>
                                            {{-- <td>{{ $post->featured }}</td> --}}

                                            <td style="text-align: center;">
                                                @php
                                                    $images = App\Models\Image::where('post_id', $post->id)->get();
                                                @endphp

                                                @foreach ($images as $item)
                                                    {{-- <img src="{{ asset('imagenes') }}/{{ $item->name }}" style="height: 50px; width: 50px;" alt=""> --}}
                                                    {{-- <img src="{{ $item->image_url }}" style="height: 50px; width: 50px;" alt=""> --}}
                                                    <img src="{{ asset('imagenes') }}/{{ $item->image }}" style="height: 50px; width: 50px;" alt="">
                                                    @endforeach
                                            </td>
                                            <td style="text-align: center;">
                                                 <a href="{{ route('admin.posts.edit', ['id'=>$post->id]) }}" class="btn btn-sm btn-secondary" style="padding: 1px 8px;">Edit</a>

                                                 <a href="javascript:void(0)" class="btn btn-sm btn-danger" style="padding: 1px 8px;" wire:click.prevent="deletePost({{ $post->id }})">Delete</a>
                                            </td>
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
</div>

