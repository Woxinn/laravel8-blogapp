@extends('layouts.app')
@section('baslik','Anasayfa')

@section('icerik')
<!--====== Banner Area Start ======-->
<section class="banner-section">
    <div class="banner-slider">
        @foreach ($onecikarilmis as $onecikan)
        <div class="sinlge-banner">
            <div class="banner-wrapper">
                <div class="banner-bg" style="background-image: url(images/{{$onecikan->resim}});"></div>
                <div class="banner-content" data-animation="fadeInUp" data-delay="0.3s">
                    <h3 class="title" data-animation="fadeInUp" data-delay="0.6s">
                        <a href="#">
                            {{ $onecikan->baslik }}
                        </a>
                    </h3>
                    <ul class="meta" data-animation="fadeInUp" data-delay="0.8s">
                        <li><a href="#">{{ $onecikan->sahip->name }} yazdı</a></li>
                        <li><a href="{{$onecikan->kategori->slug}}">{{ $onecikan->kategori->ad }}</a></li>
                    </ul>
                    <p data-animation="fadeInUp" data-delay="1s">
                        {!! Str::limit($onecikan->icerik,'150')!!}
                    </p>
                    <a href="{{$onecikan->slug}}" class="read-more" data-animation="fadeInUp" data-delay="0.7s">
                        Devamını Oku <i class="fas fa-long-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="banner-nav"></div>
</section>
<!--====== Banner Area End ======-->

<!--====== Post Area Start ======-->
<section class="post-area with-sidebar" id="postWarpperLoaded">
    <div class="container container-1250">
        <div class="post-area-inner">
            <div class="entry-posts two-column masonary-posts row">
                @foreach ($yazilar as $yazi)
                <div class="col-lg-6 col-sm-6">
                    <div class="entry-post">
                        <div class="entry-thumbnail">
                            <img src="images/{{$yazi->resim}}" alt="Image">
                        </div>
                        <div class="entry-content">
                            <h4 class="title">
                                <a href="{{$yazi->slug}}">
                                    {{ $yazi->baslik }}
                                </a>
                            </h4>
                            <ul class="post-meta">
                                <li class="date">
                                    <a> {{ $yazi->created_at }} </a>
                                </li>
                                <li class="categories">
                                    <a href="{{$yazi->kategori->slug}}">{{ $yazi->kategori->ad }}</a>
                                </li>
                            </ul>
                            <p>
                                {!!Str::limit($yazi->icerik,'150')!!}
                            </p>
                            <a href="{{$yazi->slug}}" class="read-more">
                                Devamını Oku <i class="fas fa-long-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="col-12">
                    <div class="text-center">
                        {{ $yazilar->links() }}
                    </div>
                </div>
            </div>
            <div class="primary-sidebar clearfix">
                <div class="sidebar-masonary row justify-content-center">
                    <div class="col-lg-12 col-md-6 col-sm-8 widget author-widget">
                        <div class="author-img">
                            <img src="assets/img/sidebar/author.jpg" alt="Post-Author">
                        </div>
                        <h5 class="widget-title">I am a Bloger</h5>
                        <p>
                            When it comes to creating is a website for your business, an attractive design will only
                            get you far,...
                        </p>
                        <div class="author-signature">
                            <img src="assets/img/sidebar/author-signature.png" alt="Signature">
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-6 col-sm-8 widget social-widget">
                        <h5 class="widget-title">Kategoriler</h5>
                        <div class="social-links">
                            @foreach(App\Models\Kategoriler::all() as $kategori)
                            <a href="kategori/{{$kategori->slug}}">
                                {{ $kategori->ad }}
                            </a>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-6 col-sm-8 widget popular-articles">
                        <h5 class="widget-title">Popular Articles</h5>
                        <div class="articles">
                            <div class="article">
                                <div class="thumb">
                                    <img src="assets/img/sidebar/articles/01.jpg" alt="Image">
                                </div>
                                <div class="desc">
                                    <h6><a href="blog-details.html">Best Wordpress Theme of 2018</a></h6>
                                    <span class="post-date">Audust 23, 2015</span>
                                </div>
                            </div>
                            <div class="article">
                                <div class="thumb">
                                    <img src="assets/img/sidebar/articles/02.jpg" alt="Image">
                                </div>
                                <div class="desc">
                                    <h6><a href="blog-details.html">Dating While Studying Abroad—Maximize Fun
                                            Minimize Heartbreak</a></h6>
                                    <span class="post-date">Audust 23, 2015</span>
                                </div>
                            </div>
                            <div class="article">
                                <div class="thumb">
                                    <img src="assets/img/sidebar/articles/03.jpg" alt="Image">
                                </div>
                                <div class="desc">
                                    <h6><a href="blog-details.html">Nature Photography Best Place Focus</a></h6>
                                    <span class="post-date">Audust 23, 2015</span>
                                </div>
                            </div>
                            <div class="article">
                                <div class="thumb">
                                    <img src="assets/img/sidebar/articles/04.jpg" alt="Image">
                                </div>
                                <div class="desc">
                                    <h6><a href="blog-details.html">Best Wordpress Theme of 2018</a></h6>
                                    <span class="post-date">Audust 23, 2015</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-6 col-sm-8 widget ad-widget">
                        <img src="assets/img/sidebar/ad.jpg" alt="Image">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--====== Post Area End ======-->

@endsection