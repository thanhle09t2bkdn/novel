@extends('layouts.frontend')

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-title">Genre List</h1>
                    <div class="breadcrumbs">
                        <span class="item"><a href="{{ route('frontend.public.index') }}">Home /</a></span>
                        <span class="item">Genres</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">

                <div class="col-md-12">

                    <div class="post-content">
                        @foreach($tags as $tag)
                            <a href="{{ route('frontend.public.tag', $tag->slug) }}" class="btn btn-secondary">
                                {{ $tag->name }}
                            </a>
                        @endforeach

                    </div><!--post-content-->

                </div>

            </div>

        </div>
    </section>

@endsection
