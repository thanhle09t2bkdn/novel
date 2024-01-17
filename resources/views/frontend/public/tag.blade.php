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
                    jaw-dropping vectors, designs, and more with SVG Collection!</p>
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
    <!-- Header End -->
    <div class="container-fluid pt-2">
        <div class="container">
            <div class="text-center pb-2">
                <h1 class="mb-4">{{ $tag->name }} tag</h1>
            </div>
            <div class="row pb-3">
                @forelse ($list as $item)
                    <div class="col-md-2 mb-4">
                        <div class="card border-0 shadow-sm mb-2">
                            <a href="{{ route('frontend.public.svg', $item->slug) }}">
                                <img class="svg-bg" width="auto" height="100"  src="{{ $item->image }}" title="{{ $item->name }}" alt="{{ $item->name }}" />
                            </a>
                        </div>
                        <a rel="license" target="_blank" href="https://creativecommons.org/publicdomain/zero/1.0/"><img src="https://licensebuttons.net/p/zero/1.0/80x15.png" style="border-style: none;" alt="CC0"></a>
                    </div>
                @empty
                    <h3>This tag didn't have any svg</h3>
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
