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
    <!-- Header End -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <h1 class="mb-4">{{ $category->name }} category</h1>
            </div>
            <div class="row pb-3">
                @forelse ($list as $item)
                    <div class="col-md-2 mb-4">
                        <div class="card border-0 shadow-sm mb-2">
                            <a href="{{ route('frontend.public.svg', $item->slug) }}">
                                <img class="svg-bg mb-2" width="200" height="200" src="{{ $item->image }}" title="{{ $item->name }}" alt="{{ $item->name }}" />
                            </a>
                        </div>
                    </div>
                @empty
                    <h3>This category didn't have any svg</h3>
                @endforelse
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <nav aria-label="Page navigation">
                        {{ $list->withQueryString()->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>

@endsection
