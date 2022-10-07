@extends('frontend.home.index1')
@section('main')
<div class="banner-section">
    <h3 class="tittle">
        Most Viewed <i class="glyphicon glyphicon-align-center"></i>
    </h3>
    @foreach ($posts_trending as $post_trending)
    <div class="banner">
        <div class="callbacks_container">
            <a href="{{  route('postView',['id'=>$post_trending->id]) }}">
                <ul class="rslides" id="slider4">
                    {{-- <img src="images/1.jpg" class="img-responsive" alt="" /> --}}
                    @foreach (json_decode($post_trending->post_image) as $image)
                    <li>
                        <img src="{{ asset($image) }}" class="img-responsive" alt="IMage Here">
                    </li>
                    @endforeach

                </ul>
            </a>
        </div>
        <!--banner-->
        <script src="{{ asset('') }}js/responsiveslides.min.js"></script>
        <script>
            // You can also use "$(window).load(function() {"
            $(function() {
                // Slideshow 4
                $("#slider4").responsiveSlides({
                    auto: true,
                    pager: true,
                    nav: true,
                    speed: 500,
                    namespace: "callbacks",
                    before: function() {
                        $(".events").append("<li>before event fired.</li>");
                    },
                    after: function() {
                        $(".events").append("<li>after event fired.</li>");
                    },
                });
            });
        </script>
        <div class="clearfix"></div>
        <div class="b-bottom">
            <h3 class="top">
                <a href="{{  route('postView',['id'=>$post_trending->id]) }}">{{ $post_trending->post_title}}</a>

            </h3>

            <p>
                On {{\Carbon\Carbon::parse($post_trending->created_at)->format('d M H:i')}}
                <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>0 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>{{
                    $post_trending->view_count}} </a>
                <a class="span_link" href="{{  route('postView',['id'=>$post_trending->id]) }}"><span class="glyphicon glyphicon-circle-arrow-right"></span></a>
            </p>
        </div>
    </div>
    @break;
    @endforeach
    <!--//banner-->

    <!--/top-news-->
    <div class="top-news">
        <h3 class="tittle">
            Recent News <i class="glyphicon glyphicon-th-large"></i>
        </h3>
        <!-- OLD CARD -->

                <!-- <div class="top-inner second">
            @foreach ($posts as $post)
            <div class="col-md-6 top-text two">
                <a href="{{  route('postView',['id'=>$post->id]) }}">

                    @foreach (json_decode($post->post_image) as $image)
                    <img src="{{ asset($image) }}" height="10" class="img-responsive" alt="IMage Here">
                    @break;
                    @endforeach
                </a>
                <h5 class="top">
                    <a href="{{  route('postView',['id'=>$post->id]) }}">{{ $post->post_title}}</a>
                </h5>
                <p>
                    {{ $post->short_description}}
                </p>
                <p>
                    On {{ $post->created_at}}
                    <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>0 </a><a
                        class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span> {{
                        $post->view_count}}
                    </a><a class="span_link" href="{{  route('postView',['id'=>$post->id]) }}"><span
                            class="glyphicon glyphicon-circle-arrow-right"></span></a>
                </p>
            </div>
            @endforeach
            <div class="clearfix"></div>
        </div> -->
        <!-- OLD CARD -->


        <!-- New Card -->

        <div class="recent-card">
        @foreach ($posts as $post)
            <div class="item-1">
                <a href="{{  route('postView',['id'=>$post->id]) }}" class="card-inside-recent">
                    @foreach (json_decode($post->post_image) as $image)
                    <div class="thumb" style="background-image: url('{{ asset($image) }}');"></div>
                    @break;
                    @endforeach
                    <article>
                        <h1>{{ $post->post_title}}</h1>
                        <span>
                            {{ $post->short_description}}
                        </span>
                        <span>
                            On {{\Carbon\Carbon::parse($post->created_at)->format('d M H:i')}}
                            <span class="glyphicon glyphicon-comment"></span>0
                            <span class="glyphicon glyphicon-eye-open"></span>
                            {{$post->view_count}}
                            <span class="glyphicon glyphicon-circle-arrow-right"></span>
                        </span>
                    </article>
                </a>
            </div>
            @endforeach
        </div>

        <div class="clearfix"></div>
        <!-- New Card -->


    </div>
    <!--//top-news-->
</div>
@endsection
