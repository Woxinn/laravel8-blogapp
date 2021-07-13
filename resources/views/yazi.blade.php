@extends('layouts.app')
@section('baslik',$yazi->baslik)


@php
App\Models\Yazilarmodel::find($yazi->id)->increment('okunmasayisi');

@endphp
@section('icerik')
<!--====== Post Details Start ======-->
<section class="post-details-area">
	<div class="container container-1000">
		<div class="post-details">
			<div class="entry-header">
				<h2 class="title"> {{ $yazi->baslik }} </h2>
				<ul class="post-meta">
					<li>{{ $yazi->created_at }}</li>
					<li><a href="#">{{ $yazi->kategori->ad }}</a></li>
				</ul>
				<p class="short-desc"> </p>
			</div>
			<div class="entry-media text-center">
				<img src="images/{{$yazi->resim}}" alt="image">
			</div>
			<div class="entry-content">
				{!! $yazi->icerik !!}
			</div>
			<div class="entry-footer">
				<div class="post-tags">
					<span>Tag:</span>
					<a href="#">burger,</a>
					<a href="#">pixxa,</a>
					<a href="#">drink,</a>
					<a href="#">hot,</a>
					<a href="#">spacial,</a>
				</div>
				<div class="social-share">
					<span>Share:</span>
					<a href="#"><i class="fab fa-instagram"></i></a>
					<a href="#"><i class="fas fa-heart"></i></a>
					<a href="#"><i class="fab fa-facebook-f"></i></a>
					<a href="#"><i class="fab fa-twitter"></i></a>
				</div>
				<div class="post-author">
					<div class="author-img">
						<img src="assets/img/post-details/post-author.png" alt="PostAuthor">
					</div>
					<h5><a href="#">Maisha Smith</a></h5>
					<p>Article Writer, Senior Designer, Wordpress Developer Father of 2 Daughters</p>
				</div>
			</div>
			<div class="post-nav">
				<div class="prev-post">
					<a href="#"><i class="far fa-angle-left"></i></a><span class="title">Previous Post</span>
				</div>
				<div class="next-post">
					<span class="title">Next Post</span><a href="#"><i class="far fa-angle-right"></i></a>
				</div>
			</div>
			<div class="related-posts">
				<h4 class="related-title">Related Posts</h4>
				<div class="related-loop row justify-content-center">
					<div class="col-lg-6 col-md-6 col-sm-10">
						<div class="related-post-box">
							<div class="thumb">
								<img src="assets/img/post-details/related-01.jpg" alt="image">
							</div>
							<h5 class="title">
								<a href="#">
									The Olivier da Costa restaurant experience in Lisbon
								</a>
							</h5>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-10">
						<div class="related-post-box">
							<div class="thumb">
								<img src="assets/img/post-details/related-02.jpg" alt="image">
							</div>
							<h5 class="title">
								<a href="#">
									The Olivier da Costa restaurant experience in Lisbon
								</a>
							</h5>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="comment-template">
			<h4 class="template-title">{{ $yazi->yorumlar->count() }} Yorum</h4>

			<ul class="comment-list">
				@foreach ($yazi->yorumlar as $yorum)
				<li>
					<div class="comment-body">
						<div class="comment-author">
						</div>
						<div class="comment-content">
							<h6 class="comment-author">{{ $yorum->sahip->name }}</h6>
							<p>
								{{ $yorum->yorum }}
							</p>
							<div class="comment-footer">
								<span class="date"> {{ $yorum->created_at->format('h:m d M Y') }}</span>
							</div>
						</div>
					</div>
				</li>
				@endforeach
			</ul>

			<h4 class="template-title">Yorum Bırakın</h4>
			<div class="comment-form">
				<form action="{{route('yorum.store')}}" method="POST">
					@csrf
					<div class="row">
						<div class="col-12">
							<textarea name="yorum" placeholder="Yorum"></textarea>
						</div>
						<input type="hidden" name="yaziid" value="{{$yazi->id}}">
						<div class="col-12">
							<button type="submit">Gönder <i class="far fa-arrow-right"></i></button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<!--====== Post Details End ======-->
@endsection