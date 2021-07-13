<!--====== Header part start ======-->
<header class="sticky-header">
	<div class="container-fluid">
		<div class="d-flex align-items-center justify-content-between">
			<div class="site-logo">
				<a class="logotext">Blog App</a>
			</div>
			<div class="header-right">

				@auth
				<div class="search-area" style="margin-right: 15px;">
					<h5> {{ Auth::user()->name }} </h5>
				</div>
				@if (Auth::user()->yetki == 'admin')
				<div class="search-area mr-3">
					<a href="{{route('admin')}}" class="btn btn-outline-dark">Yönetim</a>
				</div>
				@endif

				<div class="search-area">
					<form action="{{route('logout')}}" method="POST">
						@csrf
						<button type="submit" class="btn btn-outline-dark">Çıkış Yap</button>
					</form>
				</div>
				@else
				<div class="search-area">
					<a href="{{route('login')}}" class="btn btn-outline-dark">Giriş/Kayıt</a>
				</div>
				@endauth
				<div class="search-area">
					<a href="javascript:void(0)" class="search-btn"><i class="fas fa-search"></i></a>
					<div class="search-form">
						<a href="#" class="search-close"><i class="fal fa-times"></i></a>
						<form action="#">
							<input type="search" placeholder="Type here to search">
						</form>
						<div class="search-overly"></div>
					</div>
				</div>
				<div class="offcanvas-panel">
					<a href="javascript:void(0)" class="panel-btn">
						<span>
							<span></span>
							<span></span>
							<span></span>
						</span>
					</a>
					<div class="panel-overly"></div>
					<div class="offcanvas-items">
						<!-- Navbar Toggler -->
						<a href="javascript:void(0)" class="panel-close">
							Kapat <i class="fa fa-angle-right" aria-hidden="true"></i>
						</a>

						<ul class="offcanvas-menu">
							<li><a href="/">Anasayfa</a></li>
							<li><a href="/hakkimizda">Hakkımızda</a></li>
							<li><a href="/iletisim">İletişim</a></li>
						</ul>

						<div class="social-icons">
							<ul>
								<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="#"><i class="fab fa-instagram"></i></a></li>
								<li><a href="#"><i class="fab fa-twitter"></i></a></li>
								<li><a href="#"><i class="fab fa-youtube"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
<!--====== Header part end ======-->