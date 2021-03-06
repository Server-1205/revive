@extends('layouts.revive')


@section('content')
    <section class="home-banner-area relative">
        <div class="container-fluid">
            <div class="row">
                <div class="owl-carousel home-banner-owl">
                    <div class="banner-img">
                        <img class="img-fluid" src="img/banner/b1.jpg" alt=""/>
                        <div class="text-wrapper">
                            <a href="#" class="d-flex">
                                <h1>
                                    Make the world a better place <br/>
                                    with camera
                                </h1>
                            </a>
                        </div>
                    </div>
                    <div class="banner-img">
                        <img class="img-fluid" src="img/banner/b2.jpg" alt=""/>
                        <div class="text-wrapper">
                            <a href="#" class="d-flex">
                                <h1>
                                    Make the world a better place <br/>
                                    with camera
                                </h1>
                            </a>
                        </div>
                    </div>
                    <div class="banner-img">
                        <img class="img-fluid" src="img/banner/b1.jpg" alt=""/>
                        <div class="text-wrapper">
                            <a href="#" class="d-flex">
                                <h1>
                                    Make the world a better place <br/>
                                    with camera
                                </h1>
                            </a>
                        </div>
                    </div>
                    <div class="banner-img">
                        <img class="img-fluid" src="img/banner/b2.jpg" alt=""/>
                        <div class="text-wrapper">
                            <a href="#" class="d-flex">
                                <h1>
                                    Make the world a better place <br/>
                                    with camera
                                </h1>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="social-icons">
            <ul>
                <li>
                    <a href="index.html"><i class="fa fa-facebook"></i></a>
                </li>
                <li>
                    <a href="index.html"><i class="fa fa-twitter"></i></a>
                </li>
                <li>
                    <a href="index.html"><i class="fa fa-pinterest"></i></a>
                </li>
                <li class="diffrent">sharre now</li>
            </ul>
        </div>
    </section>
    <!--================ End banner Area =================-->

    <!--================ Start Blog Post Area =================-->
    <section class="blog-post-area section-gap relative">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @if ($posts->count())

                        <div class="row">
                            @php /** @var  \App\Models\Post $post */ @endphp

                            <div class="col-lg-6 col-md-6">
                                @foreach($posts as $i => $post)
                                    @if ($i % 2 === 0)
                                        <div class="single-amenities">
                                            <div class="amenities-thumb">
                                                <img
                                                    class="img-fluid w-100"
                                                    src="{{ asset('storage') }}/{{$post->image}}"
                                                    alt=""
                                                />
                                            </div>
                                            <div class="amenities-details">
                                                <h5>
                                                    <a href="{{ route('post.show', $post) }}">{{ $post->title }}</a>
                                                </h5>
                                                <div class="amenities-meta mb-10">
                                                    <a href="#" class=""><span class="ti-calendar"></span>
                                                        {{ $post->published_at ? $post->published_at->format('dS  M,  Y') : '' }}
                                                    </a>
                                                    <a href="#" class="ml-20"><span class="ti-comment"></span>05</a>
                                                </div>
                                                <p>
                                                    {{ $post->preview_text }}
                                                </p>

                                                <div class="d-flex justify-content-between mt-20">
                                                    <div>
                                                        <a href="#" class="blog-post-btn">
                                                            Read More <span class="ti-arrow-right"></span>
                                                        </a>
                                                    </div>
                                                    <div class="category">
                                                        <a href="{{ route('category', $post->categories) }}">
                                                            <span
                                                                class="ti-folder mr-1"></span> {{ $post->categories->title }}
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>

                            <div class="col-lg-6 col-md-6">
                                @foreach($posts as $i => $post)
                                    @if ($i % 2 !== 0)
                                        <div class="single-amenities">
                                            <div class="amenities-thumb">
                                                <img
                                                    class="img-fluid w-100"
                                                    src="{{ asset('storage') }}/{{$post->image}}"
                                                    alt=""
                                                />
                                            </div>
                                            <div class="amenities-details">
                                                <h5>
                                                    <a href="{{ route('post.show', $post) }}">{{ $post->title }}</a>
                                                </h5>
                                                <div class="amenities-meta mb-10">
                                                    <a href="#" class=""><span class="ti-calendar"></span>
                                                        {{ $post->published_at ? $post->published_at->format('dS M, Y') : '' }}
                                                    </a>
                                                    <a href="#" class="ml-20"><span class="ti-comment"></span>05</a>
                                                </div>
                                                <p>
                                                    {{ $post->preview_text }}
                                                </p>

                                                <div class="d-flex justify-content-between mt-20">
                                                    <div>
                                                        <a href="#" class="blog-post-btn">
                                                            Read More <span class="ti-arrow-right"></span>
                                                        </a>
                                                    </div>
                                                    <div class="category">
                                                        <a href="{{ route('category', $post->categories) }}">
                                                            <span
                                                                class="ti-folder mr-1"></span> {{ $post->categories->title }}
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                            </div>

                        </div>
                    @else
                        <h2 class="text-secondary">Post asdfasdfasdf</h2>
                    @endif


                    @php /** @var Illuminate\Pagination\LengthAwarePaginator $posts */ @endphp
                   {{ $posts->links() }}
                </div>

                <!-- Start Blog Post Siddebar -->
                @include('layouts.partials._sidebar')
            </div>
            <!-- End Blog Post Siddebar -->
        </div>
    </section>
    <!--================ End Blog Post Area =================-->
@endsection
