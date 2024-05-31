@extends('body.master')
@section('main')
    <style>
        .footer {
            bottom: -47px !important;
        }
    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        @php
                            $imagePath = public_path('PostPicture/' . $post->post_img);
                        @endphp

                        @if (file_exists($imagePath))
                            <img src="{{ asset('PostPicture/' . $post->post_img) }}" class="w-100" alt="{{ $post->post_img }}">
                        @else
                            <img src="{{ $post->post_img }}" class="w-100" alt="{{ $post->post_img }}">
                        @endif                        <br/>
                        <h2>{{ $post->title }}</h2>
                        <br />
                        <h4>{{$post->slug}}</h4>
                        <br />
                        <h4>{{$post->Categories}}</h4>
                        <p>
                            {{ $post->description }}
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
