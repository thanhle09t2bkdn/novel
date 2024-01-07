@extends('layouts.backend')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ $post->name }}</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('backend.posts.index') }}" class="btn btn-default mr-2">Back</a>
                    <a href="{{ route('backend.posts.edit', $post->id) }}" class="btn btn-info">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-12">
                    @include('components.alert')
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Post</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p>
                                                <strong>Name:</strong>
                                                {{ $post->name }}
                                            </p>
                                            <p>
                                                <strong>Category:</strong>
                                                {{ $post->category->name }}
                                            </p>
                                            <p>
                                                <strong>Description:</strong>
                                                {{ $post->description }}
                                            </p>

                                        </div>
                                        <div class="col-md-6">
                                            <p>
                                                <strong>Created at:</strong>
                                                {{ date('d-m-Y H:i:s', strtotime($post->created_at)) }}
                                            </p>
                                            <p>
                                                <strong>Updated at:</strong>
                                                {{ date('d-m-Y H:i:s', strtotime($post->updated_at)) }}
                                            </p>
                                        </div>
                                        <div class="col-md-12">
                                            <p>
                                                <strong>Content:</strong>
                                                {!! $post->content !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Options</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="text-center">
                                        <img src="{{ $post->image }}" class="w-100" style="max-width: 300px">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
