@extends('layouts.frontend')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-primary mb-5">
        <div
            class="d-flex flex-column align-items-center justify-content-center"
            style="min-height: 400px"
        >
            <h3 class="display-3 font-weight-bold text-white">Sách Có Audio</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0"><a class="text-white" href="{{ route('frontend.public.index') }}">Trang Chủ</a></p>
                <p class="m-0 px-2">/</p>
                <p class="m-0">Sách Có Audio</p>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <h1 class="mb-4">Sách Có Audio</h1>
            </div>
            <div class="row pb-3">
                @forelse ($list as $item)
                    <div class="col-lg-4 mb-5">
                        <div class="card border-0 bg-light shadow-sm pb-2">
                            <img class="card-img-top mb-2" src="{{ $item->image }}" alt="{{ $item->name }}" />
                            <div class="card-body text-center">
                                <h4 class="card-title">{{ $item->name }}</h4>
                                <p class="card-text">
                                    {{ $item->description }}
                                </p>
                            </div>
                            <a href="{{ route('frontend.public.single', $item->slug) }}" class="btn btn-primary px-4 mx-auto mb-4">Xem Ngay</a>
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
