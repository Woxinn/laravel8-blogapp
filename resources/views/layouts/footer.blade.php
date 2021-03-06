<!--====== Footer Area Start ======-->
<footer>
		<div class="footer-widgets-area">
			<div class="container container-1360">
				<div class="row">
					<div class="col-lg-3 col-sm-6">
						<div class="widget address-widget">
							<h4 class="widget-title">Our Address</h4>
							<p>Sydney, Australia Sheen Darus Salam. <br> 112/B, Road 8A, Dhanmondi.</p>
							<p>+880-036987458765521 <br> example@yourmail.com</p>
						</div>
					</div>
					<div class="col-lg-2 col-sm-6">
						<div class="widget nav-widget">
							<h4 class="widget-title">Quick Links</h4>
							<ul>
								<li><a href="#">About Us</a></li>
								<li><a href="#">Contact Us</a></li>
								<li><a href="#">Careers</a></li>
								<li><a href="#">Services</a></li>
								<li><a href="#">Stories</a></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-2 col-sm-6">
						<div class="widget nav-widget">
							<h4 class="widget-title">Categories</h4>
							<ul>
								@foreach (App\Models\Category::all() as $category)
								<li><a href="{{ $category->slug }}">{{$category->name}}</a></li>
								@endforeach
								
							</ul>
						</div>
					</div>
					<div class="col-lg-4 col-sm-6 ml-auto">
						<div class="widget newsletter-widget">
							<h4 class="widget-title">Our Monthly Newsletter </h4>
							<p>
								Sign Up TO Get Updates On Articles, Interviews And Events.
							</p>
							<form action="#">
								<input type="email" placeholder="your email">
								<button type="submit">Sign Up</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-copyright-area">
			<div class="container container-1360">
				<div class="row align-items-center">
					<div class="col-lg-6 col-12">
						<div class="social-links">
							<ul>
								<li class="title">Follow Me</li>
								<li><a href="#">Twitter</a></li>
								<li><a href="#">Facebook</a></li>
								<li><a href="#">Youtube</a></li>
								<li><a href="#">Instagram</a></li>
								<li><a href="#">Linkedin</a></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-6 col-12">
						<div class="copyright-text text-lg-right">
							<p><span>Copyright</span> - 2020 EasyArt theme by Easygoods</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!--====== Footer Area End ======-->