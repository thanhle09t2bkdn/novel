@extends('layouts.frontend')

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-title">{{ $chapter->name }}</h1>
                    <div class="breadcrumbs">
                        <span class="item"><a href="{{ route('frontend.public.index') }}">Home /</a></span>
                        <span class="item"><a href="{{ route('frontend.public.svg', $chapter->post->slug) }}">{{ $chapter->post->name }}</a></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="text-center">
        <div class="">
            @if($previousChapter)
                <a class="btn btn-accent"
                   href="{{ route('frontend.public.chapter', $previousChapter->slug) }}"
                   title="{{ $previousChapter->name }}">Chapter Previous</a>
            @else
                <a class="btn btn-accent disabled"
                   href="#">Chapter Previous</a>
            @endif
            <a class="btn btn-success" href="{{ route('frontend.public.svg', $nextChapter->post->slug) }}">
                Chapter List
            </a>
            @if($nextChapter)
                <a class="btn btn-accent"
                   href="{{ route('frontend.public.chapter', $nextChapter->slug) }}" title="{{ $nextChapter->name }}">Chapter
                    Next</a>
            @else
                <a class="btn btn-accent disabled"
                   href="#">Chapter Next</a>
            @endif

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
