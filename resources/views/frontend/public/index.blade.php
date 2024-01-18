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
                <p class="mb-2">Free SVG downloads for seamless project enhancement. Click, download, create effortlessly!</p>
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
    <!-- Class Start -->
    <div class="container-fluid pt-2 min-vh-100">
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
            <div class="row">
                <!-- Banner 728x90 -->
                @if(env('APP_ENV', 'local') == 'prod')
                    <script type="text/javascript">
                        atOptions = {
                            'key' : '0eb6d15eb7cffb0f34fcc665fc431153',
                            'format' : 'iframe',
                            'height' : 90,
                            'width' : 728,
                            'params' : {}
                        };
                        document.write('<scr' + 'ipt type="text/javascript" src="//www.topcreativeformat.com/0eb6d15eb7cffb0f34fcc665fc431153/invoke.js"></scr' + 'ipt>');
                    </script>
                @endif
            </div>
        </div>
    </div>
    <!-- Class End -->

@endsection
