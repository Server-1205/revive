@foreach($items as $item)
    <div class="single-comment justify-content-between d-flex">
        <div class="user justify-content-between d-flex">
            <div class="thumb">
                <img src="img/blog/c1.jpg" alt="">
            </div>
            <div class="desc">
                <h5><a href="#">{{ $item->name }}</a></h5>
                <p class="date">December 4, 2017 at 3:12 pm </p>
                <p class="comment m-2">
                    {{ $item->comment }}
                </p>
            </div>
        </div>
        <div class="reply-btn">
            <a href="" class="btn-reply text-uppercase">reply</a>
        </div>
    </div>


    @isset($comments[$item->id])
        <div class="comment-list left-padding mt-2">
            @include('layouts.partials._commment',['items' => $comments[$item->id]])
        </div>
    @endisset
@endforeach





