@extends('layouts.frontend')

@section('content')
    <section class="bg-sand padding-medium">
        <div class="container">
            <div class="row">

                <div class="col-md-3 text-center">
                    <a href="#" class="product-image"><img src="{{ $post->storage_link ? $post->storage_link : $post->image }}" title="{{ $post->name }}"
                                                           alt="{{ $post->name }}"></a>
                </div>

                <div class="col-md-9 pl-5">
                    <div class="product-detail">
                        <h1>{{ $post->name }}</h1>
                        <div class="story-detail__bottom mb-1">
                            <div class="row">
                                <div class="col-12">
                                    <div class="rating-container">
                                        <div class="my-rating" data-rating="{{ $post->rate }}"></div>
                                        <p><strong>{{ formatNumber($post->view_number) }}</strong> Views</p>
                                    </div>

                                    <p>
                                        <strong>Author:</strong>
                                        <span>{{ $post->author }}</span>
                                    </p>
                                    <div>
                                        <strong class="me-1">Genre:</strong>
                                        <p>
                                            @foreach($tags as $tag)
                                                <span class="badge bg-primary"><a href="{{ route('frontend.public.tag', $tag->slug) }}">
                                                    {{ $tag->name }}
                                                </a></span>

                                            @endforeach
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <p>
                            {{ $post->description }}
                        </p>


                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="product-tabs">
        <div class="container">
            <div class="row">
                <div class="tabs-listing">
                    <nav>
                        <div class="nav nav-tabs d-flex justify-content-center" id="nav-tab" role="tablist">
                            <button class="nav-link active text-uppercase px-5 py-3" id="nav-home-tab"
                                    data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab"
                                    aria-controls="nav-home" aria-selected="true">Chapters
                            </button>
                            <button class="nav-link text-uppercase px-5 py-3" id="nav-information-tab"
                                    data-bs-toggle="tab" data-bs-target="#nav-information" type="button" role="tab"
                                    aria-controls="nav-information" aria-selected="false">Latest Chapter
                            </button>
                        </div>
                    </nav>
                    <div class="tab-content py-5" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                             aria-labelledby="nav-home-tab">
                            <ul>
                                @forelse ($chapters as $chapter)
                                    <li>
                                        <a href="{{ route('frontend.public.chapter', $chapter->slug) }}"
                                           title="{{ $chapter->name }}"
                                           class="text-decoration-none text-dark hover-title">{{ $chapter->name }}</a>
                                    </li>
                                @empty
                                    <h3>This story didn't have any chapter</h3>
                                @endforelse
                            </ul>
                            <div class="row">

                                <nav aria-label="Page navigation" class="mt-5">
                                    {{ $chapters->withQueryString()->links() }}
                                </nav>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-information" role="tabpanel"
                             aria-labelledby="nav-information-tab">
                            <ul>
                                @forelse ($latestChapters as $chapter)
                                    <li>
                                        <a href="{{ route('frontend.public.chapter', $chapter->slug) }}"
                                           title="{{ $chapter->name }}"
                                           class="text-decoration-none text-dark hover-title">{{ $chapter->name }}</a>
                                    </li>
                                @empty
                                    <h3>This story didn't have any latest chapter</h3>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="related-products" class="bookshelf pb-5 mb-5">
        <div class="container">
            <div class="section-header align-center">
                <div class="title">
                    <span>Related Products</span>
                </div>
                <h2 class="section-title">You may also like</h2>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="inner-content">
                    <div class="product-list" data-aos="fade-up">
                        <div class="grid product-grid">
                            @forelse ($relatedPosts as $item)
                                <div class="product-item">
                                    <figure class="product-style">
                                        <span class="badge bg-primary position-absolute z-3 mt-2">⭐ {{ $item->rate }}</span>
                                        <span class="badge bg-primary position-absolute top-0 end-0 z-3 mt-2"><strong>{{ formatNumber($item->view_number) }}</strong> Views</span>
                                        <a href="{{ route('frontend.public.svg', $item->slug) }}">
                                            <img src="{{ $item->storage_link ? $item->storage_link : $item->image }}" title="{{ $item->name }}"
                                                 alt="{{ $item->name }}" class="product-item">
                                        </a>
                                    </figure>
                                    <figcaption>
                                        <a href="{{ route('frontend.public.svg', $item->slug) }}">
                                            <h3>{{ $item->name }}</h3>
                                        </a>

                                        <span>{{ $item->short_description }}</span>
                                    </figcaption>
                                </div>
                            @empty
                                <h3>This category didn't have any novel</h3>
                            @endforelse

                        </div><!--grid-->
                    </div>
                </div><!--inner-content-->
            </div>
        </div>
    </section>

@endsection
