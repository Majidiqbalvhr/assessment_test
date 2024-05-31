@extends('body.master')
@section('main')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">

                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Dashboard</h4>
                        <div class="d-flex justify-content-between">

                            <button type="button" class="btn btn-primary waves-effect waves-light mb-3"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Add Items
                            </button>
                        </div>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add New item</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal mt-3" id="productForm" method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                                            <div class="form-group mb-3 row">
                                                <div class="col-12">
                                                    <input class="form-control" id="name" type="text" name="title" required autofocus autocomplete="name" placeholder="Name" />
                                                    @error('title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 row">
                                                <div class="col-12">
                                                    <input class="form-control" id="slug" type="text" name="slug" required autofocus autocomplete="price" placeholder="Slug" />
                                                    @error('slug')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 row">
                                                <div class="col-12">
                                                    <input class="form-control" id="Categories" type="text" name="Categories" required autofocus autocomplete="Categories" placeholder="Categories" />
                                                    @error('Categories')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 row">
                                                <div class="col-12">
                                                    <textarea class="form-control" id="description" name="description" required placeholder="Description"></textarea>
                                                    @error('description')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 row">
                                                <div class="col-12">
                                                    <input class="form-control @error('post_img') is-invalid @enderror" id="post_img" type="file" accept=".jpg, .jpeg, .png" name="post_img" required />
                                                    @error('post_img')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary waves-effect waves-light" data-bs-dismiss="modal">Discard</button>
                                                <button type="submit" id="add_product" class="btn btn-primary waves-effect waves-light">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end modal -->


                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        @foreach($posts as $post)
            <div class="col-md-12" bis_skin_checked="1">
                <div class="card shadow-0 border rounded-3" bis_skin_checked="1">
                    <div class="card-body" bis_skin_checked="1">
                        <div class="row" bis_skin_checked="1">
                            <a href="{{ route('post.view', $post->id) }}">
                                <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0" bis_skin_checked="1">
                                    <div class="bg-image hover-zoom ripple rounded ripple-surface" bis_skin_checked="1">
                                        @php
                                            $imagePath = public_path('PostPicture/' . $post->post_img);
                                        @endphp

                                        @if (file_exists($imagePath))
                                            <img src="{{ asset('PostPicture/' . $post->post_img) }}" class="w-100" alt="{{ $post->post_img }}">
                                        @else
                                            <img src="{{ $post->post_img }}" class="w-100" alt="{{ $post->post_img }}">
                                        @endif
                                        <a href="#!">
                                            <div class="hover-overlay" bis_skin_checked="1">
                                                <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);" bis_skin_checked="1"></div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </a>
                            <div class="col-md-6 col-lg-6 col-xl-6" bis_skin_checked="1">
                                <a href="{{ route('post.view', $post->id) }}">
                                    <h5>{{$post->name}}</h5>
                                </a>
                                <div class="d-flex flex-row" bis_skin_checked="1">
                                    <div class="text-danger mb-1 me-2" bis_skin_checked="1">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <span>289</span>
                                </div>
                                <div class="mt-1 mb-0 text-muted small" bis_skin_checked="1">
                                    <span>{{$post->Categories}}</span>
                                    <span class="text-primary"> • </span>
                                    <span>Light weight</span>
                                    <span class="text-primary"> • </span>
                                    <span>Best finish<br></span>
                                </div>
                                <div class="mb-2 text-muted small" bis_skin_checked="1">
                                    <span>Unique design</span>
                                    <span class="text-primary"> • </span>
                                    <span>For men</span>
                                    <span class="text-primary"> • </span>
                                    <span>{{$post->slug}}<br></span>
                                </div>
                                <p class="text-truncate mb-4 mb-md-0">
                                    {{$post->description}}
                                </p>
                            </div>
                            <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start" bis_skin_checked="1">
                                <div class="d-flex flex-row align-items-center mb-1" bis_skin_checked="1">
                                    <h4 class="mb-1 me-1"> {{$post->price}}</h4>
                                    <span class="text-danger"><s>$21.99</s></span>
                                </div>
                                <h6 class="text-success">Free shipping</h6>
                                <div class="d-flex flex-column mt-4" bis_skin_checked="1">
                                    <a data-bs-toggle="modal"
                                       data-bs-target="#edit_post"
                                       data-post_id="{{ $post->id }}"
                                       data-post_title="{{ $post->title }}"
                                       data-post_slug="{{ $post->slug }}"
                                       data-post_Categories="{{ $post->Categories }}"
                                       data-post_description="{{ $post->description }}"
                                       class="btn btn-success edit-post-btn">
                                        Edit
                                    </a>
                                    <a href="{{ route('post.delete', $post->id) }}" class="btn btn-danger btn-sm mt-4" type="button" data-mdb-button-initialized="true">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        {{ $posts->links() }}

        <div class="modal fade" id="edit_post" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Post</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal mt-3" id="postForm" method="POST" action="{{ route('post.update') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="post_id" id="post_id">
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <input class="form-control" id="post_title" type="text" name="title" required autofocus placeholder="Title" />
                                    @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <input class="form-control" id="post_slug" type="text" name="slug" required autofocus placeholder="Slug" />
                                    @error('slug')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <input class="form-control" id="post_Categories" type="text" name="Categories" required autofocus placeholder="Categories" />
                                    @error('Categories')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <textarea class="form-control" id="post_description" name="description" required placeholder="Description"></textarea>
                                    @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <input class="form-control @error('post_img') is-invalid @enderror" id="post_img" type="file" accept=".jpg, .jpeg, .png" name="post_img" />
                                    @error('post_img')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary waves-effect waves-light" data-bs-dismiss="modal">Discard</button>
                                <button type="submit" id="add_post" class="btn btn-primary waves-effect waves-light">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Include Chart.js from a CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.edit-post-btn').on('click', function() {
                var postId = $(this).data('post_id');
                var postTitle = $(this).data('post_title');
                var postSlug = $(this).data('post_slug');
                var postCategories = $(this).data('post_categories');
                var postDescription = $(this).data('post_description');

                $('#post_id').val(postId);
                $('#post_title').val(postTitle);
                $('#post_slug').val(postSlug);
                $('#post_Categories').val(postCategories);
                $('#post_description').val(postDescription);
            });
            if ($('#exampleModal').find('.text-danger').length > 0) {
                $('#exampleModal').modal('show'); // Open the modal
            }
        });
    </script>
@endsection
