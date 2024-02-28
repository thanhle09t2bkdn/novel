@extends('layouts.frontend')

@section('content')
    <section id="billboard">

        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <button class="prev slick-arrow">
                        <i class="icon icon-arrow-left"></i>
                    </button>

                    <div class="main-slider pattern-overlay">
                        @foreach($slidePosts as $post)
                            <div class="slider-item">
                                <div class="banner-content">
                                    <h2>{{ $post->name }}</h2>
                                    <p>{{ $post->short_description }}</p>
                                    <div class="btn-wrap">
                                        <a href="{{ route('frontend.public.svg', $post->slug) }}"
                                           class="btn btn-outline-accent btn-accent-arrow">Read More<i
                                                class="icon icon-ns-arrow-right"></i></a>
                                    </div>
                                </div><!--banner-content-->
                                <img src="{{ $post->image }}" alt="{{ $post->name }}" class="banner-image">
                            </div><!--slider-item-->
                        @endforeach



                    </div><!--slider-->

                    <button class="next slick-arrow">
                        <i class="icon icon-arrow-right"></i>
                    </button>

                </div>
            </div>
        </div>

    </section>

    <section id="featured-books" class="py-5 my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="section-header align-center">
                        <div class="title">
                            <span>Some quality items</span>
                        </div>
                        <h2 class="section-title">Latest Novel</h2>
                    </div>

                    <div class="product-list" data-aos="fade-up">
                        <div class="row">
                            @foreach($latestPosts as $post)
                                <div class="col-md-3">
                                    <div class="product-item">
                                        <figure class="product-style">
                                            <a href="{{ route('frontend.public.svg', $post->slug) }}" title="{{ $post->name }}">
                                                <img src="{{ $post->image }}" alt="{{ $post->name }}" class="product-item">
                                            </a>

                                            <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to
                                                Cart
                                            </button>
                                        </figure>
                                        <figcaption>
                                            <h3>{{ $post->name }}</h3>
                                            <span>{{ $post->short_description }}</span>
                                        </figcaption>
                                    </div>
                                </div>
                            @endforeach

                        </div><!--ft-books-slider-->
                    </div><!--grid-->


                </div><!--inner-content-->
            </div>

            <div class="row">
                <div class="col-md-12">

                    <div class="btn-wrap align-right">
                        <a href="#" class="btn-accent-arrow">View all products <i
                                class="icon icon-ns-arrow-right"></i></a>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section id="best-selling" class="leaf-pattern-overlay">
        <div class="corner-pattern-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-md-8">

                    <div class="row">

                        <div class="col-md-6">
                            <figure class="products-thumb">
                                <img src="{{ $bestPost->image }}" alt="{{ $bestPost->name }}" class="single-image">
                            </figure>
                        </div>

                        <div class="col-md-6">
                            <div class="product-entry">
                                <h2 class="section-title divider">Best Novel</h2>

                                <div class="products-content">
                                    <div class="author-name">By {{ $bestPost->author }}</div>
                                    <h3 class="item-title">{{ $bestPost->name }}</h3>
                                    <p>{{ $bestPost->description }}</p>
                                    <div class="btn-wrap">
                                        <a href="{{ route('frontend.public.svg', $bestPost->slug) }}" class="btn-accent-arrow">shop it now <i
                                                class="icon icon-ns-arrow-right"></i></a>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <!-- / row -->

                </div>

            </div>
        </div>
    </section>

    <section id="popular-books" class="bookshelf py-5 my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="section-header align-center">
                        <div class="title">
                            <span>Some quality items</span>
                        </div>
                        <h2 class="section-title">Latest Novel</h2>
                    </div>

                    <div class="product-list" data-aos="fade-up">
                        <div class="row">
                            @foreach($popularPosts as $post)
                                <div class="col-md-3">
                                    <div class="product-item">
                                        <figure class="product-style">
                                            <a href="{{ route('frontend.public.svg', $post->slug) }}"
                                               title="{{ $post->name }}">
                                                <img src="{{ $post->image }}" alt="{{ $post->name }}"
                                                     class="product-item">
                                            </a>

                                            <button type="button" class="add-to-cart" data-product-tile="add-to-cart">
                                                Add to
                                                Cart
                                            </button>
                                        </figure>
                                        <figcaption>
                                            <h3>{{ $post->name }}</h3>
                                            <span>{{ $post->short_description }}</span>
                                        </figcaption>
                                    </div>
                                </div>
                            @endforeach

                        </div><!--ft-books-slider-->
                    </div><!--grid-->


                </div><!--inner-content-->

            </div>
        </div>
    </section>

    <section id="quotation" class="align-center pb-5 mb-5">
        <div class="inner-content">
            <h2 class="section-title divider">Quote of the day</h2>
            <blockquote data-aos="fade-up">
                <q>Novel Saw website is a platform where you can enjoy free and diverse fiction online.</q>
                <div class="author-name">Tony</div>
            </blockquote>
        </div>
    </section>

    <section class="bookshelf py-5 my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="section-header align-center">
                        <div class="title">
                            <span>Some quality items</span>
                        </div>
                        <h2 class="section-title">Latest Chapter Releases</h2>
                    </div>

                    <div class="product-list" data-aos="fade-up">
                        <div class="row">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Novel Name</th>
                                    <th scope="col">Chapter</th>
                                    <th scope="col">Posted At</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($latestChapters as $chapter)
                                    <tr>
                                        <td><a href="{{ route('frontend.public.chapter', $chapter->slug) }}"
                                               title="{{ $chapter->post_name }}"
                                               class="text-decoration-none text-dark hover-title"><img src="{{ $chapter->post_image }}" alt="{{ $chapter->post_name }}" class="product-item">{{ $chapter->post_name }}</a></td>
                                        <td><a href="{{ route('frontend.public.chapter', $chapter->slug) }}"
                                               title="{{ $chapter->name }}"
                                               class="text-decoration-none text-dark hover-title">{{ $chapter->name }}</a></td>
                                        <td>{{ $chapter->created_at }}</td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>

                        </div><!--ft-books-slider-->
                    </div><!--grid-->


                </div><!--inner-content-->

            </div>
        </div>
    </section>

@endsection
