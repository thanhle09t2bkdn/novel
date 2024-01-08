@push('after-scripts')
    <script src="{{ asset('user/js/disable-right-click.js') }}"></script>
@endpush
@extends('layouts.frontend')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-primary mb-5">
        <div
            class="d-flex flex-column align-items-center justify-content-center"
            style="min-height: 400px"
        >
            <h3 class="display-3 font-weight-bold text-white">Danh sách Audio</h3>
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
                @forelse ($list as $item)
                    <div class="d-flex flex-column text-left mb-3">
                        <h1 class="mb-3">{{ $item->name }}</h1>
                        <div class="d-flex">
                            <p class="mr-3"><i class="fa fa-user text-primary"></i> Thầy Thắng</p>
                            <p class="mr-3">
                                <i class="fa fa-folder text-primary"></i> {{ $post->name }}
                            </p>
                            <p class="mr-3"><i class="fa fa-comments text-primary"></i> 15</p>
                            <p class="mr-3">Ngày đăng: {{ date('d-m-Y H:i:s', strtotime($item->created_at)) }}</p>
                        </div>
                    </div>
                    <div class="mb-5">
                        <audio controls>
                            <source src="{{ $item->link }}" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>
                    </div>
                @endforeach

                <div class="row">
                    <div class="col-sm-12">
                        <nav aria-label="Page navigation">
                            {{ $list->withQueryString()->links() }}
                        </nav>
                    </div>
                </div>

            </div>

            <div class="col-lg-4 mt-5 mt-lg-0">
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
                            <a href="{{ route('frontend.public.single', $recentPost->slug) }}"><img
                                class="img-fluid"
                                src="{{ $recentPost->image }}"
                                style="width: 80px; height: 80px"
                                /></a>
                            <div class="pl-3">
                                <h5 class=""><a href="{{ route('frontend.public.single', $recentPost->slug) }}">{{ $recentPost->name }}</a></h5>
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
            </div>
        </div>
    </div>
    <!-- Detail End -->
@endsection
