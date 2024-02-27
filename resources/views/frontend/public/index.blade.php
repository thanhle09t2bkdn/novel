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
        </div>
    </section>

    <section id="quotation" class="align-center pb-5 mb-5">
        <div class="inner-content">
            <h2 class="section-title divider">Quote of the day</h2>
            <blockquote data-aos="fade-up">
                <q>“The more that you read, the more things you will know. The more that you learn, the more places
                    you’ll go.”</q>
                <div class="author-name">Dr. Seuss</div>
            </blockquote>
        </div>
    </section>

    <section id="special-offer" class="bookshelf pb-5 mb-5">

        <div class="section-header align-center">
            <div class="title">
                <span>Grab your opportunity</span>
            </div>
            <h2 class="section-title">Books with offer</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="inner-content">
                    <div class="product-list" data-aos="fade-up">
                        <div class="grid product-grid">
                            <div class="product-item">
                                <figure class="product-style">
                                    <img src="images/product-item5.jpg" alt="Books" class="product-item">
                                    <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to
                                        Cart
                                    </button>
                                </figure>
                                <figcaption>
                                    <h3>Simple way of piece life</h3>
                                    <span>Armor Ramsey</span>
                                    <div class="item-price">
                                        <span class="prev-price">$ 50.00</span>$ 40.00
                                    </div>
                            </div>
                            </figcaption>

                            <div class="product-item">
                                <figure class="product-style">
                                    <img src="images/product-item6.jpg" alt="Books" class="product-item">
                                    <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to
                                        Cart
                                    </button>
                                </figure>
                                <figcaption>
                                    <h3>Great travel at desert</h3>
                                    <span>Sanchit Howdy</span>
                                    <div class="item-price">
                                        <span class="prev-price">$ 30.00</span>$ 38.00
                                    </div>
                            </div>
                            </figcaption>

                            <div class="product-item">
                                <figure class="product-style">
                                    <img src="images/product-item7.jpg" alt="Books" class="product-item">
                                    <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to
                                        Cart
                                    </button>
                                </figure>
                                <figcaption>
                                    <h3>The lady beauty Scarlett</h3>
                                    <span>Arthur Doyle</span>
                                    <div class="item-price">
                                        <span class="prev-price">$ 35.00</span>$ 45.00
                                    </div>
                            </div>
                            </figcaption>

                            <div class="product-item">
                                <figure class="product-style">
                                    <img src="images/product-item8.jpg" alt="Books" class="product-item">
                                    <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to
                                        Cart
                                    </button>
                                </figure>
                                <figcaption>
                                    <h3>Once upon a time</h3>
                                    <span>Klien Marry</span>
                                    <div class="item-price">
                                        <span class="prev-price">$ 25.00</span>$ 35.00
                                    </div>
                            </div>
                            </figcaption>

                            <div class="product-item">
                                <figure class="product-style">
                                    <img src="images/product-item2.jpg" alt="Books" class="product-item">
                                    <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to
                                        Cart
                                    </button>
                                </figure>
                                <figcaption>
                                    <h3>Simple way of piece life</h3>
                                    <span>Armor Ramsey</span>
                                    <div class="item-price">$ 40.00</div>
                                </figcaption>
                            </div>
                        </div><!--grid-->
                    </div>
                </div><!--inner-content-->
            </div>
        </div>
    </section>

    <section id="subscribe">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-md-8">
                    <div class="row">

                        <div class="col-md-6">

                            <div class="title-element">
                                <h2 class="section-title divider">Subscribe to our newsletter</h2>
                            </div>

                        </div>
                        <div class="col-md-6">

                            <div class="subscribe-content" data-aos="fade-up">
                                <p>Sed eu feugiat amet, libero ipsum enim pharetra hac dolor sit amet, consectetur. Elit
                                    adipiscing enim pharetra hac.</p>
                                <form id="form">
                                    <input type="text" name="email" placeholder="Enter your email addresss here">
                                    <button class="btn-subscribe">
                                        <span>send</span>
                                        <i class="icon icon-send"></i>
                                    </button>
                                </form>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <section id="latest-blog" class="py-5 my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="section-header align-center">
                        <div class="title">
                            <span>Read our articles</span>
                        </div>
                        <h2 class="section-title">Latest Articles</h2>
                    </div>

                    <div class="row">

                        <div class="col-md-4">

                            <article class="column" data-aos="fade-up">

                                <figure>
                                    <a href="#" class="image-hvr-effect">
                                        <img src="images/post-img1.jpg" alt="post" class="post-image">
                                    </a>
                                </figure>

                                <div class="post-item">
                                    <div class="meta-date">Mar 30, 2021</div>
                                    <h3><a href="#">Reading books always makes the moments happy</a></h3>

                                    <div class="links-element">
                                        <div class="categories">inspiration</div>
                                        <div class="social-links">
                                            <ul>
                                                <li>
                                                    <a href="#"><i class="icon icon-facebook"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="icon icon-twitter"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="icon icon-behance-square"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div><!--links-element-->

                                </div>
                            </article>

                        </div>
                        <div class="col-md-4">

                            <article class="column" data-aos="fade-up" data-aos-delay="200">
                                <figure>
                                    <a href="#" class="image-hvr-effect">
                                        <img src="images/post-img2.jpg" alt="post" class="post-image">
                                    </a>
                                </figure>
                                <div class="post-item">
                                    <div class="meta-date">Mar 29, 2021</div>
                                    <h3><a href="#">Reading books always makes the moments happy</a></h3>

                                    <div class="links-element">
                                        <div class="categories">inspiration</div>
                                        <div class="social-links">
                                            <ul>
                                                <li>
                                                    <a href="#"><i class="icon icon-facebook"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="icon icon-twitter"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="icon icon-behance-square"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div><!--links-element-->

                                </div>
                            </article>

                        </div>
                        <div class="col-md-4">

                            <article class="column" data-aos="fade-up" data-aos-delay="400">
                                <figure>
                                    <a href="#" class="image-hvr-effect">
                                        <img src="images/post-img3.jpg" alt="post" class="post-image">
                                    </a>
                                </figure>
                                <div class="post-item">
                                    <div class="meta-date">Feb 27, 2021</div>
                                    <h3><a href="#">Reading books always makes the moments happy</a></h3>

                                    <div class="links-element">
                                        <div class="categories">inspiration</div>
                                        <div class="social-links">
                                            <ul>
                                                <li>
                                                    <a href="#"><i class="icon icon-facebook"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="icon icon-twitter"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="icon icon-behance-square"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div><!--links-element-->

                                </div>
                            </article>

                        </div>

                    </div>

                    <div class="row">

                        <div class="btn-wrap align-center">
                            <a href="#" class="btn btn-outline-accent btn-accent-arrow" tabindex="0">Read All Articles<i
                                    class="icon icon-ns-arrow-right"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection
