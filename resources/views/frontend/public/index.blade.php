@extends('layouts.frontend')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-primary mb-5">
        <div
            class="d-flex flex-column align-items-center justify-content-center"
            style="min-height: 300px"
        >
            <h3 class="display-3 font-weight-bold text-white">Free SVG Files</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0">Find stunning free SVG images and incorporate them into your projects. Instantly create jaw-dropping vectors, designs, and more with Pixelied!</p>
            </div>
            <form method="get" action="">
                <div class="input-group">
                    <input name="search" type="text" class="form-control form-control-lg" placeholder="Search SVG">
                    <div class="input-group-append">
                        <span class="input-group-text bg-transparent text-primary"><i class="fa fa-search"></i></span>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Header End -->
    <!-- Class Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <p class="section-title px-5">
                    <span class="px-2">Popular Collection</span>
                </p>
                <h1 class="mb-4">SVG Icons</h1>
            </div>
            <div class="row">
                @foreach($categories as $category)
                    <div class="col-lg-4 mb-5">
                        <div class="card border-0 bg-light shadow-sm pb-2">
                            <img class="card-img-top mb-2" src="https://tienganhthaythang.com/storage/photos/bf075c0a-91bd-4aaa-a531-098020f9c42f/5_DE_KTRA_CUOI_KI_2_LOP_7.png" alt="" />
                            <div class="card-body text-center">
                                <h6 class="card-title">{{ $category->name }}</h6>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- Class End -->

@endsection
