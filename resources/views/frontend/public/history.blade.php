@extends('layouts.frontend')

@section('content')
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="colored">
                        <h1 class="page-title">History Novel</h1>
                        <div class="breadcum-items">
                            <span class="item"><a href="{{ route('frontend.public.index') }}">Home /</a></span>
                            <span class="item colored">History Novel</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--site-banner-->

    <section class="padding-medium">
        <div class="container">
            <div class="row">
                @if($chapter)
                    <div class="col-md-3">
                        <div class="product-item">
                            <figure class="product-style">
                                <span
                                    class="badge bg-primary position-absolute z-3 mt-2">⭐ {{ $chapter->post->rate }}</span>
                                <span
                                    class="badge bg-primary position-absolute top-0 end-0 z-3 mt-2"><strong>{{ formatNumber($chapter->post->view_number) }}</strong> Views</span>
                                <a href="{{ route('frontend.public.chapter', $chapter->slug) }}">
                                    <img src="{{ $chapter->post->storage_link ? $chapter->post->storage_link : $chapter->post->image }}" title="{{ $chapter->post->name }}"
                                         alt="{{ $chapter->post->name }}" class="product-item">
                                </a>
                            </figure>
                            <figcaption>
                                <a href="{{ route('frontend.public.chapter', $chapter->slug) }}">
                                    <h3>{{ $chapter->post->name }}</h3>
                                </a>

                                <p>{{ $chapter->post->short_description }}</p>
                                <p><strong>Chapter:</strong> {{ $chapter->name }}</p>
                            </figcaption>
                        </div>
                    </div>
                @else
                    <h3>History is empty</h3>
                @endif


            </div>

        </div>
    </section>

@endsection
