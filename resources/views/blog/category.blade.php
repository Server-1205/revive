@extends('layouts.revive')

@section('content')
    <section class="banner-area relative">
        <div class="overlay overlay-bg"></div>
        <div class="banner-content text-center">
            @php /** @var \App\Models\Category $category*/ @endphp
            <h1>{{$category->title}}</h1>
            <p>{{ $category->description }}</p>
        </div>
    </section>
    <section class="blog-post-area section-gap relative">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @if ($posts)
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
                                                    <a href="#">{{ $post->title }}</a>
                                                </h5>
                                                <div class="amenities-meta mb-10">
                                                    <a href="#" class=""><span class="ti-calendar"></span>
                                                        {{ $post->published_at ? $post->published_at->format('dS  M,  Y') : '' }}</a>
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
                                                            <span class="ti-folder mr-1"></span> {{ $post->categories->title }}
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
                                                    <a href="#">{{ $post->title }}</a>
                                                </h5>
                                                <div class="amenities-meta mb-10">
                                                    <a href="#" class=""><span class="ti-calendar"></span>
                                                        {{ $post->published_at ? $post->published_at->format('dS M, Y') : '' }}</a>
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
                                                            <span class="ti-folder mr-1"></span> {{ $post->categories->title }}
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                            </div>
                        </div>
                    @endif


                   {{ $posts->links() }}
                </div>

                <!-- Start Blog Post Siddebar -->
               @include('layouts.partials._sidebar')
            </div>
            <!-- End Blog Post Siddebar -->
        </div>
    </section>
@stop
