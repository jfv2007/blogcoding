<div>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title" style="float: left;">All Categories</h5>
                        <a href="{{ route('admin.categories.add') }}" class="btn btn-sm btn-primary" style="float: right;">Add
                            New Category</a>
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
                                    <th style="text-align: center;">Cate ID</th>
                                    <th>Title</th>
                                    <th>Slug</th>
                                    <th>text Color</th>
                                    <th>BG Color</th>

                                    <th style="text-align: center;">Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if ($categories->count() > 0)
                                    @foreach ($categories as $categorie)
                                        <tr>
                                            <td style="text-align: center;">{{ $categorie->id }}</td>
                                            <td>{{ $categorie->title }}</td>
                                            <td>{{ $categorie->slug }}</td>
                                            <td>{{ $categorie->text_color }}</td>
                                            <td>{{ $categorie->bg_color }}</td>
                                               <td style="text-align: center;">
                                                 <a href="{{ route('admin.categories.edit', ['id'=>$categorie->id]) }}" class="btn btn-sm btn-secondary" style="padding: 1px 8px;">Edit</a>

                                                 <a href="javascript:void(0)" class="btn btn-sm btn-danger" style="padding: 1px 8px;" wire:click.prevent="deleteCategory({{ $categorie->id }})">Delete</a>
                                                {{--  <a href="javascript:void(0)" class="btn btn-sm btn-danger" style="padding: 1px 8px;" wire:click.prevent="deletePost({{ $post->id }})">Delete</a> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6" style="text-align: center;">No categories found!</td>
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
