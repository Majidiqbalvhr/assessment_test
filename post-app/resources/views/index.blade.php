@extends('body.master')
@section('main')
    <div class="page-content">
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

                                {{--                                <img src="{{$post->post_img}}" class="w-100">--}}
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
                                <a href="{{ route('post.detail', $post->id) }}" class="btn btn-primary btn-sm" type="button" data-mdb-button-initialized="true">Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        {{ $posts->links() }}
    </div>
    <!-- Include Chart.js from a CDN -->
@endsection
