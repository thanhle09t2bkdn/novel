@extends('layouts.frontend')

@section('content')
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="colored">
                        <h1 class="page-title">Most Popular Novel</h1>
                        <div class="breadcum-items">
                            <span class="item"><a href="{{ route('frontend.public.index') }}">Home /</a></span>
                            <span class="item colored">Most Popular Novel</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--site-banner-->

    <section class="padding-medium">
        <div class="container">
            <div class="row">
                @forelse ($list as $item)
                    <div class="col-md-3">
                        <div class="product-item">
                            <figure class="product-style">
                                <span class="badge bg-primary position-absolute z-3 mt-2">⭐ {{ $item->rate }}</span>
                                <span class="badge bg-primary position-absolute top-0 end-0 z-3 mt-2"><strong>{{ formatNumber($item->view_number) }}</strong> Views</span>
                                <a href="{{ route('frontend.public.svg', $item->slug) }}">
                                    <img src="{{ $item->image }}" title="{{ $item->name }}" alt="{{ $item->name }}" class="product-item">
                                </a>
                            </figure>
                            <figcaption>
                                <a href="{{ route('frontend.public.svg', $item->slug) }}">
                                    <h3>{{ $item->name }}</h3>
                                </a>

                                <p>{{ $item->short_description }}</p>
                            </figcaption>
                        </div>
                    </div>
                @empty
                    <h3>This tag didn't have any svg</h3>
                @endforelse


            </div>

            <div class="row">

                <nav aria-label="Page navigation" class="mt-5">
                    {{ $list->withQueryString()->links() }}
                </nav>
            </div>

        </div>
    </section>

@endsection
