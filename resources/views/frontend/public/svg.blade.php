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
            <form method="get" action="{{ route('frontend.public.search') }}">
                <div class="input-group">
                    <input name="name" type="text" class="form-control form-control-lg" placeholder="Search SVG">
                    <div class="input-group-append">
                        <button type="submit" class="btn-secondary">Search</button>
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
                            <a href="{{ route('frontend.public.category', $post->category->slug) }}">
                                <i class="fa fa-folder text-primary"></i> {{ $post->category->name }}
                            </a>
                        </p>
                        <p class="mr-3">Created At: {{ date('m-d-Y H:i:s', strtotime($post->created_at)) }}</p>
                    </div>
                </div>
                <div class="mb-5">
                    <p class="text-right"><a href="{{ route('frontend.public.download', [$post->id, $post->storage_link]) }}"  download="{{ $post->storage_link }}" class="btn btn-secondary">
                            Download
                        </a></p>
                    <img
                        class="img-fluid mb-4 svg-bg"
                        src="{{ $post->image }}"
                        width="400px" height="400px"
                        alt="{{ $post->name }}"
                        title="{{ $post->name }}"
                    />
                    <p>
                        <a rel="license" target="_blank" href="https://creativecommons.org/publicdomain/zero/1.0/"><img src="https://licensebuttons.net/p/zero/1.0/80x15.png" style="border-style: none;" alt="CC0"></a>
                    </p>
                    <div class="row">
                        <h3 class="mr-4">Tag:</h3>
                        <p>
                            @foreach($tags as $tag)
                                <a href="{{ route('frontend.public.tag', $tag->slug) }}" class="btn btn-secondary">
                                    {{ $tag->name }}
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
                                        <img class="svg-bg" width="auto" height="100" src="{{ $item->image }}"
                                             title="{{ $item->name }}" alt="{{ $item->name }}"/>
                                    </a>
                                </div>
                                <a rel="license" target="_blank" href="https://creativecommons.org/publicdomain/zero/1.0/"><img src="https://licensebuttons.net/p/zero/1.0/80x15.png" style="border-style: none;" alt="CC0"></a>
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
            </div>
        </div>
    </div>
@endsection
