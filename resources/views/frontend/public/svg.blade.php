@extends('layouts.frontend')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-primary mb-5">
        <div
            class="d-flex flex-column align-items-center justify-content-center"
            style="min-height: 150px"
        >
            <h3 class="font-weight-bold text-white">Free SVG Files</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0">Find stunning free SVG images and incorporate them into your projects. Instantly create
                    jaw-dropping vectors, designs, and more with Pixelied!</p>
            </div>
            <form method="get" action="">
                <div class="input-group">
                    <input name="search" type="text" class="form-control form-control-lg" placeholder="Search SVG">
                    <div class="input-group-append">
                        <span class="input-group-text bg-transparent text-primary"><i class="fa fa-search"></i></span>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Detail Start -->
    <div class="container py-1">
        <div class="row pt-1">
            <div class="col-lg-8">
                <div class="d-flex flex-column text-left mb-3">
                    <h3 class="mb-3">{{ $post->name }}</h3>
                    <div class="d-flex">
                        <p class="mr-3">
                            <i class="fa fa-folder text-primary"></i> {{ $post->category->name }}
                        </p>
                        <p class="mr-3">Created At: {{ date('d-m-Y H:i:s', strtotime($post->created_at)) }}</p>
                    </div>
                </div>
                <div class="mb-5">
                    <img
                        class="img-fluid mb-4 svg-bg"
                        src="{{ $post->image }}"
                        width="400px" height="400px"
                        alt="{{ $post->category->name }}"
                        title="{{ $post->category->name }}"
                    />
                    <div class="row">
                        <h3>Tag</h3>
                        <p>
                            @foreach($post->tags as $tag)
                                <a href="{{ route('frontend.public.category', $tag->slug) }}" class="btn btn-secondary">
                                    {{ $tag->name }} <span class="badge bg-secondary">4</span>
                                </a>
                            @endforeach
                        </p>
                    </div>
                </div>

                <!-- Related Post -->
                <div class="mb-5 mx-n3">
                    <h2 class="mb-4 ">Related SVG</h2>
                    <div class="row">
                        @forelse ($relatedPosts as $item)
                            <div class="col-md-2 mb-4">
                                <div class="card border-0 shadow-sm mb-2">
                                    <a href="{{ route('frontend.public.svg', $item->slug) }}">
                                        <img class="svg-bg mb-2" width="200" height="200" src="{{ $item->image }}"
                                             title="{{ $item->name }}" alt="{{ $item->name }}"/>
                                    </a>
                                </div>
                            </div>
                        @empty
                            <h3>This category didn't have any svg</h3>
                        @endforelse
                    </div>
                </div>

            </div>

            <div class="col-lg-4 mt-5 mt-lg-0">
                <!-- Single Image -->
                <div class="mb-5">
                    <img src="{{ asset('user/img/blog-1.jpg') }}" alt="" class="img-fluid rounded"/>
                </div>

                <!-- Recent Post -->
                <div class="mb-5">
                    <h2 class="mb-4">Bài đăng gần đây</h2>

                </div>
            </div>
        </div>
    </div>
@endsection
