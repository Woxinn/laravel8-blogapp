@extends('layouts.app')
@section('baslik',$post->title)


@section('icerik')
<!--====== Post Details Start ======-->
<section class="post-details-area">
	<div class="container container-1000">
		<div class="post-details">
			<div class="entry-header">
				<h2 class="title"> {{ $post->title }} </h2>
				<ul class="post-meta">
					<li>{{ $post->created_at }}</li>
					<li><a href="{{ $post->category->slug }}">{{ $post->category->name }}</a></li>
				</ul>
				<p class="short-desc"> </p>
			</div>
			<div class="entry-media text-center">
				<img src="images/{{$post->image}}" alt="image">
			</div>
			<div class="entry-content">
				{!! $post->content !!}
			</div>
			<div class="entry-footer">
				<div class="post-tags">
					<span>Etiketler:</span>
					@foreach (Str::of($post->tags)->explode(',') as $tag)						
					<a href="#">{{$tag}}</a>
					@endforeach
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
					<h5><a href="#">{{$post->user->name}}</a></h5>
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
			<h4 class="template-title">{{ $post->comments->count() }} Yorum</h4>

			<ul class="comment-list">
				@foreach ($post->comments as $comment)
				<li>
					<div class="comment-body">
						<div class="comment-author">
						</div>
						<div class="comment-content">
							<h6 class="comment-author">{{ $comment->user->name }} {!! $comment->user->yetki == 'admin' ? '- <span style="color: red;font-size:14px;">Admin</span>' : '' !!}</h6>
							<p>
								{{ $comment->comment }}
							</p>
							<div class="comment-footer">
								<span class="date"> {{ $comment->created_at->format('h:m d M Y') }}</span>
								@if (Auth::check() && Auth::user()->yetki == 'admin' || Auth::id() == $comment->user_id)
								<form action="{{route('comment.destroy',$comment)}}" method="post">
									@csrf
									@method('delete')
									<button type="submit" class="btn btn-sm btn-danger">Yorumu Sil</button>
								</form>
								@endif
							</div>
						</div>
					</div>
				</li>
				@endforeach
			</ul>

			<h4 class="template-title">Yorum Bırakın</h4>
			<div class="comment-form">
				<form action="{{route('comment.store')}}" method="POST">
					@csrf
					<div class="row">
						<div class="col-12">
							<textarea name="comment" placeholder="Yorum"></textarea>
						</div>
						<input type="hidden" name="postId" value="{{$post->id}}">
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