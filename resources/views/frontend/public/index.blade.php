@extends('layouts.frontend')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-primary px-0 px-md-5 mb-5">
        <div class="row align-items-center px-3">
            <div class="col-lg-6 text-center text-lg-left">
                <h4 class="text-white mb-4 mt-5 mt-lg-0">Thầy Giáo Tiếng Anh</h4>
                <h1 class="display-3 font-weight-bold text-white">
                    Người Hướng Dẫn Sáng Tạo và Nhiệt Huyết
                </h1>
                <p class="text-white mb-4">
                    Thầy Thắng là một giáo viên tiếng Anh dành cho học sinh cấp 2 và cấp 3. Với kinh nghiệm giảng dạy và tâm huyết với nghệ thuật giáo dục, thầy Thắng không chỉ là một người hướng dẫn mà còn là nguồn động viên lớn cho học sinh.
                </p>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <img class="img-fluid" src="{{ asset('user/img/header.png') }}" alt=""/>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Facilities Start -->
    <div class="container-fluid pt-5">
        <div class="container pb-3">
            <div class="row">
                <div class="col-lg-4 col-md-6 pb-1">
                    <div
                        class="d-flex bg-light shadow-sm border-top rounded mb-4"
                        style="padding: 30px"
                    >
                        <i
                            class="flaticon-050-fence h1 font-weight-normal text-primary mb-3"
                        ></i>
                        <div class="pl-4">
                            <h4>Tâm Huyết và Nhiệt Huyết</h4>
                            <p class="m-0">
                                Thầy Thắng được biết đến với sự nhiệt huyết cao và lòng đam mê với việc truyền đạt kiến thức tiếng Anh.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pb-1">
                    <div
                        class="d-flex bg-light shadow-sm border-top rounded mb-4"
                        style="padding: 30px"
                    >
                        <i
                            class="flaticon-022-drum h1 font-weight-normal text-primary mb-3"
                        ></i>
                        <div class="pl-4">
                            <h4>Phong Cách Giảng Dạy</h4>
                            <p class="m-0">
                                Phương pháp giảng dạy của thầy Thắng  rất linh hoạt và đa dạng.
                                <br/>
                                <br/>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pb-1">
                    <div
                        class="d-flex bg-light shadow-sm border-top rounded mb-4"
                        style="padding: 30px"
                    >
                        <i
                            class="flaticon-047-backpack h1 font-weight-normal text-primary mb-3"
                        ></i>
                        <div class="pl-4">
                            <h4>Tổ Chức Sự Kiện và Hoạt Động Ngoại Khóa</h4>
                            <p class="m-0">
                                Ngoài giảng dạy, thầy Thắng còn là người tổ chức nhiều sự kiện và hoạt động ngoại khóa
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Facilities Start -->

    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <img
                        class="img-fluid rounded mb-5 mb-lg-0"
                        src="{{ asset('user/img/about.png') }}"
                        alt=""
                    />
                </div>
                <div class="col-lg-7">
                    <h1 class="mb-4">Chia sẻ</h1>
                    <p>
                        Thầy Thắng Không chỉ là một người giảng dạy mà còn là người đồng hành và nguồn động viên cho học sinh. Bằng sự nhiệt huyết và tâm huyết của mình, thầy đã góp phần quan trọng vào sự phát triển toàn diện của các em, làm cho học tiếng Anh trở nên thú vị và ý nghĩa.
                    </p>
                    <div class="row pt-2 pb-4">
                        <div class="col-6 col-md-4">
                            <img class="img-fluid rounded" src="{{ asset('user/img/about-2.jpg') }}" alt=""/>
                        </div>
                        <div class="col-6 col-md-8">
                            <ul class="list-inline m-0">
                                <li class="py-2 border-top border-bottom">
                                    <i class="fa fa-check text-primary mr-3"></i>Labore eos amet
                                    dolor amet diam
                                </li>
                                <li class="py-2 border-bottom">
                                    <i class="fa fa-check text-primary mr-3"></i>Etsea et sit
                                    dolor amet ipsum
                                </li>
                                <li class="py-2 border-bottom">
                                    <i class="fa fa-check text-primary mr-3"></i>Diam dolor diam
                                    elitripsum vero.
                                </li>
                            </ul>
                        </div>
                    </div>
                    <a href="" class="btn btn-primary mt-2 py-2 px-4">Learn More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Class Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <h1 class="mb-4">Sách mới xuất bản</h1>
            </div>
            <div class="row">
                @foreach($books as $book)
                    <div class="col-lg-4 mb-5">
                        <div class="card border-0 bg-light shadow-sm pb-2">
                            <img class="card-img-top mb-2" src="{{ $book->image }}" alt="{{ $book->name }}"/>
                            <div class="card-body text-center">
                                <h4 class="card-title">{{ $book->name }}</h4>
                                <p class="card-text">
                                    {{ $book->description }}
                                </p>
                            </div>
                            <a href="{{ route('frontend.public.single', $book->slug) }}" class="btn btn-primary px-4 mx-auto mb-4">Xem Ngay</a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- Class End -->

    <!-- Team Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <h1 class="mb-4">Hạnh phúc khi các bạn đồng hành cùng chúng tôi!</h1>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-6 text-center team mb-5">
                    <div
                        class="position-relative overflow-hidden mb-4"
                        style="border-radius: 100%"
                    >
                        <img class="img-fluid w-100" src="{{ asset('user/img/team-1.jpg') }}" alt="anh trần"/>
                        <div
                            class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute"
                        >
                            <a
                                class="btn btn-outline-light text-center mr-2 px-0"
                                style="width: 38px; height: 38px"
                                href="#"
                            ><i class="fab fa-twitter"></i
                                ></a>
                            <a
                                class="btn btn-outline-light text-center mr-2 px-0"
                                style="width: 38px; height: 38px"
                                href="#"
                            ><i class="fab fa-facebook-f"></i
                                ></a>
                            <a
                                class="btn btn-outline-light text-center px-0"
                                style="width: 38px; height: 38px"
                                href="#"
                            ><i class="fab fa-linkedin-in"></i
                                ></a>
                        </div>
                    </div>
                    <h4>Anh Trần</h4>
                    <i>Giáo Viên Tiếng Anh</i>
                </div>
                <div class="col-md-6 col-lg-6 text-center team mb-5">
                    <div
                        class="position-relative overflow-hidden mb-4"
                        style="border-radius: 100%"
                    >
                        <img class="img-fluid w-100" src="{{ asset('user/img/team-2.jpg') }}" alt="thắng phan"/>
                        <div
                            class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute"
                        >
                            <a
                                class="btn btn-outline-light text-center mr-2 px-0"
                                style="width: 38px; height: 38px"
                                href="#"
                            ><i class="fab fa-twitter"></i
                                ></a>
                            <a
                                class="btn btn-outline-light text-center mr-2 px-0"
                                style="width: 38px; height: 38px"
                                href="#"
                            ><i class="fab fa-facebook-f"></i
                                ></a>
                            <a
                                class="btn btn-outline-light text-center px-0"
                                style="width: 38px; height: 38px"
                                href="#"
                            ><i class="fab fa-linkedin-in"></i
                                ></a>
                        </div>
                    </div>
                    <h4>Thắng Phan</h4>
                    <i>Giáo Viên Tiếng Anh</i>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->

    <!-- Testimonial Start -->
    <div class="container-fluid py-5">
        <div class="container p-0">
            <div class="text-center pb-2">
                <h1 class="mb-4">Nhận xét từ học viên</h1>
            </div>
            <div class="owl-carousel testimonial-carousel">
                <div class="testimonial-item px-3">
                    <div class="bg-light shadow-sm rounded mb-4 p-4">
                        <h3 class="fas fa-quote-left text-primary mr-3"></h3>
                        Sed ea amet kasd elitr stet, stet rebum et ipsum est duo elitr
                        eirmod clita lorem. Dolor tempor ipsum clita
                    </div>
                    <div class="d-flex align-items-center">
                        <img
                            class="rounded-circle"
                            src="{{ asset('user/img/testimonial-1.jpg') }}"
                            style="width: 70px; height: 70px"
                            alt="Image"
                        />
                        <div class="pl-3">
                            <h5>Parent Name</h5>
                            <i>Profession</i>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item px-3">
                    <div class="bg-light shadow-sm rounded mb-4 p-4">
                        <h3 class="fas fa-quote-left text-primary mr-3"></h3>
                        Sed ea amet kasd elitr stet, stet rebum et ipsum est duo elitr
                        eirmod clita lorem. Dolor tempor ipsum clita
                    </div>
                    <div class="d-flex align-items-center">
                        <img
                            class="rounded-circle"
                            src="{{ asset('user/img/testimonial-2.jpg') }}"
                            style="width: 70px; height: 70px"
                            alt="Image"
                        />
                        <div class="pl-3">
                            <h5>Parent Name</h5>
                            <i>Profession</i>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item px-3">
                    <div class="bg-light shadow-sm rounded mb-4 p-4">
                        <h3 class="fas fa-quote-left text-primary mr-3"></h3>
                        Sed ea amet kasd elitr stet, stet rebum et ipsum est duo elitr
                        eirmod clita lorem. Dolor tempor ipsum clita
                    </div>
                    <div class="d-flex align-items-center">
                        <img
                            class="rounded-circle"
                            src="{{ asset('user/img/testimonial-3.jpg') }}"
                            style="width: 70px; height: 70px"
                            alt="Image"
                        />
                        <div class="pl-3">
                            <h5>Parent Name</h5>
                            <i>Profession</i>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item px-3">
                    <div class="bg-light shadow-sm rounded mb-4 p-4">
                        <h3 class="fas fa-quote-left text-primary mr-3"></h3>
                        Sed ea amet kasd elitr stet, stet rebum et ipsum est duo elitr
                        eirmod clita lorem. Dolor tempor ipsum clita
                    </div>
                    <div class="d-flex align-items-center">
                        <img
                            class="rounded-circle"
                            src="{{ asset('user/img/testimonial-4.jpg') }}"
                            style="width: 70px; height: 70px"
                            alt="Image"
                        />
                        <div class="pl-3">
                            <h5>Parent Name</h5>
                            <i>Profession</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->

    <!-- Blog Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <h1 class="mb-4">Chuyên Đề Mới Nhất</h1>
            </div>
            <div class="row pb-3">
                @foreach($posts as $post)
                    <div class="col-lg-4 mb-4">
                        <div class="card border-0 shadow-sm mb-2">
                            <img class="card-img-top mb-2" src="{{ $post->image }}" alt="{{ $post->name }}"/>
                            <div class="card-body bg-light text-center p-4">
                                <h4 class="">{{ $post->name }}</h4>
                                <div class="d-flex justify-content-center mb-3">
                                    <small class="mr-3"
                                    ><i class="fa fa-user text-primary"></i> Thầy Thắng</small
                                    >
                                    <small class="mr-3"
                                    ><i class="fa fa-folder text-primary"></i> {{ $post->category->name }}</small
                                    >
                                    <small class="mr-3"
                                    ><i class="fa fa-comments text-primary"></i> 15</small
                                    >
                                </div>
                                <p>
                                    {{ $post->description }}
                                </p>
                                <a href="{{ route('frontend.public.single', $post->slug) }}" class="btn btn-primary px-4 mx-auto my-2"
                                >Chi tiết</a
                                >
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Blog End -->
@endsection
