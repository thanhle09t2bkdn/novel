@extends('layouts.frontend')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-primary mb-5">
        <div
            class="d-flex flex-column align-items-center justify-content-center"
            style="min-height: 400px"
        >
            <h3 class="display-3 font-weight-bold text-white">Đề Thi</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0"><a class="text-white" href="{{ route('frontend.public.index') }}">Trang Chủ</a></p>
                <p class="m-0 px-2">/</p>
                <p class="m-0">{{ $category->name }}</p>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <h1 class="mb-4">Đề thi mới nhất</h1>
            </div>
            <div class="row pb-3">
                @forelse ($list as $item)
                    <div class="col-lg-4 mb-4">
                        <div class="card border-0 shadow-sm mb-2">
                            <img class="card-img-top mb-2" src="{{ $item->image }}" alt="{{ $item->name }}" />
                            <div class="card-body bg-light text-center p-4">
                                <h4 class="">{{ $item->name }}</h4>
                                <div class="d-flex justify-content-center mb-3">
                                    <small class="mr-3"
                                    ><i class="fa fa-user text-primary"></i> Thầy Thắng</small
                                    >
                                    <small class="mr-3"
                                    ><i class="fa fa-folder text-primary"></i> {{ $category->name }}</small
                                    >
                                    <small class="mr-3"
                                    ><i class="fa fa-comments text-primary"></i> 15</small
                                    >
                                </div>
                                <p>
                                    {{ $item->description }}
                                </p>
                                <a href="{{ $item->type == \App\Models\Post::QUIZ_TYPE ? route('frontend.public.quiz', $item->slug) : route('frontend.public.single', $item->slug) }}" class="btn btn-primary px-4 mx-auto my-2"
                                >Chi tiết</a
                                >
                            </div>
                        </div>
                    </div>
                @empty
                    <h3>Hiện tại không có bài đăng nào</h3>
                @endforelse
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <nav aria-label="Page navigation">
                        {{ $list->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
