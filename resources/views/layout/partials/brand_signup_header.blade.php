	<!-- Main Wrapper -->
	<div class="main-wrapper">
		
		<!-- Header -->
		<div class="header">


		<nav class="navbar navbar-expand-lg navbar-light">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"><i class="fa fa-bars" aria-hidden="true"></i></span>
			</button>
			@if(isset($brand_profile))
				<a href="{{ url('brand-profile/'.$brand_profile->id ?? '')}}" class="logo logo-small">
					<img src="{{asset('brand_logo/'.$brand_profile->brand_logo) ?? '../assets_admin/img/logo.png'}} " style="width:50px; height:50px;" alt="Logo">
					
				</a>
			@else
				<a href="{{ url('/')}}" class="logo logo-small">
					<img src="../assets_admin/img/logo.png" alt="Logo">
					
				</a>
			@endif
			<div class="collapse navbar-collapse" id="navbarTogglerDemo03">
				<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
					@if(isset($brand_profile))
					<li class="nav-item active">
						<a href="{{ route('brand-articles',$brand_profile->id)}}"> מאמרים </a>
					</li>
					<li class="nav-item">
						<a href="{{ route('brand-product',$brand_profile->id)}}"> קטלוג המוצרים </a>
					</li>
					@guest
                            <li class="nav-item">
                                <a href="{{url('/5')}}"><img style="height: 30px;" src="https://dosizlocal.com/uploads/city/logo_transparent1.png"></a>
                            </li>
{{--                             
                        @else
                            <li class="nav-item">
                                <a style="font-size:18px;" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a style="color: black; position: static;" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li> --}}
                        @endguest

					{{-- <li class="nav-item">
						<a href="{{ url('cities',$brand_profile->id)}}" target="_blank"> עִיר</a>
					</li> --}}

					@else
					<!-- <li class="nav-item active">
						<img  src="../assets_admin/img/home.svg" alt=""><a href=""> תיבה ףד </a>
					</li>
					<li class="nav-item">
						<img  src="../assets_admin/img/lock.svg" alt=""><a href="">תונכרצ ןויכרא</a>
					</li>
					<li class="nav-item">
						<img  src="../assets_admin/img/glases.svg" alt=""><a href="">םירמאמ</a>
					</li>
					<li class="nav-item">
						<img  src="../assets_admin/img/mail.svg" alt=""><a href="{{route('register')}}">העידי תחילש</a>
					</li> -->
					@endif
					<!-- User Menu -->
				@if(isset(Auth::user()->name))
				<li class="nav-item dropdown has-arrow">
					<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
						<span class="user-img" style="color:#fff;">{{ Auth::user()->name }}</span>
						
					</a>
					<div class="dropdown-menu">
						<div class="user-header">
							<div class="user-text">
								<h6>{{ Auth::user()->name ?? 'User Name' }}</h6>
								<p class="text-muted mb-0">{{ Auth::user()->email ?? 'USer Email' }}</p>
								
							</div>
						</div>
						{{-- <a class="dropdown-item" href="profile">My Profile</a> --}}
						<a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
					</div>
				</li>
				@endif
				<!-- /User Menu -->
				</ul>
			</div>
			</nav>
</div>
		<!-- </div> -->
		<!-- /Header -->