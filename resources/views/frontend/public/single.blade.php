@extends('layouts.frontend')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-primary mb-5">
        <div
            class="d-flex flex-column align-items-center justify-content-center"
            style="min-height: 400px"
        >
            <h3 class="display-3 font-weight-bold text-white">{{ $post->type == \App\Models\Post::BOOK_TYPE ? 'Sách' : 'Chuyên đề' }}</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0"><a class="text-white" href="{{ route('frontend.public.index') }}">Trang Chủ</a></p>
                <p class="m-0 px-2">/</p>
                <p class="m-0">{{ $post->name }}</p>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Detail Start -->
    <div class="container py-5">
        <div class="row pt-5">
            <div class="col-lg-8">
                <div class="d-flex flex-column text-left mb-3">
                    <h1 class="mb-3">{{ $post->name }}</h1>
                    <div class="d-flex">
                        <p class="mr-3"><i class="fa fa-user text-primary"></i> Thầy Thắng</p>
                        <p class="mr-3">
                            <i class="fa fa-folder text-primary"></i> {{ $post->category->name }}
                        </p>
                        <p class="mr-3"><i class="fa fa-comments text-primary"></i> 15</p>
                        <p class="mr-3">Ngày đăng: {{ date('d-m-Y H:i:s', strtotime($post->created_at)) }}</p>
                    </div>
                </div>
                <div class="mb-5">
                    <img
                        class="img-fluid rounded w-100 mb-4"
                        src="{{ $post->image }}"
                        alt="Image"
                    />
                    {!! $post->content  !!}
                </div>

                <!-- Related Post -->
                <div class="mb-5 mx-n3">
                    <h2 class="mb-4 ml-3">Bài viết liên quan</h2>
                    <div class="owl-carousel post-carousel position-relative">
                        @foreach($relatedPosts as $relatedPost)
                            <div
                                class="d-flex align-items-center bg-light shadow-sm rounded overflow-hidden mx-3"
                            >
                                <a href="{{ route('frontend.public.single', $post->slug) }}">
                                    <img
                                        class="img-fluid"
                                        src="{{ $relatedPost->image }}"
                                        style="width: 80px; height: 80px"
                                    />
                                </a>
                                <div class="pl-3">
                                    <h5 class=""><a href="{{ route('frontend.public.single', $post->slug) }}">{{ $relatedPost->name }}</a></h5>
                                    <div class="d-flex">
                                        <small class="mr-3"
                                        ><i class="fa fa-user text-primary"></i> Thầy Thắng</small
                                        >
                                        <small class="mr-3"
                                        ><i class="fa fa-folder text-primary"></i> {{ $relatedPost->category->name }}
                                        </small
                                        >
                                        <small class="mr-3"
                                        ><i class="fa fa-comments text-primary"></i> 15</small
                                        >
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

            </div>

            <div class="col-lg-4 mt-5 mt-lg-0">
                <!-- Author Bio -->
                <div
                    class="d-flex flex-column text-center bg-primary rounded mb-5 py-5 px-4"
                >
                    <img
                        src="{{ asset('user/img/thang.png') }}"
                        class="img-fluid rounded-circle mx-auto mb-3"
                        style="width: 100px"
                    />
                    <h3 class="text-secondary mb-3">Thầy Thắng</h3>
                    <p class="text-white m-0">
                        Thầy Thắng là một giáo viên tiếng Anh dành cho học sinh cấp 2 và cấp 3. Với kinh nghiệm giảng dạy và tâm huyết với nghệ thuật giáo dục, thầy Thắng không chỉ là một người hướng dẫn mà còn là nguồn động viên lớn cho học sinh.
                    </p>
                </div>



                <!-- Single Image -->
                <div class="mb-5">
                    <img src="{{ asset('user/img/blog-1.jpg') }}" alt="" class="img-fluid rounded"/>
                </div>

                <!-- Recent Post -->
                <div class="mb-5">
                    <h2 class="mb-4">Bài đăng gần đây</h2>
                    @foreach($recentPosts as $recentPost)
                        <div
                            class="d-flex align-items-center bg-light shadow-sm rounded overflow-hidden mb-3"
                        >
                            <a href="{{ route('frontend.public.single', $post->slug) }}"><img
                                class="img-fluid"
                                src="{{ $recentPost->image }}"
                                style="width: 80px; height: 80px"
                                /></a>
                            <div class="pl-3">
                                <h5 class=""><a href="{{ route('frontend.public.single', $post->slug) }}">{{ $recentPost->name }}</a></h5>
                                <div class="d-flex">
                                    <small class="mr-3"
                                    ><i class="fa fa-user text-primary"></i> Thầy Thắng</small
                                    >
                                    <small class="mr-3"
                                    ><i class="fa fa-folder text-primary"></i> {{ $recentPost->category->name }}</small
                                    >
                                    <small class="mr-3"
                                    ><i class="fa fa-comments text-primary"></i> 15</small
                                    >
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Single Image -->
                <div class="mb-5">
                    <img src="{{ asset('user/img/blog-2.jpg') }}" alt="" class="img-fluid rounded"/>
                </div>


                <!-- Plain Text -->
                <div>
                    <h2 class="mb-4">Nhận làm đề</h2>
                    Liên hệ: 0123344334
                </div>
            </div>
        </div>
    </div>
    <!-- Detail End -->
@endsection
