@extends('layouts.frontend')

@section('content')
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="colored">
                        <h1 class="page-title">Hot Novel</h1>
                        <div class="breadcum-items">
                            <span class="item"><a href="{{ route('frontend.public.index') }}">Home /</a></span>
                            <span class="item colored">Hot Novel</span>
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
                                <a href="{{ route('frontend.public.svg', $item->slug) }}">
                                    <img src="{{ $item->image }}" title="{{ $item->name }}" alt="{{ $item->name }}" class="product-item">
                                </a>

                                <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to Cart</button>
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
