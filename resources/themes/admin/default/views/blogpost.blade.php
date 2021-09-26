@extends('master.layout')
@section('title', 'Blog Post')

@section('content')
    <!-- Page content-->
    <div class="container blog-container">
        <div class="row">
            <div class="col-lg-8">
                <!-- Post content-->
                <article>
                    <!-- Post header-->
                    <header class="mb-4">
                        <!-- Post title-->
                        <h1 class="fw-bolder mb-1">{{$post->title}}</h1>
                        <!-- Post meta content-->
                        <div class="text-muted fst-italic mb-2">Posted on {{date("F j, Y", strtotime($post->created_at))}}</div>
                    </header>
                    <!-- Preview image figure-->
                    @if($post->image)
                        <figure class="mb-4"><img class="img-fluid rounded" src="{{$post->image->image_name}}" alt="..." /></figure>
                    @else
                        <figure class="mb-4"><img class="img-fluid rounded" src="https://picsum.photos/900/400" alt="..." /></figure>
                    @endif
                    <!-- Post content-->
                    <section class="mb-2">
                        <p class="fs-5 mb-4">{{$post->content}}</p>
                    </section>
                </article>
            </div>
            <!-- Side widgets-->
            <div class="col-lg-4">
{{--                <!-- Search widget-->--}}
{{--                <div class="card mb-4">--}}
{{--                    <div class="card-header">Search</div>--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="input-group">--}}
{{--                            <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />--}}
{{--                            <button class="btn btn-primary" id="button-search" type="button">Go!</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <!-- Side widget-->
                <div class="card mb-4">
                    <div class="card-header">Side Widget</div>
                    <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
                </div>
            </div>
        </div>
    </div>
@endsection
