@extends('layouts.revive')


@section('content')
    @if($post)
        <section class="banner-area relative">
            <div class="overlay overlay-bg"></div>
            <div class="banner-content text-center">
                <h1>{{ $post->title }}</h1>
                <p>{{$post->preview_text}}
                </p>
            </div>
        </section>
        <!--================ End banner Area =================-->

        <!--================Blog Area =================-->
        <section class="blog_area section-gap single-post-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="main_blog_details">
                            <img class="img-fluid" src="{{ asset('storage') }}/{{ $post->image }}" alt="">
                            <a href="#"><h4>Cartridge Is Better Than Ever <br/> A Discount Toner</h4></a>
                            <div class="user_details">
                                <div class="float-left">
                                    <a href="#">{{ $post->categories->title }}</a>
                                    <a href="#">Gadget</a>
                                </div>
                                <div class="float-right mt-sm-0 mt-3">
                                    <div class="media">
                                        <div class="media-body">
                                            <h5>Mark wiens</h5>
                                            <p>12 Dec, 2017 11:21 am</p>
                                        </div>
                                        <div class="d-flex">
                                            <img src="img/blog/user-img.jpg" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{$post->detail_text}}
                            <div class="news_d_footer flex-column flex-sm-row">
                                <a href="#"><i class="lnr lnr lnr-heart"></i>Lily and 4 people like this</a>
                                <a class="justify-content-sm-center ml-sm-auto mt-sm-0 mt-2" href="#"><i
                                        class="lnr lnr lnr-bubble"></i>06 Comments</a>
                                <div class="news_socail ml-sm-auto mt-sm-0 mt-2">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-youtube-play"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                    <a href="#"><i class="fa fa-rss"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="navigation-area">
                            <div class="row">
                                <div
                                    class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                                    <div class="thumb">
                                        <a href="#"><img class="img-fluid" src="img/blog/prev.jpg" alt=""></a>
                                    </div>
                                    <div class="arrow">
                                        <a href="#"><span class="lnr text-white lnr-arrow-left"></span></a>
                                    </div>
                                    <div class="detials">
                                        <p>Prev Post</p>
                                        <a href="#"><h4>A Discount Toner</h4></a>
                                    </div>
                                </div>
                                <div
                                    class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                                    <div class="detials">
                                        <p>Next Post</p>
                                        <a href="#"><h4>Cartridge Is Better</h4></a>
                                    </div>
                                    <div class="arrow">
                                        <a href="#"><span class="lnr text-white lnr-arrow-right"></span></a>
                                    </div>
                                    <div class="thumb">
                                        <a href="#"><img class="img-fluid" src="img/blog/next.jpg" alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="comments-area">
                            <h4>{{$post->comments->count() }}Comments</h4>
                            <div class="comment-list mt-2">
                                @foreach($comments as $k => $comment)
                                    @if($k !== 0)
                                        @break
                                    @endif
                                    @include('layouts.partials._commment', ['items' => $comment])
                                @endforeach
                            </div>
                        </div>
                        <div class="comment-form">
                            <h4>Leave a Reply</h4>
                            <form>
                                <div class="form-group form-inline">
                                    <div class="form-group col-lg-6 col-md-6 name">
                                        <input type="text" class="form-control" id="name" placeholder="Enter Name"
                                               onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'">
                                    </div>
                                    <div class="form-group col-lg-6 col-md-6 email">
                                        <input type="email" class="form-control" id="email"
                                               placeholder="Enter email address" onfocus="this.placeholder = ''"
                                               onblur="this.placeholder = 'Enter email address'">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="subject" placeholder="Subject"
                                           onfocus="this.placeholder = ''" onblur="this.placeholder = 'Subject'">
                                </div>
                                <div class="form-group">
                                <textarea class="form-control mb-10" rows="5" name="message" placeholder="Messege"
                                          onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'"
                                          required=""></textarea>
                                </div>
                                <a href="#" class="primary-btn submit_btn">Post Comment</a>
                            </form>
                        </div>
                    </div>

                   @include('layouts.partials._sidebar')
                </div>
            </div>
        </section>
    @endif

@endsection
