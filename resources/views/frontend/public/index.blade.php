@extends('layouts.frontend')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-primary mb-5">
        <div
            class="d-flex flex-column align-items-center justify-content-center"
            style="min-height: 300px"
        >
            <h3 class="display-3 font-weight-bold text-white">Free SVG Files</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0">Find stunning free SVG images and incorporate them into your projects. Instantly create jaw-dropping vectors, designs, and more with Pixelied!</p>
            </div>
            <form method="get" action="{{ route('frontend.public.search') }}">
                <div class="input-group">
                    <input name="name" type="text" class="form-control form-control-lg" placeholder="Search SVG">
                    <div class="input-group-append">
                        <span class="input-group-text bg-transparent text-primary"><i class="fa fa-search"></i></span>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Header End -->
    <!-- Class Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <p class="section-title px-5">
                    <span class="px-2">Popular Collection</span>
                </p>
                <h1 class="mb-4">SVG Icons</h1>
            </div>
            <div class="row">
                @foreach($categories as $category)
                    <p>
                        <a href="{{ route('frontend.public.category', $category->slug) }}" class="btn btn-secondary">
                            {{ $category->name }} <span class="badge bg-secondary">{{ $category->item_total }}</span>
                        </a>
                    </p>
                @endforeach

            </div>
        </div>
    </div>
    <!-- Class End -->

@endsection
