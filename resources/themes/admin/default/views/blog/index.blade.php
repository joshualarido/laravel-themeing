@extends('master.layout')
@section('title', 'Blog')

@section('content')
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="container-fluid">
        <section class="bg-light py-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="display-5 fw-bold mb-5 mt-5">Joshua's Blog</h2>
                    </div>
                </div>
                <div class="row d-flex align-items-center">
                    @foreach($posts as $post)
                    <div class="col-md-6 col-xl-4">
                        <div class="image-box image-box--shadowed white-bg style-2 mb-4">
                            <div class="overlay-container">
                                <img src="https://via.placeholder.com/400x150/FF0000/000000" alt="">
                                <a href="/blogpost" class="overlay-link"></a>
                            </div>
                            <div class="body">
                                <h5 class="font-weight-bold my-2">{{$post->title}}</h5>
                                <p class="small">{{date("F j, Y", strtotime($post->created_at))}}</p>
                                <div class="row d-flex align-items-center">
                                    <div class="col-6">
                                        <ul class="social-links small circle">
                                            <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li class="googleplus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                            <li class="instagram"><a href="#"><i class="fa fa-instagram"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="col-6 text-right">
                                        <a href="/blogpost/{{$post->id}}" class="btn btn-gray-transparent btn-animated">Read More<i class="fa fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@endsection
