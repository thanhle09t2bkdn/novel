@extends('layouts.frontend')

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-title">{{ $chapter->name }}</h1>
                    <div class="breadcrumbs">
                        <span class="item"><a href="index.html">Home /</a></span>
                        <span class="item">{{ $chapter->post->name }}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="text-center">
        <div class="">
            <a class="btn btn-accent"
               href="#" title="">Chapter Previous</a>
            <a class="btn btn-success" href="#">
                        list
            </a>
            <a class="btn btn-accent"
               href="#" title="">Chapter Next</a>
        </div>
    </div>
    <section class="padding-medium">
        <div class="container">
            <div class="row">

                <div class="col-md-12">

                    <div class="post-content">
                        {!! nl2br($chapter->content) !!}

                    </div><!--post-content-->

                </div>

            </div>

        </div>
    </section>

@endsection
