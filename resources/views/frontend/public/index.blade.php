@extends('layouts.frontend')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-primary px-0 px-md-5 mb-5">
        <div class="row align-items-center px-3">
            <div class="col-lg-6 text-center text-lg-left">
                <p class="font-italic text-white">
                    "Chương trình học tập thường được thiết kế linh hoạt để đáp ứng nhu cầu học tập của từng học sinh, từ việc củng cố kiến thức cơ bản đến việc phát triển kỹ năng ngôn ngữ và giao tiếp."
                </p>
                <p class="font-italic text-white mt-5">
                    "Giúp học sinh làm quen với các dạng đề thi, rèn kỹ năng làm bài, và tăng cường tự tin trong việc sử dụng tiếng Anh."
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
                            <h4>Giới Thiệu Chung</h4>
                            <p class="m-0">
                                Là một địa điểm giáo dục nhằm cung cấp bổ sung kiến thức và kỹ năng tiếng Anh cho học sinh ở các khối cấp 1, 2, 3.
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
                            <h4>Tâm Huyết và Nhiệt Huyết</h4>
                            <p class="m-0">
                                Được biết đến với sự nhiệt huyết cao và lòng đam mê với việc truyền đạt kiến thức tiếng Anh tạo nên môi trường học thuận lợi và đầy sáng tạo.
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
                            class="flaticon-030-crayons h1 font-weight-normal text-primary mb-3"
                        ></i>
                        <div class="pl-4">
                            <h4>Phong Cách Giảng Dạy</h4>
                            <p class="m-0">
                                Phương pháp giảng dạy rất linh hoạt và đa dạng, kết hợp giữa các hoạt động nhóm, thảo luận và sử dụng công nghệ giáo dục để làm cho bài học trở nên thú vị và gần gũi với thực tế.
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
                            class="flaticon-017-toy-car h1 font-weight-normal text-primary mb-3"
                        ></i>
                        <div class="pl-4">
                            <h4>Tổ Chức Sự Kiện và Hoạt Động Ngoại Khóa</h4>
                            <p class="m-0">
                                Ngoài giảng dạy, việc tổ chức nhiều sự kiện và hoạt động ngoại khóa điều này giúp học sinh cảm thấy tiếp xúc với ngôn ngữ tiếng Anh một cách tự nhiên và thú vị hơn.
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
                            class="flaticon-025-sandwich h1 font-weight-normal text-primary mb-3"
                        ></i>
                        <div class="pl-4">
                            <h4>Mối Quan Hệ Học Sinh - Giáo Viên</h4>
                            <p class="m-0">
                                Không chỉ là người hướng dẫn mà còn là người bạn đồng hành, lluôn lắng nghe và chia sẻ, tạo ra một môi trường học thuận lợi cho sự phát triển toàn diện của học sinh.
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
                            <h4>Tầm Ảnh Hưởng</h4>
                            <p class="m-0">
                                Không chỉ là một người hướng dẫn mà còn là nguồn động viên và tầm ảnh hưởng tích cực đối với học sinh.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Facilities Start -->

    <!-- Blog Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <h1 class="mb-4">Tuyển Tập Đề Kiểm Tra Mới Nhất</h1>
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
    <!-- Class Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <h1 class="mb-4">Sách Có Audio</h1>
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
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-6 text-center team mb-5">
                    <div
                        class="position-relative overflow-hidden mb-4 rounded-circle"
                    >
                        <img class="img-fluid rounded-circle" src="{{ asset('user/img/thang.png') }}" alt="thắng phan"/>
                        <div
                            class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute"
                        >
                            <a
                                class="btn btn-outline-light text-center mr-2 px-0"
                                style="width: 38px; height: 38px"
                                href="https://www.facebook.com/thang.phanlucky" target="_blank"
                            ><i class="fab fa-facebook-f"></i
                                ></a>
                        </div>
                    </div>
                    <h4>Phan Thắng</h4>
                    <i>Giáo Viên Tiếng Anh</i>
                </div>
                <div class="col-md-6 col-lg-6 text-center team mb-5">
                    <div
                        class="position-relative overflow-hidden mb-4 rounded-circle"
                    >
                        <img class="img-fluid rounded-circle" src="{{ asset('user/img/anh.png') }}" alt="anh trần"/>
                        <div
                            class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute"
                        >
                            <a
                                class="btn btn-outline-light text-center mr-2 px-0"
                                style="width: 38px; height: 38px"
                                href="https://www.facebook.com/phucanh.tran.96" target="_blank"
                            ><i class="fab fa-facebook-f"></i
                                ></a>
                        </div>
                    </div>
                    <h4>Trần Thị Phúc Anh</h4>
                    <i>Giáo Viên Tiếng Anh</i>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->

@endsection
