@extends('layouts.backend')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Post</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('components.alert')
                </div>
                <div class="col-md-12">
                    <form action="{{ route('backend.posts.update', $item->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card card-default">
                                    <div class="card-header">
                                        <h3 class="card-title">Post</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    @include('backend.fields.edit.name')
                                                </div>
                                                <div class="col-md-12">
                                                    @include('backend.fields.edit.category')
                                                </div>
                                                <div class="col-md-12">
                                                    @include('backend.fields.edit.type')
                                                </div>
                                                <div class="col-md-12">
                                                    @include('backend.fields.edit.description')
                                                </div>
                                                <div class="col-md-12">
                                                    @include('backend.fields.edit.content')
                                                </div>
                                                <div class="col-md-12">
                                                    @include('backend.fields.edit.image')
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card card-default">
                                    <div class="card-header">
                                        <h3 class="card-title">Action</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                @include('backend.fields.common.action', ['url' => route('backend.posts.index')])
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
